<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;

class LogoutController extends Controller
{
    function logout()
    {
    	Auth::logout();
    	return redirect()->route('login');
    }

    function frontlogout()
    {
    	Auth::logout();
    	return redirect('/');
    }
}
