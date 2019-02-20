<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        @include('layouts.style')

        <title>genDoc</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Sarabun" rel="stylesheet">


        <!-- Styles -->
        <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Sarabun', sans-serif;
                font-weight: 200;
                height: 100vh;
                margin: 0;
            }

            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }
/*
            .content {
                text-align: center;
            } */

            .title {
                font-size: 84px;
            }

            .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 13px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;
            }

            .logogendoc{
                max-width: 100%;
                height: auto;
                padding-bottom: 20px;
            }
        </style>
    </head>
    <body>

        <div class="flex-center position-ref full-height">

            {{-- @if (Route::has('login'))
                <div class="top-right links">

                    @auth
                        <a href="{{ url('documents/home') }}">Home</a>
                    @else
                        <a href="{{ route('login') }}">Login</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}">Register</a>
                        @endif

            @endauth

                </div>
            @endif --}}

            <div class="content">

            <div class="container">
                <div class="row">
                    <div class="col-sm-7">
                        <div class="col-sm-12 wow animated fadeInRight">

                            <img class="logogendoc" src="{{ URL::asset('images/gendoc.png') }}" alt="">
                            <h4>ระบบจัดการการสั่งซื้อทางราชการ ของโรงเรียนบ้านเทอดไทย</h4>
                            <p>ทอล์คโกเต็กซ์กิฟท์ โดมิโนสเตเดียมวิทย์แซลมอนแมชีน เวอร์ อึมครึมเมเปิลแมกกาซีนอัลบั้ม สังโฆติ๋ม
                                หมวยกลาสแช่แข็งโมเดิร์นวัจนะ มอนสเตอร์คอร์รัปชั่นชิฟฟอนอัลบัมออร์แกนิก เท็กซ์โมเดลรีดไถ สะกอมแคร็กเกอร์</p>

                                <button type="button" class="btn btn-light"> <i class="fas fa-address-card"></i> &nbsp; เกี่ยวกับเรา</button>
                                <button type="button" class="btn btn-link"> <i class="fab fa-leanpub"></i>&nbsp; วิธีการใช้งาน</button>
                        </div>
                    </div>


                    @if (Route::has('login'))
                    @auth
                    <div class="col-sm-5"> <br><br><br><br> <br>
                    <div class="card">
                            <div class="card-header">
                              Welcome
                            </div>
                            <div class="card-body">
                              <h5 class="card-title">ยินดีต้อนรับ</h5>
                              <p class="card-text">คุณ : {{ Auth::user()->name }}</p>
                              <a href="{{ url('/home') }}" class="btn btn-primary">เริ่มต้นใช้งาน</a>
                              <a style="text-decoration: none;" href="{{ route('logout') }}"
                                   onclick="event.preventDefault();
                                                 document.getElementById('logout-form').submit();">
                                    &nbsp; {{ __('Logout') }}

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            @csrf
                                    </form>
                                </a>
                            </div>
                          </div>
                        </div>
                    @else

                    <div class="col-sm-5"> <br><br><br><br><br>

                    <div class="container">
                        <div class="row">
                            <div class="col-sm-12">

                                <div class="card">
                                    <div class="card-header">{{ __('เข้าสู่ระบบ') }}</div>

                                        <div class="card-body">
                                            <div class="container">
                                                <div class="row">

                                                    <div class="col-sm-12">
                                                        <form method="POST" action="{{ route('login') }}">
                                                            @csrf

                                                            <div class="form-group row">

                                                                <label class="col-sm-3 col-form-label text-md-right" for="email" >{{ __('E-Mail') }}</label>

                                                                <div class="col-sm-9">
                                                                    <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required autofocus>

                                                                    @if ($errors->has('email'))
                                                                        <span class="invalid-feedback" role="alert">
                                                                            <strong>{{ $errors->first('email') }}</strong>
                                                                        </span>
                                                                    @endif

                                                                </div>

                                                            </div>

                                                            <div class="form-group row">

                                                                <label class="col-md-3 col-form-label text-md-right" for="password" >{{ __('รหัสผ่าน') }}</label>

                                                                <div class="col-md-9">
                                                                    <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>

                                                                    @if ($errors->has('password'))
                                                                        <span class="invalid-feedback" role="alert">
                                                                            <strong>{{ $errors->first('password') }}</strong>
                                                                        </span>
                                                                    @endif

                                                                </div>
                                                            </div>

                                                            <div class="container">
                                                                <div class="form-group row">
                                                                    <div class="col-sm-8">

                                                                        <div class="form-check">
                                                                            <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                                                            <label class="form-check-label" for="remember">
                                                                                {{ __('จดจำฉัน') }}
                                                                            </label>
                                                                        </div>
                                                                    </div>

                                                                    <div class="col-sm">
                                                                        <a href="{{ route('register') }}">สมัครสมาชิก</a>
                                                                    </div>

                                                                </div>
                                                            </div>

                                                            <div class="form-group row">
                                                                    <button type="submit" class="btn btn-primary btn-block">
                                                                            {{ __('ล็อกอิน') }}
                                                                    </button>
                                                            </div>


                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endauth
                    @endif


                </div>
            </div>
        </div>
    </div>

    @include('layouts.footer')

    </body>
</html>


