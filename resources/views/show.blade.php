@extends('layouts.app')
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('../css/stile.css') }}">
    <title>Dettagli evento</title>
</head>

<body>
@section('content')
    <div class="container text-center">
        <div class="card" style="background: white;">
            <div class="row">
                <div class="col-sm-5 col-md-6">
                    <p class="title">Dettagli dell'evento</p>
                    <p>Nome: {{ $event->name }}</p>
                    <p>Data: {{ $event->date }}</p>
                    <p>Prezzo: {{ $event->price }}</p>
                    <p>Città: {{ $event->city }}</p>
                    <p>Via: {{ $event->address }}</p>
                    <p>Descrizione: {{ $event->description }}</p>
                    <div>
                        <a href="{{ route('edit', ['id' => $event->id]) }}" class="btn btn-warning">Modifica</a>
                        <br>
                        <form action="{{ route('destroy', ['id' => $event->id]) }}" method="POST">
                            @csrf
                            <button type="submit" class="btn btn-danger">Elimina</button>
                        </form>
                    </div>
                </div>
                <div class="col-sm-5 offset-sm-2 col-md-6 offset-md-0">
                    <div class="title">
                        <p>Prodotti relativi all'evento </p>
                    </div>
                    <div>
                        @foreach ($event->products as $product)
                        <div>
                            {{ $product->title }}
                            {{ $product->price }}
                            <div>
                                <a href="{{ route('products.show', ['eventId' => $event->id, 'productId' => $product->id]) }}">Visualizza</a>
                                <a href="{{ route('products.edit', ['eventId' => $event->id, 'productId' => $product->id]) }}">Modifica</a>
                            </div>
                        </div>
                        @endforeach
                        <div>
                        </div>
                    </div>
                    <a href="{{ route('products.create', ['id' => $event->id]) }}" class="btn btn-light">Crea nuovo Prodotto</a>
                </div>
                <div class="">
                    <div class="title">Utenti Iscritti</div>
                    <div>
                        @if(!empty($users)) 
                            @foreach($users as $user)
                            <div>
                                {{ $user->name }}
                            </div>
                            @endforeach
                        
                            @else 
                            <p>non ci sono ancora iscritti</p>
                        
                      @endif
                    </div>
                </div>
                
            </div>
            <div class="d-grid gap-2 d-md-block">
                @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
                @endif
                @if (empty($event->users->firstWhere('id', Auth::user()->id)))
                <form action="{{ route('subscription', ['id' => $event->id]) }}" method="POST">
                    @csrf
                    <button type="submit" class="btn btn-primary">Iscrivi all'evento</button>
                </form>
                @else
                <div>Sei già iscritto</div>
                
                <form action="{{ route('unsubscription', ['id' => $event->id]) }}" method="POST">
                    @csrf
                    <button type="submit" class="btn btn-warning"> Disiscriviti</button>
                </form>
                @endif
            </div>
            <div class="d-grid gap-2 d-md-block">
                <a href="{{ route('index') }}" class="btn btn-info">Torna agli Eventi</a>
                
            </div>
        </div>
    </div>
@endsection
</body>

</html>