<!DOCTYPE html>
<html lang="pt-br">
<head>
    <title>{{$data['title']}}</title>
</head>
<body>
    <h1>Este é um e-mail de teste</h1>
    
    <p>Olá, </p>

    <span>{{$data['body']}}</span>
    <br>
    <span><a href="{{$data['url']}}">{{$data['url']}}</a></span>
    
    <p>Obrigado!</p>
</body>
</html>