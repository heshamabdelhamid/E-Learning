<?php

namespace App\Http\Controllers\Dashboard;

use App\Reservation;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\DataTables\ReservationsDataTable;

class ReservationsController extends Controller
{




  public function __construct(){

      $this->middleware('permission:read_reservation')->only('index');
      $this->middleware('permission:update_reservation')->only(['edit','update']);
      $this->middleware('permission:delete_reservation')->only('destroy');
  }

// -------------------------------------------------------------------------------


    public function index(ReservationsDataTable $dataTable)
    {


    
        return $dataTable->render('dashboard.reservations.index');

    }



//--------------------------------------

    public function edit(Reservation $reservation)
    {


         
        return  view('dashboard.reservations.edit',compact('reservation'));

    }

// -------------------------------------------------------------------------------


    public function update(Request $request, Reservation $reservation)
    {

       $validate = $request->validate([
            
            "status" => "required|in:pending,active,refused,retrieved"

       ]);


       if($validate['status'] == 'refused'){

          \App\Book::where('id',$reservation->book_id)->update(['available' => 'yes']);
       }

      if($validate['status'] == 'retrieved'){

          \App\Book::where('id',$reservation->book_id)->update(['available' => 'yes']);
       }


        $reservation->update($validate);

        session()->flash('success',trans('dashb.success_update'));

        return redirect(route('reservations.index'));
    }

// -------------------------------------------------------------------------------

    public function destroy(Reservation $reservation)
    {

       $reservation->delete();

       session()->flash('success',trans('dashb.success_delete'));

        return redirect(route('reservations.index'));


    }
}
