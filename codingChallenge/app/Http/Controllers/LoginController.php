<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function loginForm()
    {

        return view('login');
    }

    public function login(Request $request)
    {
        $response = Http::post('https://netzwelt-devtest.azurewebsites.net/Account/SignIn',[
            'username' => $request->input('username'),
            'password' => $request->input('password'),
        ]);

        if($response->successful()) {
            return redirect()->route('home');  // Valid credentials, log in the user and redirect to home
        } else{
            // Invalid credentials, return back to login
            return back()->withInput()->withErrors(['message' => 'Invalid Credentials!']);
        }
    }
}