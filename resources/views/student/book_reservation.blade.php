@extends('layouts.app')

@section('title')
مكتبة الدلتا
@endsection


@push('js')

<script type="text/javascript">
	$(function(){
       $("#reservationBook").click(function(e){


         $.ajax({

          url:"{{route('reservation_submit',$book->id)}}",
          method:'post',
          type:'json',
          data:{_token:"{{csrf_token()}}"},
          beforeSend:function(){

          },
          success:function(data){
             
                 $(".showSuccess").removeClass('d-none');

             setTimeout(function(){
                    window.location.href = "{{route('student_books')}}";
                    
              }, 4000);

          },
          error:function(data){

             window.location.href = "{{route('welcome')}}";

          }



         });

       });
        

	});
</script>

@endpush


@section('content')

<div class="container">


<div class="alert alert-success alert-dismissible fade show d-none showSuccess text-center" role="alert">
  <strong>تم الحجز</strong> برجاء التوجه للمخروبه لاستلام الكتاب 
   <br>
   <span>
      سوف يتم تحويلك لصفحة الكتب الخاصه بك
   </span>
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>


 <article class="books-section">
            <div class="container">
                <div class="row">

                    <div class="col-sm-5">
                        <div class="book-body">
                            <div class="book-img">
                                <img src="{{asset('storage/'.$book->photo)}}" alt="books" />
                            </div>
                            <div class="book-info">
                                <span class="category">قسم تاريخ</span>
                                <h3 class="book-name">كتاب حلو بس مجهد</h3>
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
                                    
                                      {{$book->bookLikes()->count()}} اعجاب
                                    
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-sm-7 text-right">
                      {!! $book->description !!}

                      <div>
                       <a href="#" data-id="{{$book->id}}" class="btn btn-success" id="reservationBook">
                           تأكيد الحجز
                       </a>
                      </div>
                    </div>


    
  

                </div>
            </div>
        </article>







</div>
@endsection

      

     