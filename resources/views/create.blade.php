@extends('layouts.app')
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('../css/stile.css') }}">
    <title>Form - Eventi</title>

</head>
@section('content')

<body>
    <div class="image"></div>
    <div class="container">
        <div class="list-event">
            @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>1
            @endif

            <div class="card">
                <p class="title">Crea il tuo evento</p>
                <form class="row g-3" action="/events" method="POST">
                    @csrf
                    <div class="col-md-10">
                        <label>Nome</label>
                        <input class="form-control" type="text" name="name" required>
                    </div>
                    <div class="input-group mb-2">
                        <label>Prezzo</label>
                        <input class="form-control" type="text" name="price" required>
                        <span class="input-group-text">$</span>
                    </div>
                    <div class="col-md-12">
                        <label>Via</label>
                        <input class="form-control" type="text" name="address" required>
                    </div>
                    <div class="col-md-9">
                        <label>Città</label>
                        <input class="form-control" type="text" name="city" required>
                    </div>
                    <div class="col-md-3">
                        <label>Data</label>
                        <input class="form-control" type="date" name="date" required>
                    </div>
                    <div class="col-12">
                        <label>Descrizione</label>
                        <textarea class="form-control" type="text-area" name="description" required></textarea>
                    </div>
                    <div class="col-12">
                        <button class="btn btn-info" type="submit">Invia modulo</button>
                    </div>

                </form>
            </div>

        </div>

    </div>
    @endsection
</body>

</html>