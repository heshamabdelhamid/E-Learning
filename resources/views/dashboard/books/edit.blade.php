@extends("dashboard.layouts.app")

@section('title')
 {{trans('dashb.edit')}}
@endsection

@section("content")





<div class="card">
          <h5 class="card-header text-primary">{{ trans("dashb.edit") . " " . $book->title }}</h5>

  <div class="card-body">

    
       {!! Form::open(['url' => route('books.update',$book->id),"files" => true]) !!}
       @method('PUT')
<!-- ---------------------------------------------------------------------------------------- -->
     <div class="form-group">
       {!! Form::label('title', trans('dashb.title'), ['class' => 'awesome']) !!} 
       {!! Form::text("title",value($book->title),['class' => 'form-control']) !!}
         @if($errors->has('title'))
             <p class="text-danger text-uppercase">{{$errors->first('title')}}</p>
         @endif
    </div>   
<!-- ---------------------------------------------------------------------------------------- -->
     <div class="form-group">
       {!! Form::label('photo', trans('dashb.photo'), ['class' => 'awesome']) !!} 
       {!! Form::file("photo",['class' => 'form-control', 'id' => 'imgInp']) !!}
         @if($errors->has('photo'))
             <p class="text-danger text-uppercase">{{$errors->first('photo')}}</p>
         @endif
        
   @if($book->photo == 'books/default.jpg')
     <div style="width:160px;height:160px">
        <img src="{{asset('books/default.jpg')}}" class="showIm blah mt-2" width="100%" height="100%">
    @else
   <div style="width:160px;height:160px">
     <img src="{{asset('storage/'.$book->photo)}}"  class="showIm blah mt-2" width="100%" height="100%">     
   </div>

    @endif

    </div>   
<!-- ---------------------------------------------------------------------------------------- -->
 <div class="form-group">
       {!! Form::label('category_id', trans('dashb.category_id'), ['class' => 'awesome']) !!} 
       {!! Form::select("category_id",$categories,value($book->category_id),['class' => 'form-control']) !!}

    </div>   

<!-- ---------------------------------------------------------------------------------------- -->
   <div class="form-group">
       {!! Form::label('available', trans('dashb.available'), ['class' => 'awesome']) !!} 
       {!! Form::select("available",['yes' => trans('dashb.yes'),'no' => trans('dashb.no')],value($book->available),['class' => 'form-control']) !!}

 </div>  
<!-- ---------------------------------------------------------------------------------------- -->
    <div class="form-group">
       {!! Form::label('description', trans('dashb.description'), ['class' => 'awesome']) !!} 
       {!! Form::textarea("description",value($book->description),['class' => 'form-control ckeditor']) !!}
         @if($errors->has('description'))
             <p class="text-danger text-uppercase">{{$errors->first('description')}}</p>
         @endif
    </div> 
<!-- ---------------------------------------------------------------------------------------- --> 


  
     <div class="form-group">
       {!! Form::submit(trans("dashb.edit"),['class' => 'btn btn-info']) !!}
     </div>  
   <!-- ----------------------------------------------------------------------------------------  -->

       {!! Form::close() !!}


  </div>
</div>

@endsection