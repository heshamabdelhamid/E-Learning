@extends("dashboard.layouts.app")

@section('title')
 {{trans('dashb.edit')}}
@endsection

@section("content")




<div class="card">
          <h5 class="card-header text-primary">{{ trans("dashb.edit") }}</h5>

  <div class="card-body">

    
            {!! Form::open(['url' => route('categories.update',$category->id)]) !!}
            @method('PUT')
<!-- ---------------------------------------------------------------------------------------- -->
     <div class="form-group">
       {!! Form::label('name', trans('dashb.name'), ['class' => 'awesome']) !!} 
       {!! Form::text("name",value($category->name),['class' => 'form-control']) !!}
         @if($errors->has('name'))
             <p class="text-danger text-uppercase">{{$errors->first('name')}}</p>
         @endif
    </div>   
<!-- ---------------------------------------------------------------------------------------- -->
    <div class="form-group">
       {!! Form::label('description', trans('dashb.description'), ['class' => 'awesome']) !!} 
       {!! Form::textarea("description",value($category->description),['class' => 'form-control ckeditor']) !!}
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