<?php

namespace App\Http\Controllers\Website\Main;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public  function index()
    {
        return view('website.home.index');
    }
}
