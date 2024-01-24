<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('../css/stile.css') }}">
    <title>Document</title>

</head>

<body>
    <div class="container">
        <div class="list-event">
            <h1>Modifica Prodotto</h1>

            <a href="{{ route('products.show', ['eventId' => $event->id, 'productId' => $product->id]) }}">Torna ai dettagli del prodotto</a>

            <form method="POST" action="{{ route('products.update', ['eventId' => $event->id, 'productId' => $product->id]) }}">
                @csrf

                <div class="input-event">
                    <label for="title">Titolo del Prodotto:</label>
                    <input class="input-event" type="text" name="title" class="form-control" value="{{ $product->title }}" required>
                </div>

                <div class="input-event">
                    <label for="price">Prezzo:</label>
                    <input class="input-event" type="number" name="price" class="form-control" value="{{ $product->price }}" required>
                </div>

                <div class="input-event">
                    <label for="price">Materials:</label>
                    <input class="input-event" type="text" name="materials" class="form-control" value="{{ $product->materials }}" required>
                </div>
                <div class="input-event">
                    <label for="price">Peso:</label>
                    <input class="input-event" type="text" name="weight" class="form-control" value="{{ $product->weight }}" required>
                </div>
                <div class="input-event">
                    <label for="price">Descrizione:</label>
                    <input class="input-event" type="text" name="description" class="form-control" value="{{ $product->description }}" required>
                </div>

                <button type="submit" class="btn">Aggiorna Prodotto</button>
            </form>
        </div>

    </div>
</body>

</html>