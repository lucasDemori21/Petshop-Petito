<h1>Login</h1>

<form action="{{ route('auth.login') }}" method="POST">
    @csrf()
    <label for="login">Usuário:</label>
    <input type="email" id='email' name="email" placeholder="email">
    <label for="senha">Senha:</label>
    <input type="password" name="password" id="senha" placeholder="********">
    <button type="submit">Entrar</button>
    @if($errors->any())
    <span>
        {{ $errors->first() }}
    </span>
    @endif
    @if(session('success'))
    <span>
        {{ session('success') }}
    </span>
@endif
</form>
