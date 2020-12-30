<?php

namespace App\Http\Controllers\front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class WelcomeController extends Controller
{
    public function index()
    {
        $cek = session()->get('npm');
        if(isset($cek)){
            return redirect()->route('front.dashboard');
            
        }

        return view('front.home');
    }
}
