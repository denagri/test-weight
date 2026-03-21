<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\WeightTarget;
use App\Models\WeightLog;

class AdminController extends Controller
{
    public function index()
    {    
        $weightTarget = WeightTarget::latest()->first(); 
        $latestWeight = WeightLog::latest()->first();
        $weightLogs = WeightLog::select('date','weight','calories','exercise_time')->paginate(8);
        return view('admin',compact('weightTarget','latestWeight','weightLogs'));
    }
    public function  detail()
    {
        return view('index');
    }
    public function setting()
    {
        return view('goal');
    }
    public function update(Request $request)
    {
        $request->validate([
            'target_weight' =>'required','numeric',
        ]);    
        \App\Models\WeightTarget::updateOrCreate(
        ['user_id' => auth()->id()],
        ['target_weight' => $request->target_weight]
        );   
        return redirect()->route('home');
    }
}
