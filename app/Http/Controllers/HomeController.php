<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        return view('home.index');
    }
    public function about()
    {
        return view('home.about');
    }
    public function contact()
    {
        return view('home.contact');
    }
    public function registerPilot()
    {
        return view('home.register.pilot');
    }
    public function listPilots()
    {
        return view('home.list.pilots');
    }
    public function estadisticPilots()
    {
        return view('home.estadistic.pilots');
    }
}
