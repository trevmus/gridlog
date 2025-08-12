<!-- Header Section -->
<div class="header">
         <nav>
                <ul class="sidebar">
                    <li onclick=hideSidebar()><a class="" href="#"><svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="#e3e3e3"><path d="m256-200-56-56 224-224-224-224 56-56 224 224 224-224 56 56-224 224 224 224-56 56-224-224-224 224Z"/></svg></a></li>

                    <li class="">
                        <a class="" href="{{ url('home') }}">Home</a>
                    </li>
                    <li class="">
                        <a class="" href="{{ url('about') }}">About</a>
                    </li>

                    <li class="">
                        <a class=" " href="{{ url('blogsection') }}">Blog</a>
                    </li>
                   
                    @if (Route::has('login'))
                        @auth

                            <li class=""> <x-app-layout>

                                </x-app-layout>
                            </li>

                            <li class=""><a class="" href="{{ url('my_post') }}">My Post</a></li>

                            <li class=""><a class="" href="{{ url('create_post') }}">Create Post</a></li>
                        @else
                            <li class=""><a class="" href="{{ route('login') }}">Login</a></li>
                            <li class=""><a class="" href="{{ route('register') }}">Register</a></li>
                        @endauth
                    @endif

                </ul>

                <ul >
                    <li class="logo"><a href="{{ url('home') }}"><img src="{{ asset('images/logo.png') }}" alt="Logo"></a></li>
                    <li class="hideOnMobile"><a href="{{ url('home') }}">Home</a></li>
                    <li class="hideOnMobile"><a href="{{ url('about') }}">About</a></li>
                    <li class="hideOnMobile"><a href="{{ url('blogsection') }}">Blog</a></li>


                    @if (Route::has('login'))
                        @auth

                            <li class="hideOnMobile"> <x-app-layout>

                                </x-app-layout>
                            </li>

                            <li class="hideOnMobile"><a href="{{ url('my_post') }}">My Post</a></li>

                            <li class="hideOnMobile"><a href="{{ url('create_post') }}">Create Post</a></li>
                        @else
                            <li class="hideOnMobile"><a href="{{ route('login') }}">Login</a></li>
                            <li class="hideOnMobile"><a href="{{ route('register') }}">Register</a></li>
                        @endauth
                    @endif
                            <li class="menu-button" onclick=showSidebar()><a href="#"><svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="#e3e3e3"><path d="M120-240v-80h720v80H120Zm0-200v-80h720v80H120Zm0-200v-80h720v80H120Z"/></svg>
                            </a></li>

                </ul>
 
         </nav>     
         
      </div>