@extends("dashboard.layouts.app")

@section('title')
 {{trans('dashb.edit')}}
@endsection

@section("content")






<div class="card">
          <h5 class="card-header text-primary">{{ trans("dashb.edit_n_staff") . $admin->name}} </h5>

  <div class="card-body">

    
       {!! Form::open(['url' => route('staff.update',$admin->id)]) !!}
       @method('PUT')
<!-- ---------------------------------------------------------------------------------------- -->
     <div class="form-group">
       {!! Form::label('name', trans('dashb.name'), ['class' => 'awesome']) !!} 
       {!! Form::text("name",value($admin->name),['class' => 'form-control']) !!}
         @if($errors->has('name'))
             <p class="text-danger text-uppercase">{{$errors->first('name')}}</p>
         @endif
    </div>   
  <!-- ---------------------------------------------------------------------------------------- -->     
  <div class="form-group">
       {!! Form::label('email', trans('dashb.email'), ['class' => 'awesome']) !!} 
       {!! Form::email("email",value($admin->email),['class' => 'form-control']) !!}
         @if($errors->has('email'))
             <p class="text-danger text-uppercase">{{$errors->first('email')}}</p>
         @endif
    </div>   
  <!-- ---------------------------------------------------------------------------------------- -->
     <div class="form-group">
       {!! Form::label('phone', trans('dashb.phone'), ['class' => 'awesome']) !!} 
       {!! Form::text("phone",value($admin->phone),['class' => 'form-control']) !!}
         @if($errors->has('phone'))
             <p class="text-danger text-uppercase">{{$errors->first('phone')}}</p>
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
  <?php
  

      $category = ['create_category','read_category','update_category','delete_category'];
      $book = ['create_book','read_book','update_book','delete_book'];
      $reservation = ["read_reservation","update_reservation","delete_reservation"];
      $student = ["create_students","read_students","update_students","delete_students"];


  ?>  



  <div class="form-group">
  
    <h5>{{trans('dashb.premission')}}</h5>


 <ul class="nav nav-tabs" id="myTab" role="tablist">
  <li class="nav-item">
    <a class="nav-link active" id="category-tab" data-toggle="tab" href="#category" role="tab" aria-controls="category" aria-selected="true">{{trans('dashb.categories')}}</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" id="book-tab" data-toggle="tab" href="#book" role="tab" aria-controls="book" aria-selected="false">{{trans('dashb.books')}}</a>
  </li>

  <li class="nav-item">
    <a class="nav-link" id="students-tab" data-toggle="tab" href="#students" role="tab" aria-controls="students" aria-selected="false">{{trans('dashb.students')}}</a>
  </li>

    <!-- ----------------------------------------------------------------------------- -->

  <li class="nav-item">
    <a class="nav-link" id="reservations-tab" data-toggle="tab" href="#reservations" role="tab" aria-controls="reservations" aria-selected="false">{{trans('dashb.reservations')}}</a>
  </li>

</ul>
<div class="tab-content" id="myTabContent">
  <div class="tab-pane fade show active" id="category" role="tabpanel" aria-labelledby="category-tab">
    <br>
  @foreach($category as $categories)  
    <label class="checkbox-inline col-sm-2">
      <input type="checkbox" value="{{$categories}}" name="permission[]" {{$admin->hasPermissionTo($categories) ? 'checked' : ''}}> {{ trans('dashb.'.$categories) }}
    </label>
  @endforeach

  </div>
  <div class="tab-pane fade" id="book" role="tabpanel" aria-labelledby="book-tab">
    <br>
   @foreach($book as $books)  
    <label class="checkbox-inline col-sm-2">
      <input type="checkbox" value="{{$books}}" name="permission[]"{{$admin->hasPermissionTo($books) ? 'checked' : ''}}> {{ trans('dashb.'.$books) }}
    </label>
  @endforeach
  </div>



   <div class="tab-pane fade" id="students" role="tabpanel" aria-labelledby="students-tab">
    <br>
 @foreach($student as $students)  

    <label class="checkbox-inline col-sm-2">
      <input type="checkbox" value="read_students" name="permission[]" 
      {{$admin->hasPermissionTo($students) ? 'checked' : ''}}> {{ trans('dashb.'.$students) }}
    </label>

  @endforeach

  </div>



 <div class="tab-pane fade" id="reservations" role="tabpanel" aria-labelledby="reservations-tab">
      <br>
     @foreach($reservation as $reservations)  
      <label class="checkbox-inline col-sm-2">
        <input type="checkbox" value="{{$reservations}}" name="permission[]"{{$admin->hasPermissionTo($reservations) ? 'checked' : ''}}> {{ trans('dashb.'.$reservations) }}
      </label>
    @endforeach
    </div>


</div>





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