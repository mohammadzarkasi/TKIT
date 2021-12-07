<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminHomeController extends Controller
{
    public function index(Request $req)
    {
        return view('admin.home');
    }
}
