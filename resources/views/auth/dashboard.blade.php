@extends('layouts.admin')

@section('titlePage')
    Tableau de bord
@endsection

@section('contenu')
<div class="row">
    <div class="col-lg-6">
    <p>
        Bienvenue {{ Auth::user()->prenom }}, sur notre plateforme de gestion de 
        votre agence de transfert d'argent mobile money.
    </p>
    </div>
    <!-- /.col-md-6 -->
    <div class="col-lg-6">

    <!-- /.card -->


    </div>
    <!-- /.col-md-6 -->
</div>
<!-- /.row -->
@endsection