<!DOCTYPE html>
<html lang="en">

<head>
    <title>Bootstrap Example</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="icon" href="https://cdn.freelogovectors.net/wp-content/uploads/2018/04/harvard_university-emlebs-1.png"
        type=”image/x-icon”>
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <meta name="csrf-token" content="{{ csrf_token() }}" />

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
    <style>
        #header .icon1,
        .icon2,
        .icon3 {
            width: 30px;
            height: 4px;
            background-color: white;
            margin: 7px 0;
            border: 0;
            border-radius: 2px;
            transition: 0.4s;
        }

        .change .icon1 {
            -webkit-transform: rotate(-45deg) translate(-9px, 6px);
            transform: rotate(-45deg) translate(-9px, 6px);
        }

        .change .icon2 {
            opacity: 0;
        }

        .change .icon3 {
            -webkit-transform: rotate(45deg) translate(-8px, -8px);
            transform: rotate(45deg) translate(-8px, -8px);
        }

        #header {
            background-image: url('https://kienviet.net/wp-content/uploads/2020/12/1-21-1440x960.jpg');
            height: 70vh;
            background-repeat: no-repeat;
            background-size: cover
        }

        .fixed {
            background: #293352;
            z-index: 10000;
            position: fixed;
            top: 0;
            width: 100%;
            padding-bottom: 10px;
            transition: transform .2s;
        }

        #main {
            background: #F8F8F8;
        }

        footer i {
            font-size: 35px;
            color: white
        }

        .showMenu {
            display: block !important;
            transition: 0.4s !important;
        }

        #main .card {
            transition: transform .2s;
        }

        #main .card:hover {
            z-index: 1000;
            /* IE 9 */
            -webkit-transform: scale(1.1);
            /* Safari 3-8 */
            transform: scale(1.1);
            border: 1px solid red -ms-transform: scale(1.1);

        }

        .showLang {
            display: block !important;
        }

        .sao i {
            font-size: 12px;
        }

        body {
            overflow: hidden;
        }

        /*dùng ảnh gif*/
        .load {
            width: 100%;
            height: 100%;
            background: #fff;
            position: fixed;
            top: 0;
            left: 0;
            z-index: 100000000000;
            display: block;
            overflow: hidden;
        }

        .load img {
            width: 150px;
            height: 150px;
            position: absolute;
            top: 50%;
            left: 50%;
            margin-top: -75px;
            margin-left: -75px;
        }

        /*cách 2 dùng css*/
        .loader {
            width: 100%;
            height: 100%;
            background: #00b8ff;
            position: fixed;
            top: 0;
            left: 0;
            z-index: 100000000000;
            display: block;
            overflow: hidden;
        }

        .icon {
            font-size: 50px;
            color: #fff;
            position: absolute;
            top: 50%;
            left: 50%;
            margin-top: -40px;
            margin-left: -40px;
        }

        .xoay {
            animation: xoay 1.5s linear infinite;
            -moz-animation: xoay 1.5s linear infinite;
            -ms-animation: xoay 1.5s linear infinite;
            -o-animation: xoay 1.5s linear infinite;
            -webkit-animation: xoay 1.5s linear infinite;
        }

        @-webkit-keyframes xoay {
            from {
                -ms-transform: rotate(0deg);
                -moz-transform: rotate(0deg);
                -o-transform: rotate(0deg);
                -webkit-transform: rotate(0deg);
                transform: rotate(0deg);
            }

            to {
                -ms-transform: rotate(360deg);
                -moz-transform: rotate(360deg);
                -o-transform: rotate(360deg);
                -webkit-transform: rotate(360deg);
                transform: rotate(360deg);
            }
        }

        /*@keyframes xoay{
 from{
  -ms-transform:rotate(0deg);
  -moz-transform: rotate(0deg);
  -o-transform: rotate(0deg);
  -webkit-transform: rotate(0deg);
  transform: rotate(0deg);
 }
 to{
  -ms-transform:rotate(360deg);
  -moz-transform: rotate(360deg);
  -o-transform: rotate(360deg);
  -webkit-transform: rotate(360deg);
  transform: rotate(360deg);
 }
}*/

    </style>
</head>

<body class="preloading">
    <div class="loader">
        <span class="fas fa-spinner xoay icon"></span>
    </div>
    <div id="header">
        <div id="menu" style="transition: transform .2s;">
            <div class="container">
                <div class="row">
                    <div class="col-md-4 col-2">
                        <div class="row mt-3">
                            <div class="col-md-3 col-3 mt-2">
                                <div id="toggleMenu">
                                    <div class="icon1"></div>
                                    <div class="icon2"></div>
                                    <div class="icon3"></div>
                                </div>
                            </div>
                            <div class="col-md-9 d-md-block d-none col-9">
                                <div style="border: 2px solid white;border-radius:5px" class="p-1 text-center">
                                    <p style="margin-top: 12px" class="text-white">
                                        {{ trans('pagination.home.viewallcourse') }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 col-8 text-center">
                        <a href="/"><img
                                src="https://i.pinimg.com/originals/60/f6/fb/60f6fb33288c401ba152883fa524b5a3.png"
                                width="70%" alt="" class="mt-2"></a>
                    </div>
                    <div class="col-md-4 col-2">
                        <div class="row">
                            <div class="col-md-7 d-md-block d-none col-10 text-center">
                                <form action="javascript:void(0)" method="get">
                                    @csrf
                                    <input type="text" name="q" id="search"
                                        placeholder="{{ trans('pagination.home.search') }}"
                                        style="width: 100%;height:50px;text-indent:30px;border:0;border-radius:5px;font-size:14px"
                                        class="mt-3">
                                </form>
                            </div>
                            <div class="col-md-5 col-2">
                                <div class="row text-center">
                                    <div class="col-md-4" style="margin-top:30px">
                                        <a href="{{ route('showCart') }}"><i style="font-size: 25px"
                                                class="fa fa-shopping-bag text-white"></i></a>
                                    </div>
                                    <div class="col-md-4 d-md-block d-none" style="margin-top:30px">
                                        @if (Auth::check())
                                            <a href="{{ route('logout') }}"><i class="fa fa-user-circle text-white"
                                                    style="font-size: 25px;"></i></a>
                                        @else
                                            <a href="{{ route('login') }}"><i class="fa fa-sign-in-alt text-white"
                                                    style="font-size: 25px;"></i></a>
                                        @endif

                                    </div>
                                    <div class="col-md-4 text-white text-center" style="margin-top:30px">
                                        @if (session()->get('lang') == 'vi')
                                            <img src="https://tiengkeng.com/wp-content/uploads/2019/01/2000px-Flag_of_Vietnam.svg_.png"
                                                width="100%" alt="" id="openLang">
                                            <a href="{{ route('lang', ['lang' => 'en']) }}"><img
                                                    src="http://kalivisa.com/wp-content/uploads/2020/05/Hoa-K%E1%BB%B3.png"
                                                    width="100%" alt="" id="showLang" style="display: none"
                                                    class="mt-2"></a>
                                        @elseif (session()->get('lang') == 'en')
                                            <img src="http://kalivisa.com/wp-content/uploads/2020/05/Hoa-K%E1%BB%B3.png"
                                                width="100%" alt="" id="openLang">
                                            <a href="{{ route('lang', ['lang' => 'vi']) }}"> <img
                                                    src="https://tiengkeng.com/wp-content/uploads/2019/01/2000px-Flag_of_Vietnam.svg_.png"
                                                    width="100%" alt="" id="showLang" style="display: none"
                                                    class="mt-2"> </a>
                                        @else
                                            <img src="https://tiengkeng.com/wp-content/uploads/2019/01/2000px-Flag_of_Vietnam.svg_.png"
                                                width="100%" alt="" id="openLang">
                                            <a href="{{ route('lang', ['lang' => 'en']) }}"><img
                                                    src="http://kalivisa.com/wp-content/uploads/2020/05/Hoa-K%E1%BB%B3.png"
                                                    width="100%" alt="" id="showLang" style="display: none"
                                                    class="mt-2"></a>
                                        @endif
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="container-fluid" style="background:#293352;display:none" id="megaMenu">
                <div class="row p-4">
                    @foreach ($categoryList as $category)
                        <div class="col-md-3 col-6 mt-3 text-white">-</i>
                            <a
                                href="{{ route('showCourseOfCategory', $category->id) }}">{{ $category->name }}</a>
                        </div>
                    @endforeach
                </div>

            </div>
        </div>
    </div>
    <script>
        $(document).ready(function() {
            $(window).bind('scroll', function() {
                if ($(window).scrollTop() > 50) {
                    $('#menu').addClass('fixed');
                } else {
                    $('#menu').removeClass('fixed');
                }
            });
            $('#toggleMenu').click(function() {
                $("#megaMenu").toggleClass("showMenu");
                $('#menu').addClass('fixed');
                $(this).toggleClass('change');

            });
            $('#openLang').click(function() {
                $('#showLang').toggleClass('showLang')
            })
            $(window).on('load', function(event) {
                $('body').removeClass('preloading');
                $('.loader').delay(500).fadeOut('fast');
            });
            $('#btn-search').on('click', function() {
                let q = $('#search').val()
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                $.ajax({
                    type: 'get',
                    url: '{{ route('search') }}',
                    dataType: 'json',
                    data: {
                        q: q
                    },
                    success: function(data) {
                        console.log(data.data.q)
                    },
                    error: function() {
                        alert('false');
                    }
                })
            })
        });

    </script>
