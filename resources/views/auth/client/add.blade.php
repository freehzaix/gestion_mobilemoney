@extends('layouts.admin')

@section('titlePage')
    Ajouter un client
@endsection

@section('contenu')

<div class="row mt-3">
    <div class="col-lg-8">
        <form action="{{ route('client.add.post') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="telephone">Numéro de téléphone</label>
                <input type="text" id="telephone" name="telephone" class="form-control" required />
            </div>
            <div class="form-group">
                <label for="nom">Nom</label>
                <input type="text" id="nom" name="nom" class="form-control" />
            </div>
            <div class="form-group">
                <label for="prenom">Prénom</label>
                <input type="text" id="prenom" name="prenom" class="form-control" />
            </div>
            <div class="form-group">
                <label for="adresse">Adresse</label>
                <input type="text" id="adresse" name="adresse" class="form-control" />
            </div>
            <div class="form-group">
                <label for="ville">Ville</label>
                <input type="text" id="ville" name="ville" class="form-control" />
            </div>
            <div class="form-group">
                <label for="pays">Pays</label>
                <input type="text" id="pays" name="pays" class="form-control" />
            </div>
            <br>
            <div class="form-group">
                <input type="submit" class="btn btn-primary" value="Ajouter le client">
            </div>
            <br />
        </form>
    </div>

    <div class="col-lg-4">
      
    </div>

</div>
<!-- /.row -->    

<div class="row">
    <h5><a class="text text-primary" href="{{ route('client.index') }}">Liste des clients</a></h5>
</div>
@endsection