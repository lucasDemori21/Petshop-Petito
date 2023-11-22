<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    <link href="https://fonts.cdnfonts.com/css/cotane-beach" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/navbar.css') }}">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
    </script>
</head>

<nav class="navbar navbar-expand-lg p-0">
    <div class="container-fluid">
        <a class="logo-home" href="#">
            <img src="{{ asset('images/logos/logo-petito.png') }}" alt="Logo Petito">
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <div class="d-flex flex-column w-100">

                <ul class="navbar-nav d-flex justify-content-between w-100">
                    <form class="d-flex w-75 mx-auto nav-mobile" role="search">
                        <input class="form-control me-2 input-search" type="search" placeholder="Search"
                            aria-label="Search">
                        <button class="btn btn-warning btn-search" type="submit"><i class="bi bi-search"></i></button>
                    </form>
                    <div class="d-flex justify-content-center mx-auto flex-wrap nav-mobile">

                        <li class="nav-item mx-1">
                            <a class="nav-link logo-header" aria-current="page" href="#"><i
                                    class="bi bi-bag-heart"></i></a>
                        </li>
                        <li class="nav-item mx-1">
                            <a class="nav-link logo-header" href="#"><i class="bi bi-heart"></i></a>
                        </li>
                        <li class="nav-item mx-1">
                            <a class="nav-link logo-header" href="#" aria-disabled="true"><i
                                    class="bi bi-whatsapp fill text-success"></i></a>
                        </li>
                    </div>
                    {{-- @guest('cliente')
                        <li class="nav-item mx-1 text-center fw-bold d-flex flex-column nav-mobile" style="font-size: 14px">
                            <a class="text-dark" href="{{ route('login.show') }}">Entrar ou Cadastrar-se</a>
                        </li>
                    @else
                        <p>Bem-vindo, {{ Auth::guard('cliente')->user()->name }}</p>
                    @endguest

                    @guest('funcionario')
                        <li class="nav-item mx-1 text-center fw-bold d-flex flex-column nav-mobile" style="font-size: 14px">
                            <a class="text-dark" href="{{ route('login.show') }}">Entrar ou Cadastrar-se</a>
                        </li>
                    @else
                        <p>Bem-vindo, {{ Auth::guard('funcionario')->user()->name }}</p>
                    @endguest --}}
                    @if(Auth::check())
    <p>Bem-vindo, {{ Auth::user()->name }}!</p>
    <a href="{{ route('logout') }}">Sair</a>
@else
    <a href="{{ route('login') }}">Login</a>
@endif
                </ul>

                <div class="btn-group flex-wrap mt-3 p-0" role="group" aria-label="Basic mixed styles example">
                    <a href="#" class="btn btn-light m-1 rounded fw-bold"
                        style="background-color: #A5E1E9;">Cachorro</a>
                    <a href="#" class="btn btn-light m-1 rounded fw-bold"
                        style="background-color: #FFC296;">Gato</a>
                    <a href="#" class="btn btn-light m-1 rounded fw-bold"
                        style="background-color: #C4BDF3;">Pássaro</a>
                    <a href="#" class="btn btn-light m-1 rounded fw-bold"
                        style="background-color: #FCE8A5;">Peixe</a>
                    <a href="#" class="btn btn-light m-1 rounded fw-bold"
                        style="background-color: #D5EDB9;">Outros Pets</a>
                    <a href="#" class="btn btn-light m-1 rounded fw-bold"
                        style="background-color: #F8CADC;">Serviços</a>
                </div>
            </div>
        </div>
    </div>
</nav>
