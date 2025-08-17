            <div class="header_main">
                <div class="mobile_menu">
                    <nav class="navbar navbar-expand-lg navbar-light bg-light">
                        <div class="logo_mobile"><a href="home"><img src="images/logo.png"></a></div>
                        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
                            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                        </button>
                        <div class="collapse navbar-collapse" id="navbarNav">
                            <ul class="navbar-nav">
                                <li class="nav-item">
                                    <a class="nav-link font-weight-bold" href="{{ url('/') }}">HOME</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link font-weight-bold" href="{{ url('about') }}">ABOUT</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link font-weight-bold" href="{{ url('blogsection') }}">BLOG</a>
                                </li>

                                <li>
                                    @if (Route::has('login'))
                                        {{-- <nav class="flex items-center justify-end gap-4"> --}}
                                        @auth
                                    <li class="nav-item">
                                        <a class="nav-link font-weight-bold" href="{{ url('my_post') }}">MY POSTS</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link font-weight-bold" href="{{ url('create_post') }}">CREATE POST</a>
                                    </li>
                                    <li class="nav-item">

                                    <a href="{{ url('/dashboard') }}"
                                        class="nav-link font-weight-bold">
                                        DASHBOARD
                                    </a>
                                    </li>

                                @else
                                    <li class="nav-item">

                                    <a href="{{ route('login') }}"
                                        class="nav-link font-weight-bold">
                                        LOGIN
                                    </a>
                                    </li>

                                    @if (Route::has('register'))
                                    <li class="nav-item">

                                        <a href="{{ route('register') }}"
                                            class="nav-link font-weight-bold">
                                            REGISTER
                                        </a>
                                    </li>

                                    @endif
                                @endauth
                                {{-- </nav> --}}
                                @endif

                                </li>
                            </ul>
                        </div>
                    </nav>
                </div>
                <div class="container-fluid">
                    <div class="logo"><a href="index.html"><img src="images/logo.png"></a></div>
                    <div class="menu_main">
                        <ul>
                            <li class="active"><a href="{{ url('/') }}">HOME</a></li>
                            <li><a href="{{ url('about') }}">ABOUT</a></li>
                            <li><a href="{{ url('blogsection') }}">BLOG</a></li>

                            <li>
                                @if (Route::has('login'))
                                    {{-- <nav class="flex items-center justify-end gap-4"> --}}
                                    @auth
                                <li><a href="{{ url('my_post') }}">MY POSTS</a></li>
                                <li><a href="{{ url('create_post') }}">CREATE POST</a>
                                </li>
                                <li> <a href="{{ url('/dashboard') }}"
                                        class="inline-block px-5 py-1.5 dark:text-[#ededec00] border-[#19140035] hover:border-[#1915014a]  text-[#f5f5ee] dark:border-[#3E3E3A] dark:hover:border-[#62605b] rounded-sm text-sm leading-normal">
                                        DASHBOARD
                                    </a>
                                </li>
                                
                            @else
                                <a href="{{ route('login') }}"
                                    class="inline-block px-5 py-1.5 dark:text-[#ededec00] text-[#ccccc0] border-transparent hover:border-[#19140035] dark:hover:border-[#3E3E3A] rounded-sm text-sm leading-normal">
                                    LOGIN
                                </a>
                                

                                @if (Route::has('register'))
                                    <a href="{{ route('register') }}"
                                        class="inline-block px-5 py-1.5 dark:text-[#ededec00] border-[#19140035] hover:border-[#1915014a]  text-[#fffff8] dark:border-[#3E3E3A] dark:hover:border-[#62605b] rounded-sm text-sm leading-normal">
                                        REGISTER
                                    </a>
                                @endif
                            @endauth
                            {{-- </nav> --}}
                            @endif
                            </li>

                        </ul>
                    </div>
                </div>
            </div>
            
