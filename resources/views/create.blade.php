<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('../css/stile.css') }}">
    <title>Form - Eventi</title>

</head>

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

            <div class="form">
                <p class="title">Crea il tuo evento</p>
                <form action="/events" method="POST">
                    @csrf
                    <div class="input-event">
                        <input class="input-event" type="text" name="name" placeholder="Nome" required><br>
                    </div>
                    <div class="input-event">
                        <label>Inserisci la data per il tuo evento</label>
                        <input class="input-event" type="date" name="date" required><br>
                    </div>
                    <div class="input-event">
                        <input class="input-event" type="text" name="price" placeholder="Prezzo" required><br>
                    </div>
                    <div class="input-event">
                        <input class="input-event" type="text" name="city" placeholder="Città" required><br>
                    </div>
                    <div class="input-event">
                        <input class="input-event" type="text" name="address" placeholder="Via" required><br>
                    </div>
                    <div class="input-event">
                        <input class="input-event" type="text-area" name="description" placeholder="Descrizione" required><br>
                    </div>
                    <button class="button" type="submit">Invia modulo</button>
                </form>
            </div>
        </div>

    </div>

</body>

</html>