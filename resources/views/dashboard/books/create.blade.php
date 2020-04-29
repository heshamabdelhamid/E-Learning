@extends("dashboard.layouts.app")

@section('title')
 {{trans('dashb.create')}}
@endsection

@section("content")






<div class="card">
	  	    <h5 class="card-header text-primary">{{ trans("dashb.create") }}</h5>

  <div class="card-body">

    
       {!! Form::open(['url' => route('books.store'),"files" => true]) !!}
<!-- ---------------------------------------------------------------------------------------- -->
     <div class="form-group">
       {!! Form::label('title', trans('dashb.title'), ['class' => 'awesome']) !!} 
       {!! Form::text("title",old('title'),['class' => 'form-control']) !!}
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
        
     <div style="width: 160px;height: 190">  
        <img src="{{asset('books/default.jpg')}}" class="showIm blah mt-2" width="100%" height="100%">

      </div>   

    </div>   
<!-- ---------------------------------------------------------------------------------------- -->
 <div class="form-group">
       {!! Form::label('category_id', trans('dashb.category_id'), ['class' => 'awesome']) !!} 
       {!! Form::select("category_id",$categories,old('category_id'),['class' => 'form-control']) !!}

    </div>   

<!-- ---------------------------------------------------------------------------------------- -->

 <div class="form-group">
       {!! Form::label('available', trans('dashb.available'), ['class' => 'awesome']) !!} 
       {!! Form::select("available",['yes' => trans('dashb.yes'),'no' => trans('dashb.no')],old('available'),['class' => 'form-control']) !!}

 </div>   

<!-- ---------------------------------------------------------------------------------------- -->
  
<!-- ---------------------------------------------------------------------------------------- -->
    <div class="form-group">
       {!! Form::label('description', trans('dashb.description'), ['class' => 'awesome']) !!} 
       {!! Form::textarea("description",old('description'),['class' => 'form-control ckeditor']) !!}
         @if($errors->has('description'))
             <p class="text-danger text-uppercase">{{$errors->first('description')}}</p>
         @endif
    </div> 
<!-- ---------------------------------------------------------------------------------------- --> 


  
     <div class="form-group">
       {!! Form::submit(trans("dashb.create"),['class' => 'btn btn-info']) !!}
     </div>  
   <!-- ----------------------------------------------------------------------------------------  -->

       {!! Form::close() !!}


  </div>
</div>

@endsection