        <header>
            <!-- Start Navbar -->
            <nav class="navbar navbar-expand-lg navbar-light bg-light">
                <div class="container">
                    <a class="navbar-brand" href="{{route('welcome')}}"><img class="logo" src="{{asset('qeno')}}/images/logof.png" alt="Logo">مكتبة الدلتا</a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                        aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>

                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav ml-auto">
                            <li class="nav-item active">
                                <a class="nav-link" href="{{route('welcome')}}">الرئيسية <span class="sr-only">(current)</span></a>
                            </li>
   <!-- ------------------------- categories -------------------------------------------------------- -->

                          @if(count(categories()) != true)
                            <li class="nav-item">
                             <a class="nav-link disabled" href="#">{{trans('welcome.categories')}}  </a>
                            </li>

                          @else


                           <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown"
                                    aria-haspopup="true" aria-expanded="false"> {{trans('welcome.categories')}}
                                </a>
                                @if( count(categories()) )
                                <div class="dropdown-menu" aria-labelledby="navbarDropdown">

                               @foreach(categories() as $category)

                                    <a class="dropdown-item" href="{{route('categoryId',$category->id)}}">{{$category->name == 'undefined‏' ? 'عام' : $category->name}}
                                    </a>

                                @endforeach
                                </div>
                                @endif
                            </li>

                            @endif
   <!-- ------------------------- end categories------------------------------------------------ -------->



               @guest
                            <li class="nav-item">
                                <a class="nav-link" href="{{route('welcome.login')}}">{{trans('welcome.login')}}</a>
                            </li>

               @else

                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown"
                                    aria-haspopup="true" aria-expanded="false">
                                    {{auth()->user()->full_name}}
                                </a>
                                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="{{route('student_books')}}">كتبي</a>
                                <hr>
                                <a class="dropdown-item" href="{{route('welcome.logout')}}">تسجيل الخروج</a>


                                </div>
                            </li>



                @endguest

                        </ul>

                        <form class="form-inline my-2 my-lg-0" action="{{route('search_book')}}">
                            <input class="form-control ml-sm-2" type="search" placeholder="بتـدور علي اية؟" aria-label="Search" name="search" value="{{request()->search}}" required>
                            <button class="btn btn-outline-primary my-2 my-sm-0" type="submit">أبـحــث</button>
                        </form>
                    </div>
                </div>
            </nav>

            @if(session()->has('success_contact'))
                <div class="container">
                <div class="alert alert-success alert-dismissible fade show text-right" role="alert">
                  <strong>تمم</strong> {{session('success_contact')}}
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                </div>
            @endif
            <!-- Start Navbar -->

            <!-- Start Slider -->
            @yield('slider')
            <!-- End Slider -->
        </header>


<div class="content">


    @yield('content')

</div>

