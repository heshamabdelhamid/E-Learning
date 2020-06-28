<?php

namespace App\Http\Controllers;

use App\Student;
use Illuminate\Http\Request;
use App\Reservation;
use App\Book;
use App\BookLikes;

Config(['auth.defaults.guard' => 'web']);

class StudentController extends Controller
{


 /*---------------------------------------------------------------------*/

     public function book_reservation($id){

        $book = Book::with('reservation')->findOrFail($id);

        if($book->available && auth()->user()->can_reservation ){

            return view('student.book_reservation',compact(['book']));

        }else{

            return redirect(route('welcome'));
        }

     }
     /*---------------------------------------------------------------------*/

        public function reservation_submit($id){

            if(request()->ajax()){

               $book = Book::with('reservation')->find($id);

          if(!empty($book)){

               if($book->available  && auth()->user()->can_reservation){

               $reservation = Reservation::create(['student_id' => auth()->user()->id,'book_id' => $id]);

               $book->update(['available' => 0]);


              return response(["status" => 200]);

               }else{

               return response(["status" => 304,'content' => 'not available']);
              }

            }else{

              return response(["status" => 304,'content' => 'not available']);

            }

            }else{

                return redirect(route('welcome'));

            }


        }
//--------------------------------------------------------------------

    public function student_books(){

      $reservation = Reservation::where('student_id' ,auth()->user()->id)->where('status' ,'!=','refused')->get();



         return view('student.student_books',compact(['reservation']));
    }

//=============================================================================


    public function reservation_cancel( $id){



          $reservation = Reservation::find($id);

          if(!empty($reservation )){


           \App\Book::where('id',$reservation->book_id)->update(['available' => 1]);

             $reservation->delete();

              session()->flash('success','تم الغاء الحجز');

              return redirect(route('student_books'));

          }else{

             return redirect(route('welcome'));


          }





    }

//=============================================================================


  public function addLike($book_id){

       if(request()->ajax()){

             $book = Book::find($book_id);

             if(!empty($book)){

              \App\BookLikes::create(['book_id' => $book_id,'student_id' => auth()->user()->id]);

               return response(['status' => 'ok'],200);

             }else{
              return response(['status' => 'error'],304);
             }


           return response(['status' => 'error'],304);




          }else{

            return response(['status' => 'error'],304);
          }



       }
//=============================================================================


  public function disLike($book_id){

       if(request()->ajax()){

        $bookLikes = BookLikes::where('book_id',$book_id)->where('student_id', auth()->user()->id)->first();

             if(!empty($bookLikes)){

               $bookLikes->delete();

              return response(['status' => 'ok'],200);



             }else{
              return response(['status' => 'error'],304);
             }


           return response(['status' => 'error'],304);




          }else{

            return response(['status' => 'error'],304);
          }



       }




//=============================================================================

  public function profile(){

     return view('student.profile');
  }


//=============================================================================






}
