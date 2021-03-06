<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<!-- CSRF Token -->
	<meta name="csrf-token" content="{{ csrf_token() }}">

	<title>{{ config('app.name', 'Laravel') }}</title>

	<!-- Scripts -->
	{{--<script src="{{ asset('js/app.js') }}" defer></script>--}}

	<!-- Fonts -->
	<link rel="dns-prefetch" href="//fonts.gstatic.com">
	<link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

	<!-- Styles -->
	<link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
	<div id="xapp">
		<nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
			<div class="container">
				<a class="navbar-brand" href="{{ url('/') }}">
					{{ config('app.name', 'Laravel') }}
				</a>
				<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
					<span class="navbar-toggler-icon"></span>
				</button>

				<div class="collapse navbar-collapse" id="navbarSupportedContent">
					<!-- Left Side Of Navbar -->
					<ul class="navbar-nav mr-auto">

					</ul>

					<!-- Right Side Of Navbar -->
					<ul class="navbar-nav ml-auto">
						<li class="nav-item">
							<a class="nav-link" href="{{ route('lang.index', ['locale' => 'sk']) }}">SK</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" href="{{ route('lang.index', ['locale' => 'en']) }}">EN</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" href="{{ __route('book.index', ['bbb' => 'ccccccc']) }}">Knihy</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" href="{{ __route('book.create') }}">Vložiť knihu</a>
						</li>
						<!-- Authentication Links -->
						@guest
							<li class="nav-item">
								<a class="nav-link" href="{{ __route('login') }}">{{ __('Login') }}</a>
							</li>
							@if (Route::has('register'))
								<li class="nav-item">
									<a class="nav-link" href="{{ __route('register') }}">{{ __('Register') }}</a>
								</li>
							@endif
						@else
							<li class="nav-item dropdown">
								<a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
									{{ Auth::user()->name }} <span class="caret"></span>
								</a>

								<div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
									<a class="dropdown-item" href="{{ __route('logout') }}"
									   onclick="event.preventDefault();
													 document.getElementById('logout-form').submit();">
										{{ __('Logout') }}
									</a>

									<form id="logout-form" action="{{ __route('logout') }}" method="POST" style="display: none;">
										@csrf
									</form>
								</div>
							</li>
						@endguest
					</ul>
				</div>
			</div>
		</nav>

		{{--<div class="container mt-4">
			<div class="row">
				<div class="col-sm-12">
					@include('flash::message')
				</div>
			</div>
		</div>--}}

		<div id="app">
			<div id="vueFlashWrapper">
				<flash-component v-for="flash in vueFlashes" v-bind:message="flash"></flash-component>
			</div>
		</div>

		<main class="py-4 content">
			@yield('content')
		</main>
	</div>

	<script src="{{ asset('js/app.js') }}"></script>

	@yield('scripts')

	<script>
		$(function() {
			@foreach (session('flash_notification', collect())->toArray() as $message)
				vueApp.vueFlashes.push( {!! json_encode($message) !!} );
			@endforeach

            console.log(vueApp.vueFlashes);
		});
	</script>

</body>
</html>
