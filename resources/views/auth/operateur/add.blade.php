@extends('layouts.admin')

@section('titlePage')
    Ajouter un opérateur
@endsection

@section('contenu')

<div class="row mt-3">
    <div class="col-lg-8">
        <form action="{{ route('operateur.add.post') }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="nom_operateur">Nom de l'opérateur</label>
                <input type="text" id="nom_operateur" name="nom_operateur" class="form-control" required />
            </div>
            <div class="form-group">
                <label for="url_operateur">Choisir une image de logo</label>
                <input type="file" id="url_operateur" name="url_operateur" class="form-control" required />
            </div> 
            <br>
            <div class="form-group">
                <input type="submit" class="btn btn-primary" value="Ajouter l'opérateur">
            </div>
            <br />
        </form>
    </div>

    <div class="col-lg-4">
      
    </div>

</div>
<!-- /.row -->    

<div class="row">
    <h5><a class="text text-primary" href="{{ route('operateur.index') }}">Liste des opérateurs réseaux</a></h5>
</div>
@endsection