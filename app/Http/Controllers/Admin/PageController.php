<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Visitor;

class PageController extends Controller
{	
    public function dashboard()
    {
    	$visitors = Visitor::all();
    	return view('admin.page.dashboard', compact('visitor'));
    }
}
