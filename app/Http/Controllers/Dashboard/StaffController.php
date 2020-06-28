<?php

namespace App\Http\Controllers\Dashboard;

use App\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\DataTables\StaffDataTable;

class StaffController extends Controller
{


  public function __construct(){

      $this->middleware('permission:create_staff')->only(['create','store']);
      $this->middleware('permission:read_staff')->only('index');
      $this->middleware('permission:update_staff')->only(['edit','update']);
      $this->middleware('permission:delete_staff')->only('destroy');
  }


// -------------------------------------------------------------------------------


    public function index(StaffDataTable $dataTable)
    {



       return $dataTable->render('dashboard.staff.index');

    }

// -------------------------------------------------------------------------------


    public function create()
    {

        return view('dashboard.staff.create');
    }

// -------------------------------------------------------------------------------


    public function store(Request $request)
    {
         $validate = $request->validate([

              "name" => 'required|min:3|string',
              "email" => 'required|min:3|string|unique:admins',
              "phone" => 'required|min:6|string',
              "password" => 'required|confirmed|min:6|string',
         ]);


        $validate['password'] = bcrypt($request->password);
        $validate['level'] = 'staff';


        $admin = Admin::create($validate);

        $admin->assignRole('staff');


         if(request()->has('permission')){

                  $admin->givePermissionTo(request()->permission);
            }


         session()->flash('success',trans('dashb.success_create'));


         return redirect(route('staff.index'));
    }

// -------------------------------------------------------------------------------



// -------------------------------------------------------------------------------


    public function edit($id)
    {

       $admin = Admin::findOrFail($id);

        return  view('dashboard.staff.edit',compact('admin'));

    }

// -------------------------------------------------------------------------------


    public function update(Request $request,$id)
    {

               $admin = Admin::findOrFail($id);


         $validate = $request->validate([

              "name" => 'required|min:3|string',
              "email" => 'required|min:3|string|unique:admins,email,'.$admin->id.'id',
              "phone" => 'required|min:6|string',


         ]);

         if(request()->has('password') && request()->password != ''){

            request()->validate(["password" => 'sometimes|nullable|confirmed|min:6|string']);

            $validate['password'] = bcrypt($request->password);

         }


        $admin->update($validate);


         if(request()->has('permission')){

               $admin->syncPermissions(request()->permission);
            }


         session()->flash('success',trans('dashb.success_update'));

         return redirect(route('staff.index'));
    }

// -------------------------------------------------------------------------------

    public function destroy($id)
    {


        $admin = Admin::findOrFail($id);



       $admin->delete();

       session()->flash('success',trans('dashb.success_delete'));

        return redirect(route('staff.index'));


    }
}
