@extends('layouts.app')
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('../css/stile.css') }}">
    <title>Document</title>
</head>


<body>
@section('content')
    <div class="container">
        <div class="card">
            <div class="list-event">
                <h1>Dettagli Prodotto</h1>

                <a href="{{ route('products.index', ['eventId' => $event->id]) }}">Torna ai prodotti</a>
                <div>
                    <p>Nome del Prodotto: {{ $product->title }}</p>
                    <p>Prezzo: {{ $product->price }}</p>
                    <p>Materiale: {{ $product->materials }}</p>
                    <p>Peso: {{ $product->weight }}</p>
                    <p>Descrizione: {{ $product->description }}</p>
                </div>
                <a href="{{ route('products.edit', ['eventId' => $event->id, 'productId' => $product->id]) }}" class="btn">Modifica Prodotto</a>
            </div>
        </div>
    </div>
@endsection
</body>

</html>