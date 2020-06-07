<?php

namespace App\Http\Controllers\Dashboard;

use App\Student;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\DataTables\StudentsDataTable;


class StudentsController extends Controller
{


  public function __construct(){

      $this->middleware('permission:create_students')->only(['create','store']);
      $this->middleware('permission:read_students')->only('index');
      $this->middleware('permission:update_students')->only(['edit','update']);
      $this->middleware('permission:delete_students')->only('destroy');

  }


// -------------------------------------------------------------------------------


    public function index(StudentsDataTable $dataTable)
    {

       return $dataTable->render('dashboard.students.index');

    }

// -------------------------------------------------------------------------------


	public function create(){


       return view('dashboard.students.create');


	}


// -------------------------------------------------------------------------------
	public function store(){

        $validate = request()->validate([

           "full_name" => "required|string|unique:students",
           "student_id" => "required|numeric|unique:students",
           "level" => "required|in:1,2,3,4",
           "password" => 'required|confirmed|min:6|string',
           "can_reservation" => "required|in:1,0",

         ],[],[

           "full_name" => "الاسم",
           "student_id" => "id الطالب"

         ]);

         $validate['password'] = bcrypt(request()->password);

          Student::create($validate);

          session()->flash('success',trans('dashb.success_create'));

          return redirect(route('students.index'));


	}
// -------------------------------------------------------------------------------

	public function edit(Student $student){

		 return view('dashboard.students.edit',compact('student'));

	}
// -------------------------------------------------------------------------------

    public function update(Student $student){


        $validate = request()->validate([

           "full_name" => "required|string|unique:students,full_name,".$student->id."id",
           "student_id" => "required|numeric|unique:students,student_id,".$student->id."id",
           "level" => "required|in:1,2,3,4",
           "can_reservation" => "required|in:1,0",

         ],[],[

           "full_name" => "الاسم",
           "student_id" => "id الطالب"

         ]);

        if(request()->has('password') && request()->password != ''){

        	 request()->validate([
               "password" => "required|confirmed|min:6|string",

        	 ]);

        	$validate['password'] = bcrypt(request()->password);
        }


         $student->update($validate);

         session()->flash('success',trans('dashb.success_update'));

         return redirect(route('students.index'));

    }

// -------------------------------------------------------------------------------

  public function destroy(Student $student){

  	     $student->delete();
         session()->flash('success',trans('dashb.success_delete'));

         return redirect(route('students.index'));

  }


	/*
	*/
// -------------------------------------------------------------------------------

}
