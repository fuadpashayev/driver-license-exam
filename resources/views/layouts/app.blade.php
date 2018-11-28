<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    @yield('title')
    <link rel="dns-prefetch" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('general/css/general.css') }}" rel="stylesheet">
    <link href="{{ asset('css/lightbox.css') }}" rel="stylesheet">
    <link href="{{ asset('css/select.css') }}" rel="stylesheet">
    <link href="{{ asset('general/css/loading.css') }}" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" rel="stylesheet"/>
    @yield('css')
</head>
<body>
    <div id="loader">
        <div class="lds-roller"><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div></div>
    </div>

    <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="deleteModal" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="deleteModalTitle">Deleting...</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body" id="deleteModalBody">
                    Are you sure to delete?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" data-dismiss="modal">Cancel</button>
                    <button type="button" class="btn btn-danger" id="delete">Delete</button>
                </div>
            </div>
        </div>
    </div>

    <div id="wrapper">
        @auth
        <div id="navigation">
            <div class="nav-header">Primary</div>
            <a href="{{route('home')}}"><div class="nav-menu {{routeCheck('home')?'active':null}}"><i class="material-icons">dashboard</i> Dashboard</div></a>
            <a href="{{route('user.index')}}"><div class="nav-menu {{routeCheck('user')?'active':null}}"><i class="material-icons">people</i> Users</div></a>
            <a href="{{route('setting.index')}}"><div class="nav-menu {{routeCheck('setting')?'active':null}}"><i class="material-icons">settings</i> Settings</div></a>
            <div class="nav-header">General</div>
            <a href="{{route('category.index')}}"><div class="nav-menu {{routeCheck('category')?'active':null}}"><i class="material-icons">dns</i> Categories</div></a>
            <a href="{{route('question.index')}}"><div class="nav-menu {{routeCheck('question')?'active':null}}"><i class="material-icons">assignment</i> Questions</div></a>
        </div>
        @endauth
        <div id="app" style="@guest width:100%; @endguest">
            <nav class="navbar navbar-expand-md navbar-light navbar-laravel">
                @if(previousRoute())
                <div class="nav-back"><a href="{{previousRoute()}}"><button class="btn btn-primary btn-iconed"><i class="material-icons">chevron_left</i> Back</button></a></div>
                @endif
                @if(createRoute())
                    <div class="nav-back"><a href="{{createRoute()}}"><button class="btn btn-primary btn-iconed"><i class="material-icons">add</i> Add</button></a></div>
                @endif
                <div id="spot-break"></div>
                <div class="container">
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav navbar-right">
                            @guest
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                                </li>
                                <li class="nav-item">
                                    @if (Route::has('register'))
                                        <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                    @endif
                                </li>
                            @else
                                <li class="nav-item dropdown">
                                    <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                        {{ Auth::user()->name }} <span class="caret"></span>
                                    </a>

                                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                        <a class="dropdown-item" href="{{ route('logout') }}"
                                           onclick="event.preventDefault();
                                                         document.getElementById('logout-form').submit();">
                                            {{ __('Logout') }}
                                        </a>

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            @csrf
                                        </form>
                                    </div>
                                </li>
                            @endguest
                        </ul>
                    </div>
                </div>
            </nav>

            <main class="py-4">
                <div id="ajax-content">
                    @yield('content')
                </div>
            </main>
        </div>
    </div>
    <script src="{{ asset('js/app.js') }}"></script>
    <script src="https://code.jquery.com/jquery-2.2.4.min.js" integrity="sha256-BbhdlvQf/xTY9gja0Dq3HiwQF8LaCRTXxZKRutelT44=" crossorigin="anonymous"></script>
    <script src="{{asset('js/lightbox.js')}}"></script>
    <script src="https:////cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js" integrity="sha384-smHYKdLADwkXOn1EmN1qk/HfnUcbVRZyYmZ4qpPea6sjB/pTJ0euyQp0Mk8ck+5T" crossorigin="anonymous"></script>
    <script src="{{asset('js/select.js')}}"></script>
    <script src="{{asset('general/js/general.js')}}"></script>
    @yield('js')
</body>
</html>
