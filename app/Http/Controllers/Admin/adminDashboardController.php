<?php

namespace App\Http\Controllers\Admin;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class adminDashboardController extends Controller
{
    public function index()
    {
        return view('admin.pages.dashboard');
    }



    public function logout()
    {
        Auth::logout();
        return redirect('/');
    }
    
    
}
