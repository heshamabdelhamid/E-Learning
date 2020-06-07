@extends("dashboard.layouts.app")

@section('title')
 {{trans('dashb.create')}}
@endsection

@section("content")






<div class="card">
	  	    <h5 class="card-header text-primary">{{ trans("dashb.create_n_student") }}</h5>

  <div class="card-body">


       {!! Form::open(['url' => route('students.store')]) !!}
<!-- ---------------------------------------------------------------------------------------- -->
     <div class="form-group">
       {!! Form::label('full_name', trans('dashb.full_name'), ['class' => 'awesome']) !!}
       {!! Form::text("full_name",old('full_name'),['class' => 'form-control']) !!}
         @if($errors->has('full_name'))
             <p class="text-danger text-uppercase">{{$errors->first('full_name')}}</p>
         @endif
    </div>

  <!-- ---------------------------------------------------------------------------------------- -->

    <div class="form-group">
       {!! Form::label('student_id', trans('dashb.student_id'), ['class' => 'awesome']) !!}
       {!! Form::text("student_id",old('student_id'),['class' => 'form-control']) !!}
         @if($errors->has('student_id'))
             <p class="text-danger text-uppercase">{{$errors->first('student_id')}}</p>
         @endif
    </div>

  <!-- ---------------------------------------------------------------------------------------- -->
     <div class="form-group">
       {!! Form::label('level', trans('dashb.level'), ['class' => 'awesome']) !!}
       {!! Form::select("level",['1' => 1, '2' => 2, '3' => 3 ,"4" => 4],old('level'),['class' => 'form-control','placeholder' => '.....']) !!}
         @if($errors->has('level'))
             <p class="text-danger text-uppercase">{{$errors->first('level')}}</p>
         @endif
    </div>
  <!-- ---------------------------------------------------------------------------------------- -->
     <div class="form-group">
       {!! Form::label('password', trans('dashb.password'), ['class' => 'awesome']) !!}

       {!! Form::password("password",['class' => 'form-control']) !!}
         @if($errors->has('password'))
             <p class="text-danger text-uppercase">{{$errors->first('password')}}</p>
         @endif
    </div>
<!-- ---------------------------------------------------------------------------------------- -->
     <div class="form-group">
       {!! Form::label('password_confirmation', trans('dashb.password_confirmation'), ['class' => 'awesome']) !!}
       {!! Form::password("password_confirmation",['class' => 'form-control']) !!}
         @if($errors->has('password_confirmation'))
             <p class="text-danger text-uppercase">{{$errors->first('password_confirmation')}}</p>
         @endif
    </div>
<!-- ---------------------------------------------------------------------------------------- -->
     <div class="form-group">
       {!! Form::label('can_reservation', trans('dashb.can_reservation'), ['class' => 'awesome']) !!}
       {!! Form::select("can_reservation",[1 => trans('dashb.yes'),0=> trans('dashb.no')],old('can_reservation'),['class' => 'form-control']) !!}
         @if($errors->has('can_reservation'))
             <p class="text-danger text-uppercase">{{$errors->first('can_reservation')}}</p>
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
