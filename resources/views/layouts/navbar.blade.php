<div id="app">
    <nav class="navbar navbar-expand-sm navbar-light" style="background-color: #e3f2fd;">
        <div class="container">

            <a class="navbar-brand" href="{{ url('/') }}">
                genDoc
            </a>

            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <!-- Left Side Of Navbar -->
                <ul class="navbar-nav mr-auto">
                    @if (Auth::user()->status == "admin")
                        <li class="nav-item active">
                            <a class="nav-link" href="{{ url('/home') }}">เอกสารทั้งหมดในระบบ <span class="sr-only">(current)</span></a>
                        </li>
                        <li class="nav-item ">
                            <a class="nav-link" href="{{ url('/storemanage') }}">ร้านค้าทั้งหมดในระบบ <span class="sr-only">(current)</span></a>
                        </li>
                        <li class="nav-item ">
                            <a class="nav-link" href="{{ url('/usermanage') }}">ข้อมูลผู้ใช้งาน<span class="sr-only">(current)</span></a>
                        </li>
                        <li class="nav-item ">
                            <a class="nav-link" href="{{ url('/director') }}">บุคลากรโรงเรียน<span class="sr-only">(current)</span></a>
                        </li>
                    @else
                        <li class="nav-item active">
                            <a class="nav-link" href="{{ url('/home') }}">เอกสาร <span class="sr-only">(current)</span></a>
                        </li>
                        <li class="nav-item ">
                            <a class="nav-link" href="{{ url('/storemanage') }}">จัดการร้านค้า <span class="sr-only">(current)</span></a>
                        </li>
                    @endif
                    
                   
                </ul>
                

                <!-- Right Side Of Navbar -->
                <ul class="navbar-nav ml-auto">

                    <!-- Authentication Links -->
                    @guest

                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                        </li>

                        @if (Route::has('register'))

                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                            </li>

                        @endif
                    @else

                        <li class="nav-item dropdown">
                            

                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                               User: {{ Auth::user()->name }} <span class="caret"></span>
                            </a>

                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">

                               @if ((Auth::user()->status == "admin"))
                                    <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                        document.getElementById('logout-form').submit();">
                                        {{ __('ออกจากระบบ') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                               @else
                                    <a class="dropdown-item" href="{{ url('/profile') }}">
                                        {{ __('โปร์ไฟล์') }}
                                    </a>

                                    <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                        document.getElementById('logout-form').submit();">
                                        {{ __('ออกจากระบบ') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                               @endif 
                            

                            </div>

                        </li>
                    @endguest
                </ul>
            </div>
        </div>
    </nav>

    