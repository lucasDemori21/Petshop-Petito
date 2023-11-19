<h1>Login</h1>

<form action="{{ route('auth.login') }}" method="POST">
    @csrf()
    <label for="email">Usuário:</label>
    <input type="email" id='email' name="email" placeholder="email">
    <label for="senha">Senha:</label>
    <input type="password" name="senha" id="senha" placeholder="********">
    <button type="submit">Entrar</button>

    @if (session('success'))
        <span>
            {{ session('success') }}
        </span>
    @endif

    @if (session('error'))
        <span>
            {{ session('error') }}
        </span>
    @endif

</form>
