<?php function mix($url) { return $url; } ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-param" content="_token" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
	@stack('meta')

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Styles -->
	@foreach (config('admin.css') as $css)
    	<link href="{{ mix($css) }}" rel="stylesheet">
	@endforeach

	@stack('css')

    <!-- Scripts -->
    <script>
        window.Laravel = <?php echo json_encode([
            'csrfToken' => csrf_token(),
        ]); ?>
    </script>
	@stack('scripts_head')
</head>
<body>
    <div id="app">

		@include('admin::flash')

		@if (!Auth::guest())
        <nav class="navbar navbar-default navbar-static-top">
            <div class="container">
                <div class="navbar-header">

                    <!-- Collapsed Hamburger -->
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
                        <span class="sr-only">Toggle Navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>

                    <!-- Branding Image -->
                    <a class="navbar-brand" href="{{ url('/') }}">
                        {{ config('app.name', 'Laravel') }}
                    </a>
                </div>

                <div class="collapse navbar-collapse" id="app-navbar-collapse">


		            @include('admin::menu')


                    <ul class="nav navbar-nav navbar-right">
                        <!-- Authentication Links -->

                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                {{ Auth::user()->name }} <span class="caret"></span>
                            </a>

                            <ul class="dropdown-menu" role="menu">
                                <li>
                                    <a href="{{ route('admin.logout') }}">
                                        Logout
                                    </a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
		@endif

        @yield('content')
    </div>

    <!-- Scripts -->
	@foreach (config('admin.js') as $js)
		<script src="{{ mix($js) }}"></script>
	@endforeach
	@stack('scripts')
</body>
</html>
