<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Pages extends Controller
{
    function home(){
        return view('pages.home');
    }
}
