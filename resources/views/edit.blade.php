<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('../css/stile.css') }}">
    <title>Edit - Eventi</title>

</head>

<header>

</header>

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
            <h1 class="title">Modificare Evento</h1>
            <form action="{{ route('update' , ['id' => $event->id]) }}" method="POST">
                @csrf
                <label for="">Nome</label>
                <input type="text" name="name" value="{{ old('name' , $event->name) }}" required>
                <br>
                <label for="">Data</label>
                <input type="date" name="date" value="{{ old('date' , $event->date) }}" required>
                <br>
                <label for="">Prezzo</label>
                <input type="text" name="price" value="{{ old('price' , $event->price) }}" required>
                <br>
                <label for="">Città</label>
                <input type="text" name="city" value="{{ old('city' , $event->city) }}" required>
                <br>
                <label for="">Via</label>
                <input type="text" name="address" value="{{ old('address' , $event->address) }}" required>
                <br>
                <label for="">Descrizione</label>
                <input type="text" name="description" value="{{ old('description' , $event->description) }}" required>
                <br>
                <button type="submit">Aggiorna Evento</button>
            </form>
            <p><a href="{{ route('index') }}">Eventi</p>
        </div>

    </div>
</body>

<footer>

</footer>

</html>