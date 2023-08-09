<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function showTerritories()
    {
        $response = Http::get('https://netzwelt-devtest.azurewebsites.net/Territories/All');

        if($response->successful()) {
            $territories = $response->json();

            return view('home',['territories' => $territories]);
        }else{
            return back()-withErrors(['message' => 'Error Fetching Data!']);
        }
    }
}