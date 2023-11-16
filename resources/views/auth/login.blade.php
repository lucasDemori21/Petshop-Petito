<h1>Login</h1>

<form action="{{ route('auth.login') }}" method="POST">
    @csrf()
    <label for="login">Usuário:</label>
    <input type="text" id='login' name="login" placeholder="Login">
    <label for="senha">Senha:</label>
    <input type="password" name="senha" id="senha" placeholder="********">
    <button type="submit">Entrar</button>
</form>
