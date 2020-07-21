<!DOCTYPE html>
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
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons"
      rel="stylesheet">
</head>
<body>
    <nav class="navbar navbar-dark sticky-top bg-dark flex-md-nowrap p-0 shadow">
  <a class="navbar-brand col-md-3 col-lg-2 mr-0 px-3" href="{{ url('/') }}"> {{ config('app.name', 'La Liebre') }}</a>
  <button class="navbar-toggler position-absolute d-md-none collapsed" type="button" data-toggle="collapse" data-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  
  <ul class="navbar-nav px-4">
    <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Salir') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </li>
  </ul>

</nav>
<div class="container-fluid">
  <div class="row">
    <nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse" style="">
      <div class="sidebar-sticky pt-3">
        <ul class="nav flex-column">
          <li class="nav-item">
            <a class="nav-link active" href="{{route('home')}}">
              <span class="material-icons">home</span>
              Inicio 
            </a>
          </li>
          @if(Auth::user()->hasRole('admin'))
          <li class="nav-item">
            <a class="nav-link" href="{{route('district')}}">
              <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-file"><path d="M13 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V9z"></path><polyline points="13 2 13 9 20 9"></polyline></svg>
              Distritos
            </a>
          </li>
          @endif
          @if(Auth::user()->hasRole('admin'))
          <li class="nav-item">
            <a class="nav-link" href="{{route('type')}}">
              <span class="material-icons">storefront</span>
              Tipos de tienda
            </a>
          </li>
          @endif
          @if(Auth::user()->hasRole('admin'))
          <li class="nav-item">
            <a class="nav-link" href="{{route('store')}}">
              <span class="material-icons">storefront</span>
              Tiendas
            </a>
          </li>
          @endif
          @if(Auth::user()->hasRole('admin'))
          <li class="nav-item">
            <a class="nav-link" href="{{route('aisle')}}">
              <span class="material-icons">category</span>
              Pasillos
            </a>
          </li>
          @endif
          @if(Auth::user()->hasRole('admin'))
          <li class="nav-item">
            <a class="nav-link" href="{{route('category')}}">
              <span class="material-icons">category</span>
              Categorias de alimentos
            </a>
          </li>
          @endif
          <li class="nav-item">
            <a class="nav-link" href="{{route('category.store')}}">
              <span class="material-icons">category</span>
              Categorias de alimentos @if(Auth::user()->hasRole('admin'))(Tiendas)@endif
            </a>
          </li>
          @if(Auth::user()->hasRole('admin'))
          <li class="nav-item">
            <a class="nav-link" href="{{route('product')}}">
             <span class="material-icons">view_headline</span>
              Productos
            </a>
          </li>
          @endif
          <li class="nav-item">
            <a class="nav-link" href="{{route('product.store')}}">
             <span class="material-icons">view_headline</span>
              Productos @if(Auth::user()->hasRole('admin'))(Tiendas)@endif
            </a>
          </li>
            @if(Auth::user()->hasRole('admin'))
          <li class="nav-item">
            <a class="nav-link" href="{{route('provider')}}">
             <span class="material-icons">face</span>
              Proveedores
            </a>
          </li>
          @endif
           @if(Auth::user()->hasRole('admin'))
          <li class="nav-item">
            <a class="nav-link" href="{{route('recipe.category')}}">
             <span class="material-icons">category</span>
              Categorias de recetas
            </a>
          </li>
          @endif
           @if(Auth::user()->hasRole('admin'))
          <li class="nav-item">
            <a class="nav-link" href="{{route('recipe')}}">
             <span class="material-icons">menu_book</span>
              Recetas
            </a>
          </li>
          @endif

        </ul>
        
      </div>
    </nav>

    <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-4">
            @yield('content')
      
    </main>
  </div>
</div>
<script src="{{ asset('js/jquery/jquery-3.4.1.min.js')}}"></script>
    @yield('js')
        
</body>
</html>