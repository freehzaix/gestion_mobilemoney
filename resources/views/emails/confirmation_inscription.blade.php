<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>

    <p>
Bonjour <b>{{ $data['prenom'] }} {{ $data['nom'] }}</b>, votre inscription a bien été
effectué. <br />
Vous pouvez vous connecter avec votre adresse mail <a href="#" rel="noopener noreferrer">{{ $data['email'] }}</a>
et le mot de passe que vous avez défini lors de votre inscription sur notre plateforme de <a href="{{ route('login') }}">Gestion d'agence de transaction</a>.
</p>
</body>
</html>