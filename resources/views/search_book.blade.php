@extends('layouts.app')

@section('title')
 كتبي
@endsection


@section('content')

        <article class="books-section">
            <div class="container">

                <div class="row">


    @if($book->total() > 0)

     @foreach($book as $books)
                    <div class="col">
                        <div class="book-body">
                            <div class="book-img">
                                <img src="{{asset('storage/'.$books->photo)}}" alt="books" />
                            </div>
                            <div class="book-info">
                                <span class="category">
                                	{{$books->category->name == 'undefined‏' ? 'عام' : $books->category->name }}
                                </span>
                                <h3 class="book-name">{{$books->title}}</h3>
                                

                                 @if($books->available == 'yes') 
                                     <div class="booking">
                                       <span class="status status-yas">
                                           متاح
                                       </span>
                                       <a href="{{route('book_reservation',$books->id)}}" class="status status-yas" style="margin-right: 5px;">
                                           حجز
                                       </a>

                                    </div>

                                 @else
                                  

                                          <span class="status status-no">
                                            غير متاح
                                          </span>   
   
                                 @endif
               
     
         
                                
                            </div>
                            <div class="book-details">
                                <div class="stars">
                                    <i class="staricon-"></i>
                                    <i class="staricon-"></i>
                                    <i class="staricon-"></i>
                                    <i class="staricon-"></i>
                                    <i class="staricon-"></i>
                                </div>
                                <div class="booking">
                                @guest
                                
                                @else    
                                <i class=" {{!empty(checkLike($books->id)) ? 'fa fa-heart' :'heart-emptyicon-'}} love" id="addLike" data-id="{{$books->id}}">
                       
                                 </i>      
                                 @endguest
                                </div>

                            </div>
                        </div>
                    </div>

          @endforeach 


            </div> 
            <div class="d-flex justify-content-center mt-3">

                {{ $book->appends(request()->query())->links() }}

            </div>
         @else
         <center><h4>عفوا لا يوجد كتاب بهذ الاسم</h4></center>
         
         @endif     
                        
  
            </div>
        </article>



@endsection