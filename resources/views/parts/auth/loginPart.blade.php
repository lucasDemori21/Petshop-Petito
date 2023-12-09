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
            <input type="password" class="form-control" name="password" id="senhaLogin" placeholder="********" autocomplete="off">
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
          <div class="modal-content">
            <div class="modal-header">
              <h1 class="modal-title fs-5" id="exampleModalToggleLabel">Modal 1</h1>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
              <form action="" method="get">
                @csrf
                <label for="remember_password" c>Digite seu e-mail:</label>
                <input type="text" class="form-control" name="remember_password" id="remember_password">
              </form>
            </div>
            <div class="modal-footer">
              <button class="btn btn-primary" data-bs-target="#exampleModalToggle2" data-bs-toggle="modal">Open second modal</button>
            </div>
          </div>
        </div>
      </div>
      <div class="modal fade" id="exampleModalToggle2" aria-hidden="true" aria-labelledby="exampleModalToggleLabel2" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered">
          <div class="modal-content">
            <div class="modal-header">
              <h1 class="modal-title fs-5" id="exampleModalToggleLabel2">Modal 2</h1>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
              Hide this modal and show the first with the button below.
            </div>
            <div class="modal-footer">
              <button class="btn btn-primary" data-bs-target="#exampleModalToggle" data-bs-toggle="modal">Back to first</button>
            </div>
          </div>
        </div>
      </div>
</div>