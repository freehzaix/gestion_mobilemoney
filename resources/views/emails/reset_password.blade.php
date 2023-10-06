<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>
    <p>
        Bonjour <b>{{ $data['prenom'] }} {{ $data['nom'] }}</b>, votre mot de passe bien été modifié.
    </p>
    <p>
        Vous pouvez vous connecter avec votre adresse mail et le nouveau mot de passe en cliquant sur ce lien <a href="{{ route('login') }}">{{ route('login') }}</a>.
    </p>
    <p>
        Merci de votre compréhension !
    </p>
</body>
</html>