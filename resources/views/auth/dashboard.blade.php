@extends('layouts.admin')

@section('titlePage')
    Tableau de bord
@endsection

@section('contenu')
<div class="row">
    @php
        $ops = App\Models\Operateur::where('abonnement_id', Auth::user()->abonnement_id)->get();
        
    @endphp
    @foreach($ops as $item)
    <div class="col">
        
        <div class="row info-box">
            <div class="">
                <img src="./{{ $item->url_operateur }}" height="100px" alt="{{ $item->nom_operateur }}">
            </div>
            <div class="info-box-content">
                @php 
                    $cai = App\Models\Caisse::where('operateur_id', $item->id)->first();
                    if(isset($cai->montant_caisse)){
                        @endphp
                        <span class="info-box-text">{{ $cai->nom_caisse }}</span>
                        <span class="info-box-number">{{ $cai->montant_caisse }} FCFA</span>
                        @php
                    }
                @endphp 
            </div>
        </div>   
            
    </div>
    @endforeach
</div>
<div class="row mt-3">
    <div class="col-lg-6">
    <p>
        Bienvenue <b>{{ Auth::user()->prenom }} {{ Auth::user()->nom }}</b>, sur notre plateforme de gestion de 
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