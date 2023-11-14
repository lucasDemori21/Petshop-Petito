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
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</head>

    <nav class="navbar navbar-expand-lg p-0" style="background-color: #ffffff;">
        <div class="container-fluid">
            <a class="logo-home" href="#">
                <img src="{{ asset('images/logo-petito.png') }}" alt="Logo Petito">
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <div class="d-flex flex-column w-100">

                    <ul class="navbar-nav d-flex justify-content-between w-100 ">
                        <form class="d-flex w-75" role="search">
                            <input class="form-control me-2 input-search" type="search" placeholder="Search"
                                aria-label="Search">
                            <button class="btn btn-warning btn-search" type="submit"><i
                                    class="bi bi-search"></i></button>
                        </form>
                        <li class="nav-item">
                            <a class="nav-link logo-header" aria-current="page" href="#"><i
                                    class="bi bi-bag-heart"></i></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link logo-header" href="#"><i class="bi bi-heart"></i></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link logo-header" href="#" aria-disabled="true"><i
                                    class="bi bi-whatsapp fill text-success"></i></a>
                        </li>
                        <li class="nav-item text-center fw-bold d-flex flex-column" style="font-size: 14px">
                            <a class="text-dark" href="#">Entrar</a>
                            <a class="text-dark" href="#"> Cadastrar-se</a>
                        </li>
                    </ul>

                    <div class="btn-group mt-3 p-0" role="group" aria-label="Basic mixed styles example">
                        <a href="#" class="btn btn-light mx-2 my-1 rounded fw-bold">Cachorro</a>
                        <a href="#" class="btn btn-light mx-2 my-1 rounded fw-bold">Gato</a>
                        <a href="#" class="btn btn-light mx-2 my-1 rounded fw-bold">Pássaro</a>
                        <a href="#" class="btn btn-light mx-2 my-1 rounded fw-bold">Peixe</a>
                        <a href="#" class="btn btn-light mx-2 my-1 rounded fw-bold">Outros Pets</a>
                        <a href="#" class="btn btn-light mx-2 my-1 rounded fw-bold">Serviços</a>
                    </div>
                </div>
            </div>
        </div>
