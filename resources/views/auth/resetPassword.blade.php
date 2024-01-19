<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Redefinir senha</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/login-register.css') }}">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>

<body>
    @if (session('updatePass'))
        {!! session('updatePass') !!}
    @endif

    <div class="logo">
        <a href="{{ route('index') }}">
            <img src="{{ asset('images/logos/logo-petito.png') }}" alt="logo-petito">
        </a>
    </div>

    <div class="container-reset">
        <form action="{{ route('update.password') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="formGroupExampleInput" class="form-label">Conta:</label>
                <input type="email" class="form-control" name="email" readonly value="lucas.demori2001@gmail.com">
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Nova senha:</label>
                <input type="password" class="form-control" name="password" placeholder="********">
            </div>
            <div class="mb-3">
                <label for="password_confirmation" class="form-label">Confirme nova
                    senha:</label>
                <input type="password" class="form-control" name="password_confirmation" placeholder="********">
            </div>
            @if ($errors->any())
                @foreach ($errors->all() as $error)
                    <span class="text-danger">{{ $error }}</span><br>
                @endforeach
            @endif
            <div class="w-100 d-flex justify-content-center">
                <button type="submit" class="btn btn-warning">Atualizar senha</button>
            </div>
        </form>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
    </script>
</body>

</html>
