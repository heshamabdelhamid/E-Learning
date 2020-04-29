<!doctype html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ trans("dashb.login") }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{asset('dashboard/css/sb-admin-2.min.css')}}" rel="stylesheet">

</head>
<body class="bg-gradient-primary">
    <div id="app">

        <main class="py-4">

 <div class="container">

    <!-- Outer Row -->
    <div class="row justify-content-center">

      <div class="col-xl-6 col-lg-8 col-md-9">

        <div class="card o-hidden border-0 shadow-lg my-5">
          <div class="card-body p-0">
            <!-- Nested Row within Card Body -->
            <div class="row justify-content-center">
 
              <div class="col-lg-10">
                <div class="p-5">
                      @if(session()->has("error_log"))

                      <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <strong>{{trans('dashb.error')}}</strong> {{session('error_log')}}
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>


                      @endif

                  <div class="text-center">
                    <h1 class="h4 text-gray-900 mb-4">Welcome Back!</h1>
                  </div>


                  <form class="user" method="POST" action="{{ route('admin.loginSubmit') }}">

                    @csrf
                    <div class="form-group">


                      <input type="email" class="form-control form-control-user @error('email') is-invalid @enderror" id="email" aria-describedby="emailHelp" placeholder="{{trans('dashb.email')}}" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                 


 <!-- ================================================================================= -->





                    </div>
                    <div class="form-group">

                      <input type="password" class="form-control form-control-user @error('password') is-invalid @enderror" id="password" placeholder="{{trans('dashb.password')}}" required autocomplete="current-password" name="password">






 <!-- ================================================================================ -->



                    </div>
                    <div class="form-group">
                      <div class="custom-control custom-checkbox small">
                        <input type="checkbox" class="custom-control-input" id="customCheck" name="remember">

                        <label class="custom-control-label" for="customCheck">
                            {{ trans('dashb.remeber') }}
                         </label>



<!-- ================================================================================ -->
        
                      </div>
                    </div>
                    <button type="submit"  class="btn btn-primary btn-user btn-block font-weight-bold">
                                      {{ trans('dashb.login') }}
                    </button>
                                        
                                          <hr>
     
        
                  </form>

               
                </div>
              </div>
            </div>
          </div>
        </div>

      </div>

    </div>

  </div>
        </main>
    </div>


  <script src="{{ asset('dashboard/vendor/jquery/jquery.min.js') }}"></script>
  <script src="{{ asset('dashboard/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

  <!-- Core plugin JavaScript-->
  <script src="{{ asset('dashboard/vendor/jquery-easing/jquery.easing.min.js') }}"></script>

</body>
</html>
