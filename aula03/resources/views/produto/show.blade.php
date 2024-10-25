<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Produto</title>
</head>
<body>
    @if($produto)
        <h1>Produto</h1>
        <h2>{{$produto->nome}}</h2>
        <p>{{$produto->descricao}}</p>
        <ul>
            <li><b>Preco:</b>{{$produto->preco}}</li>
            <li><b>Qtd:</b>{{$produto->qtd_estoque}}</li>
            <li><b>Origem:</b>{{$produto->importado?'Importado':'Nacional'}}</li>
        </ul>
    @else
        <p>Produto não  encontrado</p>
    @endif
    <a href="/produtos">Voltar</a>
</body>
</html>
