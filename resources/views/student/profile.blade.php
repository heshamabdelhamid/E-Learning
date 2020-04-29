<!DOCTYPE html>
<html>
<head>
	<title></title>

     <link rel="stylesheet" href="{{asset('qeno')}}/css/bootstrap.min.css" />

<style type="text/css">

	        @import url('https://fonts.googleapis.com/css?family=El+Messiri&display=swap');

        html {
            position: relative;
            overflow-x: hidden !important;
        }

        * {
            box-sizing: border-box;
        }

        body {
            font-family: 'El Messiri' !important;
            color: #324e63;
            background: url(https://cdn.gearpatrol.com/wp-content/uploads/2016/02/Firewatch-Gear-Patrol-Lead-Full.jpg);
            background-position: center;
            background-size: cover;
        }

        a,
        a:hover {
            text-decoration: none;
        }

        .icon {
            display: inline-block;
            width: 1em;
            height: 1em;
            stroke-width: 0;
            stroke: currentColor;
            fill: currentColor;
        }

        .wrapper {
            min-height: 100vh;
            padding: 50px 20px;
            padding-top: 100px;
        }

        @media screen and (max-width: 768px) {
            .wrapper {
                height: auto;
                min-height: 100vh;
                padding-top: 100px;
            }
        }

        .profile-card {
            width: 100%;
            min-height: 460px;
            margin: auto;
            box-shadow: 0px 8px 60px -10px rgba(13, 28, 39, 0.6);
            background: #fff;
            border-radius: 12px;
            max-width: 700px;
            position: relative;
        }

        .profile-card.active .profile-card__cnt {
            filter: blur(6px);
        }

        .profile-card.active .profile-card-message,
        .profile-card.active .profile-card__overlay {
            opacity: 1;
            pointer-events: auto;
            transition-delay: .1s;
        }

        .profile-card.active .profile-card-form {
            transform: none;
            transition-delay: .1s;
        }

        .profile-card__img {
            width: 150px;
            height: 150px;
            margin-left: auto;
            margin-right: auto;
            transform: translateY(-50%);
            border-radius: 50%;
            overflow: hidden;
            position: relative;
            z-index: 4;
            box-shadow: 0px 5px 50px 0px #6c44fc, 0px 0px 0px 7px rgba(107, 74, 255, 0.5);
        }

        @media screen and (max-width: 576px) {
            .profile-card__img {
                width: 120px;
                height: 120px;
            }
        }

        .profile-card__img img {
            display: block;
            width: 100%;
            height: 100%;
            object-fit: cover;
            border-radius: 50%;
        }

        .profile-card__cnt {
            margin-top: -35px;
            text-align: center;
            padding: 0 20px;
            padding-bottom: 40px;
            transition: all .3s;
        }

        .profile-card__name {
            font-weight: 700;
            font-size: 24px;
            color: #6944ff;
            margin-bottom: 15px;
        }

        .profile-card__txt {
            font-size: 18px;
            font-weight: 500;
            color: #324e63;
            margin-bottom: 15px;
        }

        .profile-card__txt strong {
            font-weight: 700;
        }

        .profile-card-loc {
            display: flex;
            justify-content: center;
            align-items: center;
            font-size: 18px;
            font-weight: 600;
        }

        .profile-card-loc__icon {
            display: inline-flex;
            font-size: 27px;
            margin-right: 10px;
        }

        .profile-card-ctr {
            display: flex;
            justify-content: center;
            align-items: center;
            margin-top: 40px;
        }

        @media screen and (max-width: 576px) {
            .profile-card-ctr {
                flex-wrap: wrap;
            }
        }

        .profile-card__button {
            background: none;
            border: none;
            font-family: 'El Messiri' !important;
            font-weight: 700;
            font-size: 19px;
            margin: 15px 35px;
            padding: 15px 40px;
            min-width: 201px;
            border-radius: 50px;
            min-height: 55px;
            color: #fff;
            cursor: pointer;
            backface-visibility: hidden;
            transition: all .3s;
        }

        @media screen and (max-width: 768px) {
            .profile-card__button {
                min-width: 170px;
                margin: 15px 25px;
            }
        }

        @media screen and (max-width: 576px) {
            .profile-card__button {
                min-width: inherit;
                margin: 0;
                margin-bottom: 16px;
                width: 100%;
                max-width: 300px;
            }

            .profile-card__button:last-child {
                margin-bottom: 0;
            }
        }

        .profile-card__button:focus {
            outline: none !important;
        }

        @media screen and (min-width: 768px) {
            .profile-card__button:hover {
                transform: translateY(-5px);
            }
        }

        .profile-card__button:first-child {
            margin-left: 0;
        }

        .profile-card__button:last-child {
            margin-right: 0;
        }

        .profile-card__button.button--blue {
            background: linear-gradient(45deg, #1da1f2, #0e71c8);
            box-shadow: 0px 4px 30px rgba(19, 127, 212, 0.4);
        }

        .profile-card__button.button--blue:hover {
            box-shadow: 0px 7px 30px rgba(19, 127, 212, 0.75);
        }

        .profile-card__button.button--orange {
            background: linear-gradient(45deg, #d5135a, #f05924);
            box-shadow: 0px 4px 30px rgba(223, 45, 70, 0.35);
        }

        .profile-card__button.button--orange:hover {
            box-shadow: 0px 7px 30px rgba(223, 45, 70, 0.75);
        }

        .profile-card__button.button--gray {
            box-shadow: none;
            background: #dcdcdc;
            color: #142029;
        }

        hr {
            border: 1px solid #DDD;
            margin: 0 20px;
        }
        /* Start Books Section */
        .books-section {padding: 50px 0;}
        .books-section .book-body { border: 1px solid #7377f44f; width: 285px; overflow: hidden; border-radius: 5px; margin-bottom: 30px; text-shadow: 1px 1px 1px rgba(127, 127, 127, 0.3);}
        .books-section .book-body .book-img { width: 285px; height: 330px; padding: 10px;}
        .books-section .book-body .book-img img { width: 100%; height: 100%; }
        .books-section .book-body .book-info {text-align: center; margin: 20px 0;}
        .books-section .book-body .book-info .category {font-size: 15px; color: rgba(0,0,0,.5);}
        .books-section .book-body .book-info .book-name {color: #7377f4; font-size: 20px; font-weight: bold;}
        .books-section .book-body .book-info .status {font-size: 13px; border-radius: 25px; padding: 0 10px; color: #FFF;}
        .books-section .book-body .book-info .status-yas {background-color: #17C995; }
        .books-section .book-body .book-info .status-no {background-color: #F84F78;}
        .books-section .book-body .book-details {overflow: hidden; padding: 0px 10px 10px 10px;}
        .books-section .book-body .book-details .stars {float: right; color: #FFBD5C;}
        .books-section .book-body .book-details .stars .star-emptyicon- {color: rgba(0, 0, 0, 0.219);}
        .books-section .book-body .book-details .booking {float: left;}
        .books-section .book-body .book-details .booking .love {color: rgba(0,0,0,.5); padding-left: 10px; margin-left: 5px; border-left: .5px solid rgba(0, 0, 0, 0.219); display: inline-block; height: 20px; cursor: pointer;}
        .books-section .book-body .book-details .booking .booking-btn {}
        /* End Books Section */
</style>

</head>
<body>


<div class="wrapper">
        <div class="profile-card js-profile-card">
            <div class="profile-card__img">
                <img src="{{asset('qeno/default.png')}}" alt="profile card" />
            </div>

            <div class="profile-card__cnt js-profile-cnt">
                <div class="profile-card__name">العبد لله مسك الحديد تناه</div>
                <div class="profile-card__txt">
                    معهد الدلتا العالي للحاسبات <strong>الفرقة الرابعة</strong>
                </div>
                <div class="profile-card-loc">
                    <span class="profile-card-loc__icon">
                        <svg class="icon">
                            <use xlink:href="#icon-location"></use>
                        </svg>
                    </span>

                    <span class="profile-card-loc__txt">
                        المحلة الكبري وسندوتشات المكرونة
                    </span>
                </div>

                <div class="profile-card-ctr">
                    <button class="profile-card__button button--blue js-message-btn">
                        حجز كتاب
                    </button>
                    <button class="profile-card__button button--orange">تسجيل الخروج</button>
                </div>
            </div>
            <hr>
            <div style="text-align: center;">
                <h3 style="margin: 30px 0;">كتبك</h3>
            </div>
            <article class="books-section">
                <div class="container">
                    <div class="row">
                        <div class="col">
                            <div class="book-body">
                                <div class="book-img">
                                    <img src="{{asset('qeno')}}/images/books/must-read-html-css-books.jpg" alt="books" />
                                </div>
                                <div class="book-info">
                                    <span class="category">قسم تاريخ</span>
                                    <h3 class="book-name">كتاب حلو بس مجهد</h3>
                                    <span class="status status-yas">مــتاح</span>
                                </div>
                                <div class="book-details">
                                    <div class="stars">
                                        <i class="staricon-"></i>
                                        <i class="staricon-"></i>
                                        <i class="staricon-"></i>
                                        <i class="staricon-"></i>
                                        <i class="staricon-"></i>
                                    </div>
                                    <div class="booking">
                                        <i class="heart-emptyicon- love"></i>
                                        <a class="booking-btn" href="#">حجز</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="book-body">
                                <div class="book-img">
                                    <img src="{{asset('qeno')}}/images/books/must-read-html-css-books.jpg" alt="books" />
                                </div>
                                <div class="book-info">
                                    <span class="category">قسم تاريخ</span>
                                    <h3 class="book-name">كتاب حلو بس مجهد</h3>
                                    <span class="status status-yas">مــتاح</span>
                                </div>
                                <div class="book-details">
                                    <div class="stars">
                                        <i class="staricon-"></i>
                                        <i class="staricon-"></i>
                                        <i class="staricon-"></i>
                                        <i class="staricon-"></i>
                                        <i class="staricon-"></i>
                                    </div>
                                    <div class="booking">
                                        <i class="heart-emptyicon- love"></i>
                                        <a class="booking-btn" href="#">حجز</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </article>
            <!-- End Books -->
    
        </div>


        <script src="{{asset('qeno')}}/js/jquery-3.4.1.min.js"></script>
        <script src="{{asset('qeno')}}/js/popper.min.js"></script>
        <script src="{{asset('qeno')}}/js/bootstrap.min.js"></script>
        <script src="{{asset('qeno')}}/js/vanilla-tilt.min.js"></script>
</body>
</html>
