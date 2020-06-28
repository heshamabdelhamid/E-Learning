@extends('layouts.app')

@section('title')
 كتبي
@endsection


@section('content')

        <article class="books-section">
            <div class="container">

                <div class="row">

    @if($books->count() > 0)

        @foreach($books as $book)
            <div class="col">
                <div class="book-body">
                    <div class="book-img">
                        <img src="{{asset('books/'.$book->photo)}}" alt="book" />
                    </div>
                    <div class="book-info">
                        <span class="category">
                            {{$book->category->name == 'undefined‏' ? 'عام' : $book->category->name }}
                        </span>
                        <h3 class="book-name">{{$book->title}}</h3>


                            @if($book->available)
                            @if(auth()->user() && auth()->user()->can_reservation)

                                <div class="booking">
                                <span class="status status-yas">
                                    متاح
                                </span>
                                <a href="{{route('book_reservation',$book->id)}}" class="status status-yas" style="margin-right: 5px;">
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
                        @if($book->available)
                            @if(auth()->user() && auth()->user()->can_reservation)
                                <a href="{{route('book_reservation',$book->id)}}" class="status status-yas" style="margin-right: 5px;float: right;">
                                    حجز
                                </a>
                            @endif
                        @endif
                        <div class="booking">
                            @guest

                            @else
                                <i class=" {{!empty(checkLike($book->id)) ? 'fa fa-heart' :'heart-emptyicon-'}} love" id="addLike" data-id="{{$book->id}}"></i>
                            @endguest
                        </div>

                    </div>
                </div>
            </div>

        @endforeach


            </div>
            <div class="d-flex justify-content-center mt-3">

                {{ $books->appends(request()->query())->links() }}

            </div>
    @else

        <h4 class="h4-css">عفوا لا يوجد هذا الكتاب</h4>

    @endif


            </div>
        </article>



@endsection
