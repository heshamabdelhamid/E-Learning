
        <!-- Start Footer  -->
        <footer>

                   <div class="footer-top">
                <div class="container">
                    <div class="row">
                        <div class="col-sm-12 col-md-6">
                            <form action="{{route('ContactUs')}}" method="post">
                              @csrf
                                <input name="name" value="{{old('name')}}"  type="text" placeholder="  ألاســم" />
                              @if($errors->has('name'))
                                  <p class="text-danger  float-right text-uppercase">{{$errors->first('name')}}</p>
                               @endif
                                <input name="email" value="{{old('email')}}" type="text" placeholder="   ألاميــل " />
                               @if($errors->has('email'))
                                  <p class="text-danger  float-right text-uppercase">{{$errors->first('email')}}</p>
                               @endif
                         <textarea name="message"  cols="30" rows="4" placeholder="رســالتك!"></textarea>
                                @if($errors->has('message'))
                                  <p class="text-danger float-right  text-uppercase">{{$errors->first('message')}}</p>
                               @endif
                                <button>أرســال طلـب!</button>
                            </form>
                            <div class="row info-map">
                                <div class="col">
                                    <h5>العنوان</h5>
                                    المنصورة طلخا<br /> أول طريق المنصورة / دمياط  <br /> طريق دمياط السريع
                                </div>
                                <div class="col">
                                    <h5>للتواصل</h5>
                                    مز بريدى : 35681 <br />
                                    تليفون : 2529808 – 050<br />
                                    فاكس : 2529810
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-6">
                            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d4093.436440115823!2d31.397466882758838!3d31.071015198578333!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x14f7762b58afb4b1%3A0xcd53fd9be61377db!2z2LTYsdmD2Kkg2KfZhNiv2YTYqtinINmE2YTYo9iz2YXYr9ipINmI2KfZhNi12YbYp9i52KfYqiDYp9mE2YPZitmF2KfZiNmK2Kk!5e0!3m2!1sar!2seg!4v1583089653545!5m2!1sar!2seg" width="600" height="450" frameborder="0" style="border:0;" allowfullscreen=""></iframe>
                        </div>
                    </div>
                </div>
            </div>

            <div class="footer-bottom">
                جميع الحقوق محفوظة للتيم القائم علي انشاء الموقع | Copyright ©2020
            </div>
        </footer>
        <!-- End Footer  -->


        <!-- Script files -->
        <script src="{{asset('qeno')}}/js/jquery-3.4.1.min.js"></script>
        <script src="{{asset('qeno')}}/js/popper.min.js"></script>
        <script src="{{asset('qeno')}}/js/bootstrap.min.js"></script>
        <script src="{{asset('qeno')}}/js/vanilla-tilt.min.js"></script>
        <script src="{{asset('qeno')}}/js/main.js"></script>

        <script type="text/javascript">
       $(function(){


        $('body').on('click','#addLike',function(e){

                   var book_id = $(this).data('id');

                if($(this).hasClass("heart-emptyicon-")){

                              $(this).removeClass('heart-emptyicon-');
                              $(this).addClass('fa fa-heart');

                       $.ajax({

                          url:"/book/addlike/"+book_id,
                          method:"post",
                          data:{_token:"{{csrf_token()}}"},
                          success:function(data){

                              $(this).removeClass('heart-emptyicon-');
                              $(this).addClass('fa fa-heart');

                          },
                          error:function(data){

                             $(this).addClass('heart-emptyicon-');
                             $(this).removeClass('fa fa-heart');
                          }

                       });

                }else{

                   $(this).addClass('heart-emptyicon-');
                   $(this).removeClass('fa fa-heart');

                  $.ajax({

                          url:"/book/dislike/"+book_id,
                          method:"put",
                          data:{_token:"{{csrf_token()}}"},
                          success:function(data){

                              // console.log(data);
                          }

                       });

                }

                 });
            });
        </script>


        @stack('js')
    </body>
</html>
