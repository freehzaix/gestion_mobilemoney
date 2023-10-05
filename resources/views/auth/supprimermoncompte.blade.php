@extends('layouts.admin')

@section('titlePage')
    Supprimer mon compte
@endsection

@section('contenu')

<div class="row">
    <div class="col-lg-7">
    <h4>
       Êtes-vous sûr de vouloir supprimer votre compte ? <hr />
    </h4>
    <p>
        <a href="#" class="btn btn-danger mr-3 ml-3">Oui, je veux supprimer</a>
        <a href="{{ route('monprofil') }}" class="btn btn-primary ml-3">Non, je veux annuler</a>
    </p>
    <p>
        <b>NB:</b> Cette action ne pourra plus jamais être annuler si vous confirmer la suppression.
    </p>
    </div>
    <!-- /.col-md-6 -->
    <div class="col-lg-5">
    
    </div>
    <!-- /.col-md-6 -->
</div>
<!-- /.row -->
@endsection