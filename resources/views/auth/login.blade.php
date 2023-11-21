<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login/Cadastro</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/login-register.css') }}">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>

<body>
    <div class="container-p">
        <div class="logo">
            <a href="{{ route('index') }}">
                <img src="{{ asset('images/logos/logo-petito.png') }}" alt="logo-petito">
            </a>
        </div>
        <div class="container-left">
            <h5>Já é Cliente?</h5>
            <form class="form-auth" action="{{ route('auth.login') }}" method="POST">
                @csrf()
                <div class="input-form">
                    <label for="login">Usuário:</label>
                    <input type="email" class="form-control" id='email' name="email" value="{{ old('email') }}"
                        placeholder="example@email.com">
                </div>

                @if ($errors->any())
                    <span class="text-center text-danger my-2">
                        {{ $errors->first('error-email-login') }}
                    </span>
                @endif

                <div class="input-form">
                    <label for="senha">Senha:</label>
                    <input type="password" class="form-control" name="password" id="senha" placeholder="********">
                </div>


                @if ($errors->any())
                    <span class="text-center text-danger my-2">
                        {{ $errors->first('error-login') }}
                    </span>
                @endif

                <div class="d-flex justify-content-center mt-1">
                    <a href="" class="text-decoration-none">Esqueci minha senha</a>
                </div>

                <div class="d-flex justify-content-center mt-3">
                    <button class="btn btn-light fw-bold" style="background-color: #F3A87D;"
                        type="submit">Entrar</button>
                </div>

            </form>
        </div>
        <div class="container-right">
            <h5>Faça seu cadastro</h5>
            <form class="form-auth" action="{{ route('auth.cadastrar') }}" method="POST">

                @csrf()

                <div class="input-form">
                    <label for="nome">Nome completo:</label>
                    <input type="text" class="form-control" id='nome' name="nome"
                        placeholder="João Carsk" value="{{old('nome')}}">
                </div>

                <div class="input-form">
                    <label for="cpf">CPF:</label>
                    <input type="text" class="form-control" id='cpf' name="cpf"
                        placeholder="000.000.000-00" value="{{old('cpf')}}">
                </div>

                <div class="input-form">
                    <label for="email">E-mail:</label>
                    <input type="email" class="form-control" name="email" id="email-cadastro"
                        placeholder="example@gmail.com" value="{{old('email')}}">
                </div>

                <div class="d-flex justify-content-center mt-3">
                    <button class="btn btn-light fw-bold" style="background-color: #F3A87D;" type="button"
                        data-bs-toggle="offcanvas" data-bs-target="#offcanvasScrolling"
                        aria-controls="offcanvasScrolling">Continuar</button>
                </div>

                <div class="offcanvas offcanvas-end w-50" data-bs-scroll="true" data-bs-backdrop="false" tabindex="-1"
                    id="offcanvasScrolling" aria-labelledby="offcanvasScrollingLabel">
                    <div class="offcanvas-header">
                        <h5 class="offcanvas-title" id="offcanvasScrollingLabel">Cadastro</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="offcanvas"
                            aria-label="Close"></button>
                    </div>

                    <div class="offcanvas-body">
                        <div class="row w-75 mx-auto">

                            <div class="input-form col-md-6">
                                <label for="login">Data de nascimento:</label>
                                <input type="date" class="form-control" id='data' name="data" value="{{old('data')}}">
                            </div>

                            <div class="input-form col-md-6">
                                <label for="telefone">Telefone/Celular:</label>
                                <input type="text" class="form-control" id='telefone' name="telefone"
                                    placeholder="(99) 99999-9999" value="{{old('telefone')}}">
                            </div>

                            <div class="input-form col-md-5">
                                <label for="login">CEP</label>
                                <input type="text" class="form-control" id='cep' name="cep"
                                    placeholder="00000-000" value="{{old('cep')}}">
                            </div>
                            <div class="input-form col-md-7">
                                <label for="estado">Estado:</label>
                                <select id="estado" name="estado" class="form-select">
                                    <option selected disabled value="">Selecione</option>
                                    <option value="AC" {{ old('estado') == 'AC' ? 'selected' : '' }}>Acre</option>
                                    <option value="AL" {{ old('estado') == 'AL' ? 'selected' : '' }}>Alagoas</option>
                                    <option value="AP" {{ old('estado') == 'AP' ? 'selected' : '' }}>Amapá</option>
                                    <option value="AM" {{ old('estado') == 'AM' ? 'selected' : '' }}>Amazonas</option>
                                    <option value="BA" {{ old('estado') == 'BA' ? 'selected' : '' }}>Bahia</option>
                                    <option value="CE" {{ old('estado') == 'CE' ? 'selected' : '' }}>Ceará</option>
                                    <option value="DF" {{ old('estado') == 'DF' ? 'selected' : '' }}>Distrito Federal</option>
                                    <option value="ES" {{ old('estado') == 'ES' ? 'selected' : '' }}>Espírito Santo</option>
                                    <option value="GO" {{ old('estado') == 'GO' ? 'selected' : '' }}>Goiás</option>
                                    <option value="MA" {{ old('estado') == 'MA' ? 'selected' : '' }}>Maranhão</option>
                                    <option value="MT" {{ old('estado') == 'MT' ? 'selected' : '' }}>Mato Grosso</option>
                                    <option value="MS" {{ old('estado') == 'MS' ? 'selected' : '' }}>Mato Grosso do Sul</option>
                                    <option value="MG" {{ old('estado') == 'MG' ? 'selected' : '' }}>Minas Gerais</option>
                                    <option value="PA" {{ old('estado') == 'PA' ? 'selected' : '' }}>Pará</option>
                                    <option value="PB" {{ old('estado') == 'PB' ? 'selected' : '' }}>Paraíba</option>
                                    <option value="PR" {{ old('estado') == 'PR' ? 'selected' : '' }}>Paraná</option>
                                    <option value="PE" {{ old('estado') == 'PE' ? 'selected' : '' }}>Pernambuco</option>
                                    <option value="PI" {{ old('estado') == 'PI' ? 'selected' : '' }}>Piauí</option>
                                    <option value="RJ" {{ old('estado') == 'RJ' ? 'selected' : '' }}>Rio de Janeiro</option>
                                    <option value="RN" {{ old('estado') == 'RN' ? 'selected' : '' }}>Rio Grande do Norte</option>
                                    <option value="RS" {{ old('estado') == 'RS' ? 'selected' : '' }}>Rio Grande do Sul</option>
                                    <option value="RO" {{ old('estado') == 'RO' ? 'selected' : '' }}>Rondônia</option>
                                    <option value="RR" {{ old('estado') == 'RR' ? 'selected' : '' }}>Roraima</option>
                                    <option value="SC" {{ old('estado') == 'SC' ? 'selected' : '' }}>Santa Catarina</option>
                                    <option value="SP" {{ old('estado') == 'SP' ? 'selected' : '' }}>São Paulo</option>
                                    <option value="SE" {{ old('estado') == 'SE' ? 'selected' : '' }}>Sergipe</option>
                                    <option value="TO" {{ old('estado') == 'TO' ? 'selected' : '' }}>Tocantins</option>
                                </select>
                            </div>

                            <div class="input-form col-md-12">
                                <label for="cidade">Cidade:</label>
                                <input type="text" class="form-control" id='cidade' name="cidade"
                                    placeholder="São Paulo">
                            </div>

                            <div class="input-form col-md-12">
                                <label for="bairro">Bairro:</label>
                                <input type="text" class="form-control" name="bairro" id="bairro"
                                    placeholder="Osasco">
                            </div>

                            <div class="input-form col-md-12">
                                <label for="rua">Rua:</label>
                                <input type="text" class="form-control" name="rua" id="rua"
                                    placeholder="João pessoa">
                            </div>

                            <div class="input-form col-md-6">
                                <label for="numero">Número:</label>
                                <input type="text" class="form-control" name="numero" id="numero">
                            </div>

                            <div class="input-form col-md-6">
                                <label for="senha">Complemento:</label>
                                <input type="text" class="form-control" name="complemento" id="complemento">
                            </div>

                            <div class="input-form col-md-12">
                                <label for="senha">Senha:</label>
                                <input type="password" class="form-control" name="password" id="senha">
                            </div>

                            <div class="d-flex justify-content-center my-3">
                                <button class="btn btn-light fw-bold" style="background-color: #F3A87D;"
                                    type="submit">Cadastrar</button>
                            </div>
                        </div>
                    </div>
                </div>
                @if ($errors->any())
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                @endif
            </form>
            @if ($errors->has('error-cadastro'))
                {{ $errors->first('error-cadastro') }}
            @endif
            @if (session('success'))
                {!! session('success') !!}
            @endif
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
    </script>
</body>

</html>
