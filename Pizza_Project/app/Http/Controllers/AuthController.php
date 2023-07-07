<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    // Direct to Login Page
     public function login(){
        return view('login');
     }

    // Direct to Register Page
     public function register(){
        return view('register');
     }

     // Dashboard
     public function dashboard(){
        if(Auth::user()->role == 'admin'){
            return to_route('category#list');
        }
        return to_route('user#home');
     }
}
