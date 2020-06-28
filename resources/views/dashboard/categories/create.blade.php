@extends("dashboard.layouts.app")

@section('title')
 {{trans('dashb.create')}}
@endsection

@section("content")



<div class="card">
	  	    <h5 class="card-header text-primary">{{ trans("dashb.create") }}</h5>

  <div class="card-body">


       {!! Form::open(['url' => route('categories.store')]) !!}
<!-- ---------------------------------------------------------------------------------------- -->
     <div class="form-group">
       {!! Form::label('name', trans('dashb.name'), ['class' => 'awesome']) !!}
       {!! Form::text("name",old('name'),['class' => 'form-control']) !!}
         @if($errors->has('name'))
             <p class="text-danger text-uppercase">{{$errors->first('name')}}</p>
         @endif
    </div>
<!-- ---------------------------------------------------------------------------------------- -->
    <div class="form-group">
       {!! Form::label('description', trans('dashb.description'), ['class' => 'awesome']) !!}
       {!! Form::textarea("description",old('description'),['class' => 'form-control ']) !!}
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
