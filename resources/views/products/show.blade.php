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
        <div class="card text-center" style="background: #fff;">
            <div class="list-event">
                <h1 class="title">Dettagli Prodotto</h1>
                <div>
                    <p>Nome del Prodotto: {{ $product->title }}</p>
                    <p>Prezzo: {{ $product->price }}</p>
                    <p>Materiale: {{ $product->materials }}</p>
                    <p>Peso: {{ $product->weight }}</p>
                    <p>Descrizione: {{ $product->description }}</p>
                </div>
                <div>
                    <a href="{{ route('products.edit', ['eventId' => $event->id, 'productId' => $product->id]) }}" class="btn btn-primary">Modifica Prodotto</a>
                    <a href="{{ route('products.index', ['eventId' => $event->id]) }}" class="btn btn-light">Torna ai prodotti</a>
                </div>
                
            </div>
        </div>
    </div>
@endsection
</body>

</html>