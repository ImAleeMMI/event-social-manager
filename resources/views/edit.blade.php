@extends('layouts.app')
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('../css/stile.css') }}">
    <title>Edit - Eventi</title>

</head>

<body>
@section('content')
    <div class="container">
        <div class="card" style="background: #fff; padding:20px 10px;">
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
            <form class="row g-3" action="{{ route('update' , ['id' => $event->id]) }}" method="POST">
                @csrf
                <div class="col-md-10">
                    <label for="">Nome</label>
                    <input class="form-control" type="text" name="name" value="{{ old('name' , $event->name) }}" required>
                </div>
                <div class="col-md-2">
                    <label for="">Prezzo</label>
                    <input class="form-control" type="number" name="price" value="{{ old('price' , $event->price) }}" required>
                </div>
                <div class="mb3">
                    <label for="">Via</label>
                    <input class="form-control" type="text" name="address" value="{{ old('address' , $event->address) }}" required>
                </div>

                <div class="col-md-9">
                    <label for="">Città</label>
                    <input class="form-control" type="text" name="city" value="{{ old('city' , $event->city) }}" required>
                </div>
                <div class="col-md-3">
                    <label for="">Data</label>
                    <input class="form-control" type="date" name="date" value="{{ old('date' , $event->date) }}" required>
                </div>
                <div class="col-md-12">
                    <label for="">Descrizione</label>
                    <textarea class="form-control" type="text" name="description" value="{{ old('description' , $event->description) }}" required></textarea>
                </div>
                <div>
                    <button class="btn btn-primary" type="submit">Aggiorna Evento</button>
                </div>
            </form>
            <form action="{{ route('index') }}" method="POST">
                @csrf
                <button type="submit" class="btn">Eventi</button>
            </form>
        </div>
    </div>
@endsection
 
</body>

</html>