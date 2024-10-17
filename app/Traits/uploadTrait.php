<?php
namespace app\Traits;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

trait uploadTrait{
 public function uploadImage(Request $request,$foldername){
        $image = $request->file('profile_picture')->getClientOriginalName();
        $path=$request->file('profile_picture')->storeAs( $foldername,$image,'image');
        
        return $path;
  }
}