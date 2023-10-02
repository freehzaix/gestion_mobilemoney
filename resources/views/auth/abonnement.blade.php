@extends('layouts.admin')

@section('titlePage')
    Abonnement
@endsection

@section('contenu')
<div class="row">
    <div class="col-lg-6">
    <p>
        Salut <b>{{ Auth::user()->prenom }}</b> et bienvenu sur notre plateforme de gestion de 
        votre agence de transfert d'argent mobile money.
    </p>
    <p>
        Vous êtes en ce moment sur l'abonnement <b>{{ $abonnement->nom_abonnement }}</b>.
        <ul>
            <li>Date de début: {{ $abonnement->date_abonnement }}</li>
            <li>Tarif mensuel: {{ $abonnement->tarif_mensuel }} FCFA/mois</li>
            <li>Forfait: 
                @if($abonnement->nombre_jour == 0) 
                    illimité
                @else 
                    Exepire le {{ date($abonnement->date_abonnement, $abonnement->nombre_jour)  }}                @endif
            </li>
        </ul>
        <a href="#" class="btn btn-primary">Mettre à niveau</a>
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