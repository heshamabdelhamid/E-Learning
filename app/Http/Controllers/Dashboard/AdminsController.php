<?php

namespace App\Http\Controllers\Dashboard;

use App\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\DataTables\AdminsDataTable;


class AdminsController extends Controller
{

  
  public function __construct(){

      $this->middleware('permission:create_admin')->only(['create','store']);
      $this->middleware('permission:read_admin')->only('index');
      $this->middleware('permission:update_admin')->only(['edit','update']);
      $this->middleware('permission:delete_admin')->only('destroy');
  }


// -------------------------------------------------------------------------------


    public function index(AdminsDataTable $dataTable)
    {
        


       return $dataTable->render('dashboard.admins.index');

    }  
// -------------------------------------------------------------------------------


    public function create()
    {
       
        return view('dashboard.admins.create');
    }

// -------------------------------------------------------------------------------


    public function store(Request $request)
    {

      
         $validate = $request->validate([
   
              "name" => 'required|min:3|string',
              "email" => 'required|email|unique:admins',
              "phone" => 'required|min:6|string',
              "password" => 'required|confirmed|min:6|string',

            
         ]);

            
        $validate['password'] = bcrypt($request->password);
        $validate['level'] = 'admin';


        $admin = Admin::create($validate);

        $admin->assignRole('admin');

         if(request()->has('permission')){

                  $admin->givePermissionTo(request()->permission);
            }


         session()->flash('success',trans('dashb.success_create'));

         return redirect(route('admins.index'));
    }

// -------------------------------------------------------------------------------


    // public function show($id)
    // {
    //     //
    // }

// -------------------------------------------------------------------------------


    public function edit(Admin $admin)
    {


         
        return  view('dashboard.admins.edit',compact('admin'));

    }

// -------------------------------------------------------------------------------


    public function update(Request $request, Admin $admin)
    {


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

         return redirect(route('admins.index'));
    }

// -------------------------------------------------------------------------------

    public function destroy(Admin $admin)
    {



       $admin->delete();

       session()->flash('success',trans('dashb.success_delete'));

        return back();


    }
}
