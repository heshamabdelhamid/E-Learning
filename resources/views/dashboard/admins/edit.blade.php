@extends("dashboard.layouts.app")

@section('title')
 {{trans('dashb.edit')}}
@endsection

@section("content")






<div class="card">
          <h5 class="card-header text-primary">{{ trans("dashb.edit_n_admin") . $admin->name}} </h5>

  <div class="card-body">

    
       {!! Form::open(['url' => route('admins.update',$admin->id)]) !!}
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
      $permission = ['create_admin','read_admin','update_admin','delete_admin'];
      $staff = ['create_staff','read_staff','update_staff','delete_staff'];

  ?>  



  <div class="form-group">
  
    <h5>{{trans('dashb.premission')}}</h5>


 <ul class="nav nav-tabs" id="myTab" role="tablist">

  <li class="nav-item">
    <a class="nav-link active" id="admin-tab" data-toggle="tab" href="#admin" role="tab" aria-controls="admin" aria-selected="true">{{trans('dashb.admins')}}</a>
  </li>
    <!-- ----------------------------------------------------------------------------- -->

  <li class="nav-item">
    <a class="nav-link" id="staff-tab" data-toggle="tab" href="#staff" role="tab" aria-controls="staff" aria-selected="false">{{trans('dashb.staff')}}</a>
  </li>

  <!-- ----------------------------------------------------------------------------- -->


</ul>
<div class="tab-content" id="myTabContent">
  <div class="tab-pane fade show active" id="admin" role="tabpanel" aria-labelledby="admin-tab">
    <br>
  @foreach($permission as $permissions)  
    <label class="checkbox-inline col-sm-2">
      <input type="checkbox" value="{{$permissions}}" name="permission[]" {{$admin->hasPermissionTo($permissions) ? 'checked' : ''}}> {{ trans('dashb.'.$permissions) }}
    </label>
  @endforeach

  </div>

    <div class="tab-pane fade" id="staff" role="tabpanel" aria-labelledby="staff-tab">
      <br>
     @foreach($staff as $Staff)  
      <label class="checkbox-inline col-sm-2">
        <input type="checkbox" value="{{$Staff}}" name="permission[]"{{$admin->hasPermissionTo($Staff) ? 'checked' : ''}}> {{ trans('dashb.'.$Staff) }}
      </label>
    @endforeach
    </div> 




</div>





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