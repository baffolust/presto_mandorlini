<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fast Mando - Richiesta Revisore</title>
</head>

<body>

    <div>
        <h1>Un utente ha fatto richiesta per diventare revisore</h1>
        <h2>Dettaglio dei dati:</h2>
        <p>Nome: <em> {{ $user->name }} </em></p>
        <p>Email: <em> {{ $user->email }} </em></p>
        <p>Per renderlo revisore, clicca qui</p>
        <a href="{{ route('revisor.make-revisor', compact('user')) }}">Rendi revisore</a>
    </div>

</body>

</html>
