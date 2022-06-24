<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Turma 90') }}</title>
    {{-- CSS --}}
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    
    {{-- CSS --}}
</head>
<body>
    <div class="container">
        {{-- MENU --}}
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb mt-3">
              <li class="breadcrumb-item">
                {{ Auth::user()->name }}
              </li>
              <li class="breadcrumb-item">                
                <a href="#" class="btn btn-primary">
                  <i class="fa-solid fa-house"></i>
                  Home
                </a>
              </li>
              <li class="breadcrumb-item">
                <a href="{{ route('produto.index') }}" class="btn btn-secondary">
                    <i class="fa-brands fa-product-hunt"></i>
                    Produtos
                </a>
              </li>
              <li class="breadcrumb-item">
                <a href="{{ route('lista.index') }}" class="btn btn-warning">
                  <i class="fa-solid fa-list-check"></i>
                    Listas de Compras
                </a>
              </li>
              @yield('menu')                         
            </ol>             
        </nav>
        {{-- /MENU --}}
        {{-- CONTEUDO --}}
        @yield('conteudo')
        {{-- /CONTEUDO --}}     
    </div>    
</body>
{{-- JS --}}
<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
<script src="{{ asset('js/app.js') }}" defer></script>
@yield('script')
{{-- /JS --}}
</html>