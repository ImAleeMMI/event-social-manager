@extends('layouts.app')
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('../css/stile.css') }}">
    <title>Lista Eventi</title>
</head>


<body>
    @section('content')
    <div class="container">
        <div class="text-center fs-2 title">Lista degli eventi</div>
    </div>
    <div class="link">
        <a href="{{ route('create') }}" class="btn btn-primary">Crea nuovo evento</a>
    </div>
    
    <div class="container justify-content-evently flex-wrap d-flex flex-row text-center">
        @foreach($events as $event)
        <div class="card" style="background: white;margin:20px;">
            <div class="card-body">
                
                
                <h5 class="card-title">{{ $event->name  }}</h5>
                <a href="{{ route('show', ['id' => $event->id]) }}" class="btn btn-light">Visualizza</a>
                
            </div>
        </div>
        @endforeach
    </div>
    @endsection
</body>

</html>

<style>
    .card {
        width: 15%;
        padding: 20px 10px;
    }
    .title{
        color: #fff;
    }
</style>