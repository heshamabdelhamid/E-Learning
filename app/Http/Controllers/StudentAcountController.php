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
         

        $remember_me = request()->remember ? true : false;

        if(auth()->attempt(['student_id' => request()->student_id,'password' => request()->password],$remember_me)){

            return redirect(route('welcome'));
        }
            session()->flash("failed","id or password not correct!");

            return back();
    }

    /*----------------------------------------------------*/


    public function logout(){

         auth()->logout();

        return redirect("/");
    }
}
