<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        return view('admin');
    }
    public function  detail()
    {
        return view('index');
    }
    public function goal()
    {
        return view('goal');
    }
}
