<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        return view('admin');
    }
    public function  update()
    {
        return view('update');
    }
    public function goal()
    {
        return view('goal');
    }
}
