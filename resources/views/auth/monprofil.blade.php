@extends('layouts.admin')

@section('titlePage')
    Mon profil
@endsection

@section('contenu')
<div class="row">
    @if (session('status'))
        <div class="alert alert-success">{{ session('status') }}</div>
    @endif
</div>
<div class="row">
    <div class="col-lg-6">
    <p>
        <form action="{{ route('monprofil') }}" method="post">
            @csrf
            <div class="form-group">
                <label for="nom">Nom</label>
                <input type="text" id="nom" name="nom" class="form-control" value="{{ Auth::user()->nom }}" />
            </div>
            <div class="form-group">
                <label for="prenom">Prénom</label>
                <input type="text" id="prenom" name="prenom" class="form-control" value="{{ Auth::user()->prenom }}" />
            </div>
            <div class="form-group">
                <label for="inputEmail">E-Mail</label>
                <input type="email" id="inputEmail" name="email" class="form-control" disabled value="{{ Auth::user()->email }}" />
            </div>
            <div class="form-group">
                <label for="telephone">Téléphone</label>
                <input type="text" id="telephone" name="telephone" class="form-control" value="{{ Auth::user()->telephone }}" />
            </div>
            <div class="form-group">
                <label for="adresse">Adresse géographique</label>
                <input type="text" id="adresse" name="adresse" class="form-control" value="{{ Auth::user()->adresse }}" />
            </div>
            <div class="form-group">
                <label for="ville">Ville</label>
                <input type="text" id="ville" name="ville" class="form-control" value="{{ Auth::user()->ville }}" />
            </div>
            <div class="form-group">
                <label for="pays">Pays</label>
                <input type="text" id="pays" name="pays" class="form-control" value="{{ Auth::user()->pays }}" />
            </div>
            <br />
            <div class="row">
                <div class="col">
                    <div class="form-group">
                        <input type="submit" class="btn btn-primary" value="Modifier mon profil">
                    </div>
                </div>
                <div class="">
                    <div class="form-group">
                        <a href="{{ route('supprimermoncompte') }}" class="btn btn-danger">Supprimer mon compte</a>
                    </div>
                </div>
            </div>
            <br />
            <br />
        </form>
    </p>
    </div>
    <div class="col-lg-1"></div>
    <!-- /.col-md-6 -->
    <div class="col-lg-5">
  
        <div class="row">
            
            <form action="#" method="post">
                <h3>Changez l'image de profil</h3>
                <div class="form-group">
                    <label for="image_profil">Choisir une nouvelle image</label>
                    <input type="file" id="image_profil" class="form-control" />
                </div>  
                <div class="form-group">
                    <input type="submit" class="btn btn-primary" value="Changez l'image de profil">
                </div>
                <br />
            </form>
        </div>

        <div class="row">
            
            <form action="#" method="post">
                <h3>Changez votre mot de passe</h3>
                <div class="form-group">
                    <label for="new_password">Nouveau mot de passe</label>
                    <input type="text" id="new_password" class="form-control" />
                </div>
                <div class="form-group">
                    <label for="re_password">Re-tapez le mot de passe</label>
                    <input type="text" id="re_password" class="form-control" />
                </div>
                
                <div class="form-group">
                    <input type="submit" class="btn btn-primary" value="Changez le mot de passe">
                </div>
                <br />
            </form>
        </div>
    
    </div>
    <!-- /.col-md-6 -->
</div>
<!-- /.row -->
@endsection