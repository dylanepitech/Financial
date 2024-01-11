<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Confirmation d'inscription</title>
</head>

<body>
    <p>Bienvenue, {{ $user->name }}!</p>
    <p>Merci de vous être inscrit. Veuillez confirmer votre adresse e-mail en cliquant sur le lien ci-dessous :</p>
    <h3 style="color: red;">Votre code <span style="text-decoration:underline">{{$code}}</span></h3>
    <a href="{{ route('Connexion',['user'=>$user])}}">Confirmer
        l'adresse e-mail</a>
</body>

</html>