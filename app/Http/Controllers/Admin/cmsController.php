<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class cmsController extends Controller
{
    public function aboutUs()
    {
        return view('admin.pages.cms.about-us');
    }
}
