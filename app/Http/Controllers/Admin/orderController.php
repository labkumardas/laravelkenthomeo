<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class orderController extends Controller
{
        
    public function createOrder()
    {
        return view('admin.pages.create-product');
    }
    public function viewOrder()
    {
        return view('admin.pages.view-product');
    }
}
