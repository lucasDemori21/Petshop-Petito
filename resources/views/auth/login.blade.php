<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login/Cadastro</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/login-register.css') }}">
</head>

<body>
    <div class="container-p">
        <div class="logo">
            <a href="#">
                <img src="{{ asset('images/logos/logo-petito.png') }}" alt="logo-petito">
            </a>
        </div>
        <div class="container-left">
            <h5>Já é Cliente?</h5>
            <form class="form-auth" action="{{ route('auth.login') }}" method="POST">
                @csrf()
                <div class="input-form">
                    <label for="login">Usuário:</label>
                    <input type="email" class="form-control" id='email' name="email" placeholder="email">
                </div>

                <div class="input-form">
                    <label for="senha">Senha:</label>
                    <input type="password" class="form-control" name="password" id="senha" placeholder="********">
                </div>

                @if ($errors->any())
                    <span class="text-center text-danger my-2">
                        {{ $errors->first() }}
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
                    <input type="text" class="form-control" id='nome' name="nome" placeholder="João Carsk">
                </div>

                <div class="input-form">
                    <label for="cpf">CPF:</label>
                    <input type="text" class="form-control" id='cpf' name="cpf"
                        placeholder="000.000.000-00">
                </div>

                <div class="input-form">
                    <label for="email">E-mail:</label>
                    <input type="email" class="form-control" name="email" id="email"
                        placeholder="example@gmail.com">
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
                                <input type="date" class="form-control" id='data' name="data">
                            </div>

                            <div class="input-form col-md-6">
                                <label for="telefone">Telefone/Celular:</label>
                                <input type="text" class="form-control" id='telefone' name="telefone"
                                    placeholder="(47) 99635-6349">
                            </div>

                            <div class="input-form col-md-5">
                                <label for="login">CEP</label>
                                <input type="text" class="form-control" id='cep' name="cep"
                                    placeholder="00000-000">
                            </div>
                            <div class="input-form col-md-7">
                                <label for="estado">Estado:</label>
                                <select id="estado" name="estado" class="form-select">
                                    <option selected disabled value="">Selecione</option>
                                    <option value="AC">Acre</option>
                                    <option value="AL">Alagoas</option>
                                    <option value="AP">Amapá</option>
                                    <option value="AM">Amazonas</option>
                                    <option value="BA">Bahia</option>
                                    <option value="CE">Ceará</option>
                                    <option value="DF">Distrito Federal</option>
                                    <option value="ES">Espírito Santo</option>
                                    <option value="GO">Goiás</option>
                                    <option value="MA">Maranhão</option>
                                    <option value="MT">Mato Grosso</option>
                                    <option value="MS">Mato Grosso do Sul</option>
                                    <option value="MG">Minas Gerais</option>
                                    <option value="PA">Pará</option>
                                    <option value="PB">Paraíba</option>
                                    <option value="PR">Paraná</option>
                                    <option value="PE">Pernambuco</option>
                                    <option value="PI">Piauí</option>
                                    <option value="RJ">Rio de Janeiro</option>
                                    <option value="RN">Rio Grande do Norte</option>
                                    <option value="RS">Rio Grande do Sul</option>
                                    <option value="RO">Rondônia</option>
                                    <option value="RR">Roraima</option>
                                    <option value="SC">Santa Catarina</option>
                                    <option value="SP">São Paulo</option>
                                    <option value="SE">Sergipe</option>
                                    <option value="TO">Tocantins</option>
                                    <option value="EX">Estrangeiro</option>
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
            </form>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
    </script>
</body>

</html>
