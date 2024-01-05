<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Melhores jogos para o Halloweem</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f4f4f4;
            text-align: left;
            padding: 20px;
        }

        h1 {
            color: #333;
        }

        p {
            color: #666;
        }
    </style>
</head>

<body>
    <h1>Jogos de Halloween</h1>

    @foreach ($searchProducts as $product)
        <div>
            <h2>{{ $product->name }}</h2>
            <p><img>{{ $product->cover }}</img></p>
            <p><strong>Preço:</strong> R${{ $product->price }}</p>
            <p><strong>Descrição:</strong> {{ $product->description }}</p>
        </div>
        <hr>
    @endforeach

    <p>Aproveite esses jogos temáticos de terror! Feliz Halloween!</p>
</body>

</html>

</html>
