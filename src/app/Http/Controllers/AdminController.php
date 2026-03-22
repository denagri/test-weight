<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\WeightTarget;
use App\Models\WeightLog;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\AdminRequest;

class AdminController extends Controller
{
    public function index()
    {    
        $userId=Auth::id();
        $weightTarget = WeightTarget::where('user_id',$userId)->latest()->first(); 
        $latestWeight = WeightLog::where('user_id',$userId)->orderBy('date','desc')->first();
        $weightLogs = WeightLog::where('user_id',$userId)->orderBy('date','desc')->paginate(8);
        return view('admin',compact('weightTarget','latestWeight','weightLogs'));
    }
    public function store(AdminRequest $request)
    {
        $form=$request->all();
        $form['user_id']=Auth::id();
        WeightLog::create($form);
        return redirect()->route('home');
    }
    public function updateLog(AdminRequest $request,$weightLogId)
    {
        $form=$request->all();
        $weightLog=WeightLog::findOrFail($weightLogId);
        $weightLog->update($form);
        return redirect()->route('home');
    }
    public function detail($weightLogId)
    {
        $weightLog=WeightLog::findOrFail($weightLogId);
        return view('index',compact('weightLog'));
    }
    public function setting()
    {
        return view('goal');
    }
    public function updateGoal(Request $request)
    {
        $request->validate([
            'target_weight' =>['required','numeric'],
        ]);    
        WeightTarget::updateOrCreate(
            ['user_id' => Auth::id()],
            ['target_weight' => $request->target_weight]
        );   
        return redirect()->route('home');
    }
    public function destroy($weightLogId)
    {
        $weightLog=WeightLog::findOrFail($weightLogId);
        $weightLog->delete();
        return redirect()->route('home');
    }
    public function search(Request $request)
    {
        if($request->has('reset')){
            return redirect()->route('home');
        }
        $query = WeightLog::query()->where('user_id',Auth::id());
        $query=$this->getSearchQuery($request,$query);
        $weightLogs=$query->orderBy('date','desc')
                          ->paginate(8)
                          ->appends($request->all());
        $userId = Auth::id();
        $weightTarget = WeightTarget::where('user_id', $userId)->latest()->first();
        $latestWeight = WeightLog::where('user_id', $userId)->orderBy('date', 'desc')->first();
        return view('admin',compact('weightLogs','weightTarget','latestWeight'));
    }
    private function getSearchQuery($request,$query)
    {
        if ($request->filled('start_date')){
            $query->whereDate('date','>=',$request->start_date);
        }
        if ($request->filled('end_date')){
            $query->whereDate('date','<=',$request->end_date);
        }
        return $query;
    }
}
