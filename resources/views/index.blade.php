<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('../css/stile.css') }}">
    <title>Lista Eventi</title>
</head>

<header>
    <div class="header">
        <a href="#" class="logo">Logo Eventi</a>
        <div class="header-right">
            <a class="active" href="#home">Home</a>
            <a href="#contact">Servizi</a>
            <a href="#about">Chi siamo</a>
            <a href="#about">Contatti</a>
        </div>
    </div>
</header>

<body>
    <div class="container">
        <div class="title">Lista degli eventi</div>
        <div class="list-event">
            <ul>
                @foreach($events as $event)
                <li>
                    <a class="event-name" href="{{ route('show', ['id' => $event->id]) }}">
                        {{ $event->name }}
                    </a>
                </li>
                @endforeach
            </ul>
            <div class="link">
                <a href="{{ route('create') }}">Crea nuovo evento</a>
            </div>
        </div>
    </div>
</body>

</html>