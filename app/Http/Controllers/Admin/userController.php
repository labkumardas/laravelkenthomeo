<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class userController extends Controller
{
    public function createUser()
    {
        return view('admin.pages.create-product');
    }
    public function viewUser()
    {
        return view('admin.pages.view-product');
    }
}
