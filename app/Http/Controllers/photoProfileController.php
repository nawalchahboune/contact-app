<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Traits\uploadTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class photoProfileController extends Controller
{
    use uploadTrait;
    /**
     * Handle the incoming request.
     */
    public function upload(Request $request)
    {
         
        $path =$this->uploadImage($request,'users');
        //User::create(['profile-image'=>$path]);
        //return $path;
        //uploadTrait::uploadTraitImage($request,'users');
        Auth::user()->profile_image
        = $path;
        
    }
}
