<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ImgUploade extends Controller
{
    

    public function uploadeImage($prev_img = null,$file_request,$folder_name){

    	 if($prev_img != null){
    	 	\Storage::delete($prev_img);
    	 }

    	 if($file_request){

    	 	$hasName = $file_request->hashName();

    	 	return $file_request->storeAs('public/'.$folder_name,$hasName);
    	 }
    }
}
