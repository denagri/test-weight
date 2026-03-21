<?php

namespace App\Http\Controllers;

use App\Actions\Fortify\CreateNewUser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Models\user;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function createStep1()
    {
        return view('auth.register-step1');
    }
    public function postStep1(Request $request)
    {
        $validated = $request->validate([
            'name' => ['required', 'string'],
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);
        Session::put('register_data', $validated);
        return redirect()->route('register.step2');
    }
    public function createStep2()
    {
        return view('auth.register-step2');
    }
    public function store(Request $request, CreateNewUser $creator)
    {
        $input=array_merge(Session::get('register_data',[]),$request->all());
        $user = $creator->create($input);
        Session::forget('register_data');
        Auth::login($user);

        return redirect('home');
    }
}