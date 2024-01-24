<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('../css/stile.css') }}">
    <title>Dettagli evento</title>
</head>

<body>

    <div class="container">
        <div class="list-event">
            @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif

            <div class="event">
                <p class="title">Dettagli dell'evento</p>
                <p>Nome: {{ $event->name }}</p>
                <p>Data: {{ $event->date }}</p>
                <p>Prezzo: {{ $event->price }}</p>
                <p>Città: {{ $event->city }}</p>
                <p>Via: {{ $event->address }}</p>
                <p>Descrizione: {{ $event->description }}</p>
            </div>

            <p>
                <a href="{{ route('edit', ['id' => $event->id]) }}">Modifica</a>
                <br>
            <form action="{{ route('destroy', ['id' => $event->id]) }}" method="POST">
                @csrf
                <button type="submit">Elimina</button>
            </form>
            </p>

            <div class="product">
                <div class="title">
                    <p>Prodotti relativi all'evento </p>
                </div>
                <ul>
                    @foreach ($event->products as $product)
                    <li>
                        {{ $product->title }}
                        {{ $product->price }}
                        <div>
                            <a href="{{ route('products.show', ['eventId' => $event->id, 'productId' => $product->id]) }}">Visualizza</a>
                            <a href="{{ route('products.edit', ['eventId' => $event->id, 'productId' => $product->id]) }}">Modifica</a>
                        </div>
                    </li>
                    @endforeach
                </ul>
            </div>

            <div>
                <a href="{{ route('products.create', ['id' => $event->id]) }}">Crea nuovo Prodotto</a>
            </div>

            <div>
                <a href="{{ route('index') }}">Torna agli Eventi</a>
            </div>
        </div>


    </div>
</body>

</html>