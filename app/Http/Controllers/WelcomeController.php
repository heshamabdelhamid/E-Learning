<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Category;
use App\Reservation;
use App\Book;
use App\ContactUs;

Config(['auth.defaults.guard' => 'web']);

class WelcomeController extends Controller
{
    
     public function index(){

        $book = Book::orderBy('id','desc')->take(6)->get();

        $category = categories();
       	return view('welcome',compact('book'));
     }

     /*---------------------------------------------------------------------*/
       
       public function category($id){

       	    $category = Category::where('id',$id)->first();

           if(!empty($category)){

            $book = $category->books()->orderBy('id','desc')->paginate(6);

       	    return view('category.books',compact(['category','book']));
          }else{

              abort(404);
          }
       }

     /*---------------------------------------------------------------------*/

     public function book_reservation($id){
           
        $book = Book::with('reservation')->findOrFail($id);

     	   if($book->available == 'yes'){

     	   return view('book_reservation',compact(['book']));

         	}else{

         	   return back();
      	}

     }
     /*---------------------------------------------------------------------*/

        public function reservation_submit($id){

        	if(request()->ajax()){

        	   $book = Book::with('reservation')->find($id);

              if(!empty($book)){

        	   if($book->available == 'yes'){

               $reservation = Reservation::create(['student_id' => auth()->user()->id,'book_id' => $id]);
               $book->update(['available' => 'no']);
        	     return response(["status" => 200,'content' => $reservation]);	   	   

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
     /*---------------------------------------------------------------------*/

        public function search(){
           $book = Book::when(request()->book,function($query){
              return $query->where('title','like',"%".request()->book . "%")
                           ->orWhere('description',"like","%" . request()->book . "%");
          })->latest()->paginate(6);
            return view('search_book',compact('book'));
        }

     /*---------------------------------------------------------------------*/

         public function ContactUs(){
             
             $validate = request()->validate([
                   
                    "name" => "required|string",
                    "email" => "required|email",
                    "message" => "required|string",


              ],[],[

                "message" => 'الرساله'
              ]);


             ContactUs::create($validate);

             session()->flash('success_contact','تم ارسال رسالتك وسوف يتم الرد عليك قريبا');

             return back();

 
         }


     /*---------------------------------------------------------------------*/

}
