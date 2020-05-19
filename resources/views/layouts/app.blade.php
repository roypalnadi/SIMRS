<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">

    <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/solid.js" integrity="sha384-tzzSw1/Vo+0N5UhStP3bvwWPq+uvzCMfrN1fEFe+xBmv1C/AtVX5K0uZtmcHitFZ" crossorigin="anonymous"></script>
    <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/fontawesome.js" integrity="sha384-6OIrr52G08NpOFSZdxxz1xdNSndlD4vdcf/q2myIUVO0VsqaGHJsB0RaBE01VTOY" crossorigin="anonymous"></script>

</head>
<body>
    <div class="wrapper">
        @guest
        @else
        <nav id="sidebar">
            <div class="sidebar-header">
                <h3 class="d-inline pl-2">SIMRS</h3>
            </div>

            <ul class="list-unstyled components">
                <li>
                    <a class="active" href=@if(Auth::user()->role == 1){{ route('admin') }} @else {{ route('doctor') }} @endif>Home</a>
                </li>
                @if(Auth::user()->role == 1)
                <li>
                    <a href={{route('user.index')}}>User</a>
                </li>
                <li>
                    <a href={{ route('doctor.index') }}>Data Dokter</a>
                </li>
                <li>
                    <a href={{ route('poliklinik.index') }}>Poliklenik</a>
                </li>
                @endif
                <li>
                    <a href=@if(Auth::user()->role == 1){{ route('pasien.index') }} @else {{ route('viewDoctor', Auth::user()->doktor_id) }} @endif>Pasien</a>
                </li>
            </ul>
        </nav>
        @endguest
        <div id="content">
            @guest
            @else
            <nav class="navbar navbar-expand-lg navbar-light">
                <div class="container-fluid">

                    <button type="button" id="sidebarCollapse" class="btn">
                        <i class="fas fa-align-left"></i>
                    </button>

                    <button class="btn btn-dark d-inline-block d-lg-none ml-auto" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <i class="fas fa-align-justify"></i>
                    </button>

                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="nav navbar-nav ml-auto">
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    @if(Auth::user()->role ==2)
                                    <a class="dropdown-item" href="{{ route('profil', Auth::user()->doktor_id) }}"><i class="fas fa-info-circle"></i> {{ __('Profil') }} </a>
                                    @endif

                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                    onclick="event.preventDefault();
                                    document.getElementById('logout-form').submit();"><i class="fas fa-sign-out-alt"></i>
                                    {{ __('Logout') }} </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>
            @endguest

        @yield('content')
        
        </div>
    </div>


{{-- <div id="app">
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
                    <!-- Authentication Links -->
                    @guest
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
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

<main class="py-5">
    @yield('content')
</main>
</div> --}}


<script src="{{ asset('js/jquery.min.js') }}"></script>
<!-- Popper.JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js" integrity="sha384-cs/chFZiN24E4KMATLdqdvsezGxaGsi4hLGOzlXwp5UZB1LY//20VyM2taTB4QvJ" crossorigin="anonymous"></script>
<script type="text/javascript">
    $(document).ready(function () {
        $('#sidebarCollapse').on('click', function () {
            $('#sidebar').toggleClass('active');
        });

        @if(isset($dataPoliklinik))
        @if(isset($dataDoctor))
        if ($('#role').val() == 2) {
            $('#poliklinik').html(`
                <label class="col-md-2 col-form-label">Poliklinik</label>
                <div class="col-md-10">
                    <select class="form-control" name="poliklinik">
                        @foreach($dataPoliklinik as $value)
                        <option @if($dataDoctor->poliklinik_id == $value->id) selected @endif value={{ $value->id }}>{{ $value->name }}</option>
                        @endforeach
                    </select>
                </div>
            `);
        }
        @endif
        $('#role').on('change', function(){
            if (this.value == 2) {
                $('#poliklinik').html(`
                    <label class="col-md-2 col-form-label">Poliklinik</label>
                    <div class="col-md-10">
                        <select class="form-control" name="poliklinik">
                            @foreach($dataPoliklinik as $value)
                            <option @if(old('poliklinik') == $value->id) selected @endif value={{ $value->id }}>{{ $value->name }}</option>
                            @endforeach
                        </select>
                    </div>
                `);
            }else{
                $('#poliklinik').html('');
            }
        })
        @endif

        @if(isset($dataPoliklinik))
        $('#kategori').on('change', function(){
            if (this.value == 'Baru') {
                $('#formPasien').html(` 
                    <div class="form-group row">
                            <label class="col-md-2 col-form-label">Name</label>
                            <div class="col-md-10">
                                <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" placeholder="Put Name Here" value={{ old('name') }}>
                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-md-2 col-form-label">Email address</label>
                            <div class="col-md-10">
                                <input type="text" name="email" class="form-control @error('email') is-invalid @enderror" placeholder="name@example.com" value={{ old('email') }}>
                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-md-2 col-form-label">No HP</label>
                            <div class="col-md-10">
                                <input type="text" name="noHP" class="form-control @error('noHP') is-invalid @enderror" placeholder="Put Number Here" value={{ old('noHP') }}>
                                @error('alamat')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-md-2 col-form-label">Alamat</label>
                            <div class="col-md-10">
                                <input type="txt" name="alamat" class="form-control @error('alamat') is-invalid @enderror" placeholder="Put Address Here" value={{ old('alamat') }}>
                                @error('alamat')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div id="poliklinik" class="form-group row">
                            <label class="col-md-2 col-form-label">Poliklinik</label>
                            <div class="col-md-10">
                                <select class="form-control" name="poliklinik">
                                    @foreach($dataPoliklinik as $value)
                                    <option @if(old('poliklinik') == $value->id) selected @endif value={{ $value->id }}>{{ $value->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                `);
            } else {
                @if(isset($dataPasien))
                $('#formPasien').html(`
                    <div class="form-group row"> 
                        <label class="col-md-2 col-form-label">Name</label>
                        <div class="col-md-10">
                            <select class="form-control" name="id">
                                @foreach($dataPasien as $value)
                                <option @if(old('name') == $value->name) selected @endif value={{ $value->id }}>{{ $value->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                `); 
                @endif   
            }
        });
        @endif

    });
</script>
</body>
</html>
