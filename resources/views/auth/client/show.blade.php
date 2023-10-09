@extends('layouts.admin')

@section('titlePage')
    Modifier la caisse
@endsection

@section('contenu')

<div class="row mt-3">
    <div class="col-lg-8">
        <form action="{{ route('client.update') }}" method="post">
            @csrf
            <input type="text" name="id" value="{{ $client->id }}" style="display: none;">
            <div class="form-group">
                @error('telephone')
                    <div class="btn btn-danger"> {{ $message }} </div>  
                @enderror
                <label for="telephone">Numéro de téléphone</label>
                <input type="text" id="telephone" name="telephone" value="{{ $client->telephone }}" class="form-control" />
            </div>

            <div class="form-group">
                @error('nom')
                    <div class="btn btn-danger"> {{ $message }} </div>  
                @enderror
                <label for="nom">Nom</label>
                <input type="text" id="nom" name="nom" value="{{ $client->nom }}" class="form-control" />
            </div>

            <div class="form-group">
                @error('prenom')
                    <div class="btn btn-danger"> {{ $message }} </div>  
                @enderror
                <label for="prenom">Prénom</label>
                <input type="text" id="prenom" name="prenom" value="{{ $client->prenom }}" class="form-control" />
            </div>

            <div class="form-group">
                @error('adresse')
                    <div class="btn btn-danger"> {{ $message }} </div>  
                @enderror
                <label for="adresse">Adresse</label>
                <input type="text" id="adresse" name="adresse" value="{{ $client->adresse }}" class="form-control" />
            </div>

            <div class="form-group">
                @error('ville')
                    <div class="btn btn-danger"> {{ $message }} </div>  
                @enderror
                <label for="ville">Ville</label>
                <input type="text" id="ville" name="ville" value="{{ $client->ville }}" class="form-control" />
            </div>

            <div class="form-group">
                @error('pays')
                    <div class="btn btn-danger"> {{ $message }} </div>  
                @enderror
                <label for="pays">Pays</label>
                <input type="text" id="pays" name="pays" value="{{ $client->pays }}" class="form-control" />
            </div>
            
            <div class="form-group">
                <input type="submit" class="btn btn-primary" value="Modifier le client">
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