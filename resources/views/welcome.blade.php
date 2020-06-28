@extends('layouts.app')

@section('title')
مكتبة الدلتا
@endsection

@section('slider')

            <div class="slider">
                <div class="container">
                    <div class="row">
                        <div class="col">
                            <div class="intro">
                                <span class="welcome">اهلا بِكَ فِي مَوْقِعِ مَكْتَبَةِ الدِّلْتَا الْمَرْكَزِيَّةِ.</span>
                                <h1>
                                    بتدور علي
                                    <a  class="typewrite" data-period="2000" data-type='[ "كتاب", "محاضرة", "ملف PDF" ]'>
                                        <span class="wrap"></span>
                                    </a>
                                    ؟
                                </h1>
                                <p>لـقد قمنـا بانشــاء هـذا الموقـع لاثــراء مــحـتـوي الـقــراء وللاحتفاظ بالمراجع وتحويل وتقدم المحتوي باستخدام التكنولوجيا لمستقبل افضل ان شاء الله ونتمني لكم تجربة مفيدة وسعيدة ولذيذة واحلا مسا..</p>


                                @if (Auth::guest())
                                    <a href="{{route('welcome.login')}}" class="book-now">احجز الان</a>
                                @else
                                    <a href="{{route('books')}}" class="book-now">احجز الان</a>
                                @endif

                             @guest
                                <button class="login"><a href="{{route('welcome.login')}}">تسجيل الدخول</a></button>
                             @endguest
                            </div>
                        </div>
                        <div class="col">
                            <div class="image">
                                <img data-tilt src="{{asset('qeno')}}/images/undraw_book_lover_mkck.svg" alt="">
                            </div>
                        </div>
                    </div>
                </div>
            </div>

      @endsection


@section('content')

        <!-- Start About Us -->
        <section class="heading-section">
            <h2>لية تستخدم المكتبة؟</h2>
            <span>3 اسباب يخلوك تعيش جواها !</span>
        </section>
        <section class="about">
            <div class="container">
                <div class="row">
                    <div class="col">
                        <div data-tilt class="card-about">
                            <div class="preview">
                                <img src="{{asset('qeno')}}/images/about/communication-21.png" />
                            </div>
                            <div class="description">
                                <h4>ديما جمبك</h4>
                                <p>تقدر توصلنا من اي مكان وفي اي وقت وتقرا اللي تحبة وتختارة</p>
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <div data-tilt class="card-about">
                            <div class="preview">
                                <img src="{{asset('qeno')}}/images/about/communication-12.png" />
                            </div>
                            <div class="description">
                                <h4>اتعمل علشانـك!</h4>
                                <p>اه والله زي ما بقولك كدة الموقع دة هيخدمك جامد</p>
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <div data-tilt class="card-about">
                            <div class="preview">
                                <img src="{{asset('qeno')}}/images/about/communication-03.png" />
                            </div>
                            <div class="description">
                                <h4>راحتك تهمنا</h4>
                                <p>اهتمينا بكل تفصيلة صغيرة علشان نطلع تجربة واضحة وسريعة ليك!</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- End About Us -->

        <!-- Start books -->
        <section class="heading-section">
            <h2>قسم افضل الكتب</h2>
            <span>هتلاقي هني اهم واشهر الكتب اللي هتفيدك</span>
        </section>

        <article class="books-section">
            <div class="container">
                <div class="row">

         @foreach($book as $books)

                    <div class="col">
                        <div class="book-body">
                            <div class="book-img">
                                <img src="{{asset('books/'.$books->photo)}}" alt="books" />
                            </div>
                            <div class="book-info">
                                <span class="category">
                                    {{$books->category->name == 'undefined‏' ? 'عام' : $books->category->name }}
                                </span>
                                <h3 class="book-name">{{$books->title}}</h3>


                                 @if($books->available)
                                   @if(auth()->user() && auth()->user()->can_reservation)
                                     <div class="booking">
                                       <span class="status status-yas">
                                           متاح
                                       </span>


                                    </div>
                                    @else
                                         <span class="status status-no">
                                            غير متاح
                                          </span>
                                    @endif

                                    @else


                                            <span class="status status-no">
                                                غير متاح
                                            </span>

                                    @endif




                            </div>
                            <div class="book-details">
                                @if($books->available)
                                   @if(auth()->user() && auth()->user()->can_reservation)
                                        <a href="{{route('book_reservation',$books->id)}}" class="status status-yas" style="margin-right: 5px;float: right;">
                                            حجز
                                        </a>
                                    @endif
                                @endif
                                <div class="booking">
                                    @guest

                                    @else
                                        <i class=" {{!empty(checkLike($books->id)) ? 'fa fa-heart' :'heart-emptyicon-'}} love" id="addLike" data-id="{{$books->id}}"></i>
                                    @endguest
                                </div>

                            </div>
                        </div>
                    </div>


@endforeach






                </div>
            </div>
        </article>
        <!-- End Books -->

@endsection

