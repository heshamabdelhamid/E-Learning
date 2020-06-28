@extends('layouts.app')

@section('title')

{{$category->name == 'undefined‏' ? 'عام' : $category->name }}

@endsection

@section('content')



        <article class="books-section">

            <div class="container">
                <div>
                    <h4 style="float:right;">{{$category->name == 'undefined‏' ? 'عام' : $category->name }}</h4>

                    <div style="clear: both;" class="mb-4"></div>
                </div>
                <div class="row">


    @if($book->count() > 0)

     @foreach($book as $books)
                    <div class="col">
                        <div class="book-body">
                            <div class="book-img">
                                <img src="{{asset('books/'.$books->photo)}}" alt="books" />
                            </div>
                            <div class="book-info">

                                <span class="category">
                                	{{$category->name == 'undefined‏' ? 'عام' : $category->name }}
                                </span>

                                <h3 class="book-name">{{$books->title}}</h3>


                                 @if($books->available)
                                    @if(auth()->user() && auth()->user()->can_reservation)
                                     <div class="booking">
                                       <span class="status status-yas p-2">
                                           متاح
                                       </span>
                                  <a href="{{route('book_reservation',$books->id)}}" class="status status-yas p-2" style="margin-right: 5px;">
                                           حجز
                                       </a>

                                    </div>

                                    @else
                                          <span class="status status-no">
                                            غير متاح
                                          </span>
                                    @endif

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

                          <i class=" {{!empty(checkLike($books->id)) ? 'fa fa-heart' :'heart-emptyicon-'}} love" id="addLike" data-id="{{$books->id}}"></i>
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
         <center><h4>عفوا لا يوجد كتب حاليا في هذا القسم</h4></center>

         @endif


            </div>
        </article>

@endsection

