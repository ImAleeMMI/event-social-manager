@extends('layouts.app')

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Creazione - Prodotti</title>
    <link rel="stylesheet" href="{{ asset('../css/stile.css') }}">
</head>

<body>
    @section('content')
    <div class="container">
        <div class="card">
            <div class="title">
                <p>Crea un nuovo Prodotto per l'Evento: {{ $event->name }}</p>
            </div>
            <form class="form" method="POST" action="{{ route('products.store', ['id' => $event->id]) }}">
                @csrf

                <div class="input-event">
                    <label for="title">Titolo del Prodotto:</label>
                    <input type="text" name="title" class="form-control" style="background: white;" required>
                </div>

                <div class="input-event">
                    <label for="price">Prezzo:</label>
                    <input type="number" name="price" class="form-control" style="background: white;" required>
                </div>

                <div class="input-event">
                    <label for="price">Materiale:</label>
                    <input type="text" name="materials" class="form-control" style="background: white;" required>
                </div>

                <div class="input-event">
                    <label for="price">Peso:</label>
                    <input type="text" name="weight" class="form-control" style="background: white;" required>
                </div>

                <div class="input-event">
                    <label for="price">Descrizione:</label>
                    <textarea type="text" name="description" class="form-control" style="background: white;" required></textarea>
                </div>

                <div>
                    <button type="submit" class="btn btn-info">Crea Prodotto</button>
                    <a class="btn btn-light" href="{{ route('show', ['id' => $event->id]) }}">Torna ai dettagli dell'evento</a>
                </div>
            </form>
        </div>
    </div>
    @endsection
</body>

</html>