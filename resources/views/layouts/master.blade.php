<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<title>{{ config('app.name', 'Laravel') }} - @yield('title','App')</title>

	<link rel="canonical" href="https://getbootstrap.com/docs/4.6/examples/dashboard/">

	<!-- Bootstrap core CSS -->
	<link href="{{ asset('css/app.css') }}" rel="stylesheet">

	<style>
	.bd-placeholder-img {
		font-size: 1.125rem;
		text-anchor: middle;
		-webkit-user-select: none;
		-moz-user-select: none;
		-ms-user-select: none;
		user-select: none;
	}

	@media (min-width: 768px) {
		.bd-placeholder-img-lg {
            font-size: 3.5rem;
		}
	}
	</style>

	<!-- Custom styles for this template -->
	<link href="{{ asset('css/dashboard.css') }}" rel="stylesheet">
</head>

<body>
	<nav class="navbar navbar-dark sticky-top bg-dark flex-md-nowrap p-0 shadow">
			<a class="navbar-brand col-md-3 col-lg-2 mr-0 px-3" href="{{ route('home') }}">{{ config('app.name', 'Laravel') }}</a>
			<button class="navbar-toggler position-absolute d-md-none collapsed" type="button" data-toggle="collapse"
					data-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false" aria-label="Toggle navigation">
					<span class="navbar-toggler-icon"></span>
			</button>
			{{-- <input class="form-control form-control-dark w-100" type="text" placeholder="Search" aria-label="Search"> --}}
			<ul class="navbar-nav px-3">
                <li class="nav-item text-nowrap">
                        <a class="nav-link" href="{{ route('logout') }}"
                            onclick="event.preventDefault();
                                            document.getElementById('logout-form').submit();">
                            {{ __('Logout') }}
                        </a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                </li>
			</ul>
	</nav>

    <div class="container-fluid">
        <div class="row">
            <nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
                <div class="sidebar-sticky pt-3">
                    <h6
                        class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-1 mb-1 text-muted">
                        <span>{{ Auth::user()->name }} {{ Auth::user()->last_name }}</span>
                    </h6>
                    <ul class="nav flex-column">
                        <li class="nav-item">
                            <a class="nav-link @yield('dashboard_active')" href="{{ route('home') }}">
                                <span data-feather="home"></span>
                                Dashboard
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link @yield('unit_active')" href="{{ route('units') }}">
                                <span data-feather="folder"></span>
                                Unidades Médicas
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link @yield('director_active')" href="{{ route('directors') }}">
                                <span data-feather="user-check"></span>
                                Directores
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link @yield('doctor_active')" href="{{ route('doctors') }}">
                                <span data-feather="activity"></span>
                                Médicos
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link @yield('patient_active')" href="{{ route('patients') }}">
                                <span data-feather="user"></span>{{-- bar-chart-2 --}}
                                Pacientes
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link @yield('user_active')" href="{{ route('users') }}">
                                <span data-feather="users"></span>
                                Usuarios
                            </a>
                        </li>
                    </ul>

                </div>
            </nav>

            {{-- <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-4"> --}}
                @yield('content')
            {{-- </main> --}}
        </div>
    </div>


    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
    </script>
    <script>
        window.jQuery || document.write('<script src="/js/vendor/jquery.slim.min.js"><\/script>')
    </script>
    <script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>


    <script src="https://cdn.jsdelivr.net/npm/feather-icons@4.28.0/dist/feather.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js@2.9.4/dist/Chart.min.js"></script>
    <script src="{{ asset('js/dashboard.js') }}"></script>
</body>

</html>
