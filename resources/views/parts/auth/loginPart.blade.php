<div class="container-left">
    <h5>Já é Cliente?</h5>
    <form class="form-auth" action="{{ route('auth.login') }}" method="POST" onsubmit="return validateLogin()">
        @csrf()
        <div class="input-form">
            <label for="login">Usuário:</label>
            <input type="email" class="form-control" value="{{ old('email') }}" id='emailLogin' name="email" value="{{ old('email') }}"
                placeholder="example@email.com">
        </div>

        @if ($errors->any())
            <span class="text-center text-danger my-2">
                {{ $errors->first('error-email-login') }}
            </span>
        @endif

        <div class="input-form">
          <label for="senha">Senha:</label>
          <div class="input-group">
            <input type="password" class="form-control" name="password" id="senhaLogin" placeholder="********" autocomplete="off">
            <div class="input-group-append">
              <span class="input-group-text" id="showSenhaLoginToggle" onclick="togglePasswordVisibility('senhaLogin')">
                <i class="bi bi-eye-slash"></i> 
              </span>
            </div>
          </div>
        </div>


        @if ($errors->any())
            <span class="text-center text-danger my-2">
                {{ $errors->first('error-login') }}
            </span>
        @endif
        
        <div class="d-none my-2" id="validateLogin">
            <span class="text-center text-danger">O campo "Email" é obrigatório.</span>
            <br>
            <span class="text-center text-danger">O campo "Senha" é obrigatório.</span>
        </div>

        <div class="d-flex justify-content-center mt-1">
            <a href="" class="text-decoration-none" data-bs-target="#exampleModalToggle" data-bs-toggle="modal">Esqueci minha senha</a>
            
        </div>

        <div class="d-flex justify-content-center mt-3">
            <button class="btn btn-light fw-bold" style="background-color: #F3A87D;"
                type="submit">Entrar</button>
        </div>


    </form>

    <div class="modal fade" id="exampleModalToggle" aria-hidden="true" aria-labelledby="exampleModalToggleLabel" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered">
          <div class="modal-content" style="background-color: #FDF5F5 !important;">
            <div class="modal-header">
              <h1 class="modal-title fs-5 d-flex justify-content-center" id="exampleModalToggleLabel">Esqueci minha senha</h1>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
              <form action="{{ route('forgot.password') }}" method="POST">
                @csrf
                <label for="remember_email" c>Digite seu e-mail:</label>
                <input type="text" style="background-color: rgba(217, 217, 217, 0.4) !important" class="form-control" name="remember_email" placeholder="petito@example.com">
                <div class="d-flex justify-content-center mt-3">
                  <button class="btn btn-light fw-bold" style="background-color: #F3A87D;" type="submit">Enviar email</button>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
</div>