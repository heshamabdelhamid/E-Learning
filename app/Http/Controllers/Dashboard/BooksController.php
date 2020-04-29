<?php

namespace App\Http\Controllers\Dashboard;

use App\Book;
use App\Category;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\DataTables\BooksDataTable;

class BooksController extends Controller
{




  public function __construct(){

      $this->middleware('permission:create_book')->only(['create','store']);
      $this->middleware('permission:read_book')->only('index');
      $this->middleware('permission:update_book')->only(['edit','update']);
      $this->middleware('permission:delete_book')->only('destroy');
  }

// -------------------------------------------------------------------------------


    public function index(BooksDataTable $dataTable)
    {

    
        return $dataTable->render('dashboard.books.index');

    }

// -------------------------------------------------------------------------------


    public function create()
    {
        $categories = Category::pluck('name','id'); 
       
        return view('dashboard.books.create',compact('categories'));
    }

// -------------------------------------------------------------------------------


    public function store(Request $request)
    {


      
         $validate = $request->validate([
              
              "title" => 'required|string|unique:books',
              "category_id" => 'sometimes|nullable|numeric',
              "photo" => checkImage(),
              "description" => 'required|min:30|string',
              "available" => 'sometimes|nullable|in:yes,no',
            
         ]);

         if($request->hasFile('photo')){
             
             $replace = str_replace('public/', '', uploade()->uploadeImage(null,$request->file('photo'),'books'));


            $validate['photo'] = $replace;
         }

  
     if(request()->category_id == null){

        $validate['category_id'] = 1;
     }

  

        Book::create($validate);

        session()->flash('success',trans('dashb.success_create'));

        return redirect(route('books.index'));
    }

// -------------------------------------------------------------------------------


 
// -------------------------------------------------------------------------------


    public function edit(Book $book)
    {

         $categories = Category::pluck('name','id'); 

         
        return  view('dashboard.books.edit',compact(['book','categories']));

    }

// -------------------------------------------------------------------------------


    public function update(Request $request, Book $book)
    {


       $validate = $request->validate([
              
              "title" => 'required|string|unique:books,title,'.$book->id.'id',
              "category_id" => 'sometimes|nullable|numeric',
              "photo" => checkImage(),
              "description" => 'required|min:30|string',
              "available" => 'sometimes|nullable|in:yes,no',

            
         ]);


        if($request->hasFile('photo')){

            $prev_im = !empty($book->photo) && $book->photo != 'books/default.jpg' ? $book->photo : null;
             
             $replace = str_replace('public/', '', uploade()->uploadeImage('public/'.$prev_im,$request->file('photo'),'books'));


            $validate['photo'] = $replace;
         }

        $book->update($validate);

        session()->flash('success',trans('dashb.success_update'));

        return redirect(route('books.index'));
    }

// -------------------------------------------------------------------------------

    public function destroy(Book $book)
    {


     if(!empty($book->photo) && $book->photo != 'books/default.jpg'){

        \Storage::delete('public/'.$book->photo); 
     }


       $book->delete();

       session()->flash('success',trans('dashb.success_delete'));

        return redirect(route('books.index'));


    }
}
