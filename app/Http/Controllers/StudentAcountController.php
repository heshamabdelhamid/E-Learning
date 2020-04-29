<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

 Config(['auth.defaults.guard' => 'web']);


class StudentAcountController extends Controller
{
   

    public function login(){

        return view('student.login');


    }

/*----------------------------------------------------*/

    public function loginSubmit(){
         


        if(auth()->attempt(['student_id' => request()->student_id,'password' => request()->password])){

            return redirect(route('welcome'));
        }else{


            return back();
        }
    }

    /*----------------------------------------------------*/


    public function logout(){

         auth()->logout();

        return redirect("/");
    }
}
