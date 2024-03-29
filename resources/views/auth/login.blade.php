<!doctype html>
<html lang="pt-BR">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="{{ asset('/images/logos/petito.png') }}" type="image/png" sizes="64x64">
    <title>Login/Cadastro</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/login-register.css') }}">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">

</head>

<body>

    @if (session('verify'))
        {!! session('verify') !!}
    @endif

    @if (session('updatePass'))
        {!! session('updatePass') !!}
    @endif

    <div class="container-p">
        <div class="logo">
            <a href="{{ route('index') }}">
                <img src="{{ asset('images/logos/logo-petito.png') }}" alt="logo-petito">
            </a>
        </div>

        @include('parts.auth.loginPart')

        <span class="line-middle"></span>

        @include('parts.auth.cadastroPart')

    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
    </script>
    <script src="/js/login.js"></script>
</body>

</html>
