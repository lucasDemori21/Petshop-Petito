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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.0/jquery.min.js"
        integrity="sha512-3gJwYpMe3QewGELv8k/BX9vcqhryRdzRMxVfq6ngyWXwo03GFEzjsUm8Q7RZcHPHksttq7/GFoxjCVUjkjvPdw=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>

</head>


<nav class="navbar navbar-expand-lg p-0">
    <div class="container-fluid">
        <a class="logo-home" href="{{ route('index') }}">
            <img src="{{ asset('images/logos/logo-petito.png') }}" alt="Logo Petito">
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <div class="d-flex flex-column w-100">

                <ul class="navbar-nav d-flex justify-content-between w-100">
                    <form class="d-flex w-75 m-auto nav-mobile" role="search" action="{{ route('shop.search') }}">
                        @csrf
                        <input class="form-control me-2 input-search" name="search" type="search" placeholder="Search"
                            aria-label="Search">
                        <button class="btn btn-warning btn-search" type="submit"><i class="bi bi-search"></i></button>
                    </form>
                    <div class="d-flex justify-content-center mx-auto nav-mobile">

                        <li class="nav-item mx-1">
                            <a class="nav-link logo-header position-relative" aria-current="page" href="#"><i
                                    class="bi bi-bag-heart"></i>
                                <span class="position-absolute translate-middle badge rounded-pill bg-danger">

                                    <span id="qtdCar"></span>
                                    
                                    <span class="visually-hidden">unread messages</span>
                                </span>
                            </a>
                        </li>
                        <li class="nav-item mx-1">
                            <a class="nav-link logo-header" href="#"><i class="bi bi-heart"></i></a>
                        </li>
                        <li class="nav-item mx-1">
                            <a class="nav-link logo-header"
                                href="https://api.whatsapp.com/send?phone=47996356349&text=Ol%C3%A1,%20eu%20gostaria%20de%20fazer%20um%20agendamento."
                                target="_blank" aria-disabled="true"><i
                                    class="bi bi-whatsapp fill text-success"></i></a>
                        </li>
                    </div>

                    <li class="nav-item m-auto text-center fw-bold d-flex flex-column nav-mobile">
                        @if (auth('cliente')->check() || auth('funcionario')->check())
                            @if (auth('cliente')->check())
                                <?php $nome_user = explode(' ', Auth::guard('cliente')->user()->nome_cliente)[0]; ?>
                            @elseif(auth('funcionario')->check())
                                <?php $nome_user = explode(' ', Auth::guard('funcionario')->user()->nome_func)[0]; ?>
                            @endif
                            <div class="btn-group dropstart">
                                <button type="button" class="btn btn-light dropdown-toggle dropdown-toggle-split"
                                    style="height: 45px; background-color: #FDF5F5;" data-bs-toggle="dropdown" aria-expanded="false">
                                    <span class="visually-hidden"></span>
                                </button>
                                <ul class="dropdown-menu" style="background-color: #FDF5F5;">

                                    <li><a class="dropdown-item" href="#">Action</a></li>
                                    <li><a class="dropdown-item" href="#">Another action</a></li>
                                    <li><a class="dropdown-item" href="#">Something else here</a></li>

                                    @if (auth('funcionario')->check())
                                        <li>
                                            <hr class="dropdown-divider">
                                        </li>
                                        <li><a class="dropdown-item" href="#">Dashboard</a></li>
                                        <li><a class="dropdown-item" href="#">Estoque</a></li>
                                        <li><a class="dropdown-item"
                                                href="{{ route('show.cadastrar_produto') }}">Cadastrar produto</a></li>
                                    @endif

                                    <li>
                                        <hr class="dropdown-divider">
                                    </li>
                                    <li><a class="dropdown-item" href="{{ route('logout') }}">Sair</a></li>

                                </ul>
                                <button type="button" class="btn btn-light"
                                    style=" max-width:200px; height: 45px; white-space: nowrap; background-color: #FDF5F5;">
                                    Olá, {{ $nome_user }}
                                </button>
                            </div>
                        @else
                            <a class="text-dark" href="{{ route('login.show') }}">Entrar <br> Cadastre-se</a>
                        @endif
                    </li>
                </ul>

                <div class="btn-group flex-wrap mt-3 p-0" role="group" aria-label="Basic mixed styles example">
                    <a href="{{ route('shop.produtos', 1) }}" class="btn btn-light m-1 rounded fw-bold"
                        style="background-color: #A5E1E9;">Cachorro</a>
                    <a href="{{ route('shop.produtos', 2) }}" class="btn btn-light m-1 rounded fw-bold"
                        style="background-color: #FFC296;">Gato</a>
                    <a href="{{ route('shop.produtos', 3) }}" class="btn btn-light m-1 rounded fw-bold"
                        style="background-color: #C4BDF3;">Pássaro</a>
                    <a href="{{ route('shop.produtos', 4) }}" class="btn btn-light m-1 rounded fw-bold"
                        style="background-color: #FCE8A5;">Peixe</a>
                    <a href="{{ route('shop.produtos', 5) }}" class="btn btn-light m-1 rounded fw-bold"
                        style="background-color: #D5EDB9;">Outros Pets</a>
                    <a href="{{ route('show.servicos') }}" class="btn btn-light m-1 rounded fw-bold"
                        style="background-color: #F8CADC;">Serviços</a>
                </div>
            </div>
        </div>
    </div>
</nav>

<script>
    async function qtdCar() {
        try{

            // resposta = axios.get({{route('qtd.carrinho')}});

            // document.getElementById('qtdCar').innerHTML = resposta.data.qtd;

        } catch (error) {

            console.log('Erro na requisição: ' + error)
            
        }


    }
</script>
