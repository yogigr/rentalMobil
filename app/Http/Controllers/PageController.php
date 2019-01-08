<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Car;
use App\Why;
use App\How;
use App\Contact;
use App\Http\Requests;
use Visitor;

class PageController extends Controller
{
    public function index()
    {
        //log visitor
        Visitor::log();

        $cars = Car::orderBy('created_at', 'desc')->take(3)->get();
        $whies = Why::orderBy('order_number', 'asc')->take(3)->get();
        $hows = How::orderBy('order_number', 'asc')->take(4)->get();
        $contact = Contact::firstOrFail();
    	return view('page.index', compact('cars', 'whies', 'hows', 'contact'));
    }

    public function paket()
    {
        //log visitor
        Visitor::log();

        $cars = Car::orderBy('created_at', 'desc')->get();
        $contact = Contact::firstOrFail();
    	return view('page.paket', compact('cars', 'contact'));
    }

    public function prosedur()
    {
        //log visitor
        Visitor::log();

        $hows = How::orderBy('order_number', 'asc')->get();
        $contact = Contact::firstOrFail();
    	return view('page.prosedur', compact('hows', 'contact'));
    }

    public function kontak()
    {
        //log visitor
        Visitor::log();
        
        $contact = Contact::firstOrFail();
    	return view('page.kontak', compact('contact'));
    }
}
