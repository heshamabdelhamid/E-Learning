@extends('layouts.app')

@section('title')
 كتبي
@endsection


@push('js')

<script type="text/javascript">
	$(function(){
      $(".cancel").click(function(){
      	 var reservation_id = $(this).data('id');

      	 $('.form_cancel').attr('action','/reservation_cancel/'+reservation_id);
      });

	});
</script>


@endpush


@section('content')

        <article class="books-section">
            <div class="container">
 

@if(session()->has('success'))

 <div class="alert alert-success alert-dismissible fade show  text-center" role="alert">
  <strong>تم الغا الحجز</strong> 

  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>
@endif



@if($reservation->count() > 0)


    
 <div class="alert alert-warning alert-dismissible fade show text-center mb-5" role="alert">
  <strong>يجب ان يكون استلام الكتاب في مده خلال 72 ساعه والا سيتم الغاء الحجز</strong> 

  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>


                <div class="row">

         @foreach($reservation as $reservations)

                    <div class="col">
                        <div class="book-body">
                            <div class="book-img">
                                <img src="{{asset('storage/'.$reservations->book->photo)}}" alt="books" />
                            </div>
                            <div class="book-info">

                                <h3 class="book-name">{{$reservations->book->title}}</h3>
                                

                                 @if($reservations->status == 'pending') 
                                     <div class="booking">


			       <button type="button" class="btn btn-danger cancel"  data-id="{{$reservations->id}}"data-toggle="modal" data-target="#exampleModal">
												  الغاء الحجز 
									   </button>
                                     </div>
                                   
                                   @elseif($reservations->status == 'retrieved')
                                       <button class="btn btn-success">
                                       	  تمت قرأته
                                       </button>

                                    @else($reservations->status == 'active') 
                                     <button class="btn btn-success">
                                        لديك
                                       </button>  

    
   
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
                    
                                 <i class=" {{!empty(checkLike($reservations->book->id)) ? 'fa fa-heart' :'heart-emptyicon-'}} love" id="addLike" data-id="{{$reservations->book->id}}">
                       
                                 </i>
                                
                                </div>

                            </div>
                        </div>
                    </div>



         @endforeach


            </div> 
            <div class="d-flex justify-content-center mt-3">


            </div>
         @else
         <center class='text-center'><h4>عفوا لا يوجد كتب </h4></center>
         
         @endif     
                        
  
            </div>
        </article>


<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body text-center">
        هل انت متاكد من الغاء حجز الكتاب
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">غلق</button>
        <form method="post" class="form_cancel">
        	@csrf
        	<button type="submit" class="btn btn-danger">الغاء الحجز</button>
        </form>
      </div>
    </div>
  </div>
</div>

@endsection