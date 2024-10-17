<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class DashBoardController extends Controller
{

    public function __construct(){

        // Check if user is logged in
        
    }
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        Storage::disk('nawal')->put('dashboard.txt', 'Welcome to your dashboard');

        //
        return view('dashboard');
    }
}
