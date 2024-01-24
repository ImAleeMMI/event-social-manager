<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Creazione - Prodotti</title>
    <link rel="stylesheet" href="{{ asset('../css/stile.css') }}">
</head>

<body>
    <div class="container">
        <div class="list-event">
            <div class="title">
                <p>Crea un nuovo Prodotto per l'Evento: {{ $event->name }}</p>
            </div>


            <a href="{{ route('show', ['id' => $event->id]) }}">Torna ai dettagli dell'evento</a>

            <form method="POST" action="{{ route('products.store', ['id' => $event->id]) }}">
                @csrf

                <div class="input-event">
                    <label for="title">Titolo del Prodotto:</label>
                    <input type="text" name="title" class="form-control" required>
                </div>

                <div class="input-event">
                    <label for="price">Prezzo:</label>
                    <input type="number" name="price" class="form-control" required>
                </div>

                <div class="input-event">
                    <label for="price">Materiale:</label>
                    <input type="text" name="materials" class="form-control" required>
                </div>

                <div class="input-event">
                    <label for="price">Peso:</label>
                    <input type="text" name="weight" class="form-control" required>
                </div>

                <div class="input-event">
                    <label for="price">Descrizione:</label>
                    <input type="text" name="description" class="form-control" required>
                </div>

                <button type="submit" class="btn">Crea Prodotto</button>
            </form>
        </div>

    </div>
</body>

</html>