@extends('layouts.front')

@section('pageTitre')
  Inscription gratuite - 
@endsection

@section('contenu')
<div class="container">
  <div class="row mt-3">
    <div class="col">
        
    </div>
    <div class="col">
        @if (session('status'))
            <div class="alert alert-success">{{ session('status') }}</div>
        @endif
        <form action="{{ route('signup_free_post') }}" method="post">
            @csrf
            <div class="form-group">
                <h1>Inscription gratuite</h1>
            </div>
            <div class="form-group mt-3">
                <label for="email">Adresse mail</label>
                <input type="email" value="{{ old('email') }}" name="email" class="form-control @error('email') is-invalid @enderror" id="email" aria-describedby="email" placeholder="exemple@mail.com">
                @error('email')
                    <small class="text text-danger">{{ $message }}</small>
                @enderror
            </div>
            <div class="form-group mt-1">
                <label for="password">Mot de passe</label>
                <input type="password" name="password" class="form-control @error('password') is-invalid @enderror" id="password" placeholder="Mot de passe">
                @error('password')
                    <small class="text text-danger">{{ $message }}</small>
                @enderror
            </div>
            <div class="form-group mt-1">
                <label for="nom">Nom</label>
                <input type="text" value="{{ old('nom') }}" name="nom" class="form-control @error('nom') is-invalid @enderror" id="nom" placeholder="Entrez votre nom">
                @error('nom')
                    <small class="text text-danger">{{ $message }}</small>
                @enderror
            </div>
            <div class="form-group mt-1">
                <label for="prenom">Prénom</label>
                <input type="text" value="{{ old('prenom') }}" name="prenom" class="form-control @error('prenom') is-invalid @enderror" id="prenom" placeholder="Entrez votre prénom">
                @error('prenom')
                    <small class="text text-danger">{{ $message }}</small>
                @enderror
            </div>
            <button type="submit" class="btn btn-primary mt-3">S'inscrire maintenant</button>
        </form>
    </div>
  </div>
</div>
@endsection