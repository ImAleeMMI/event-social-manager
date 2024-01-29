@extends('layouts.app')

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('../css/stile.css') }}">
    <title>Document</title>

</head>
@section('content')

<body>
    <div class="container">
        <div class="card text-center" style="background: #fff;">
            <h1>Modifica Prodotto</h1>

            

            <form class="row g-3" method="POST" action="{{ route('products.update', ['eventId' => $event->id, 'productId' => $product->id]) }}">
                @csrf

                <div class="col-md-10">
                    <label for="title">Titolo del Prodotto:</label>
                    <input class="form-control" type="text" name="title" class="form-control" value="{{ $product->title }}" required>
                </div>

                <div class="col-md-2">
                    <label for="price">Prezzo:</label>
                    <input class="form-control" type="number" name="price" class="form-control" value="{{ $product->price }}" required>
                </div>

                <div class="col-md-6">
                    <label for="materials">Materials:</label>
                    <input class="form-control" type="text" name="materials" class="form-control" value="{{ $product->materials }}" required>
                </div>
                <div class="col-md-6">
                    <label for="weight">Peso:</label>
                    <input class="form-control" type="text" name="weight" class="form-control" value="{{ $product->weight }}" required>
                </div>
                <div class="col-md-12">
                    <label for="description">Descrizione:</label>
                    <input class="form-control" type="text" name="description" class="form-control" value="{{ $product->description }}" required>
                </div>
                
                <div>
                    <button type="submit" class="btn btn-primary">Aggiorna Prodotto</button>
                    <a class="btn btn-warning" href="{{ route('products.show', ['eventId' => $event->id, 'productId' => $product->id]) }}">Torna ai dettagli del prodotto</a>
                </div>
                
            </form>
        </div>


    </div>
    @endsection
</body>

</html>