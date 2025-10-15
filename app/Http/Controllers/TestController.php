<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TestController extends Controller
{
    function page_welcome(){
        return view('welcome');
    }
}
