@extends('layouts.front')

@section('pageTitre')
  Tarif - 
@endsection

@section('contenu')
<div class="container">
  <div class="row row-cols-1 row-cols-md-3 mb-3 text-center">
    <div class="col">
      <div class="card mb-4 rounded-3 shadow-sm">
        <div class="card-header py-3">
          <h4 class="my-0 fw-normal">Gratuit</h4>
        </div>
        <div class="card-body">
          <h1 class="card-title pricing-card-title">0 fcfa<small class="text-muted fw-light">/mois</small></h1>
          <ul class="list-unstyled mt-3 mb-4">
            <li>Un utilisateur</li>
            <li>Un opérateur</li>
            <li>Aucun support</li>
            <li>Accès à vie</li>
            <li><br /></li>
          </ul>
          <a href="{{ route('signup_free') }}" class="w-100 btn btn-lg btn-outline-primary">S'inscrire gratuitement</a>
        </div>
      </div>
    </div>
    <div class="col">
      <div class="card mb-4 rounded-3 shadow-sm">
        <div class="card-header py-3">
          <h4 class="my-0 fw-normal">Professionnel</h4>
        </div>
        <div class="card-body">
          <h1 class="card-title pricing-card-title">15'000 fcfa<small class="text-muted fw-light">/mois</small></h1>
          <ul class="list-unstyled mt-3 mb-4">
            <li>5 utilisateurs</li>
            <li>3 opérateurs</li>
            <li>Support technique</li>
          </ul>
          <button type="button" class="w-100 btn btn-lg btn-primary">Démarrer maintenant</button>
        </div>
      </div>
    </div>
    <div class="col">
      <div class="card mb-4 rounded-3 shadow-sm border-primary">
        <div class="card-header py-3 text-white bg-primary border-primary">
          <h4 class="my-0 fw-normal">Enterprise</h4>
        </div>
        <div class="card-body">
          <h1 class="card-title pricing-card-title">50'000 fcfa<small class="text-muted fw-light">/mois</small></h1>
          <ul class="list-unstyled mt-3 mb-4">
            <li>25 utilisateurs</li>
            <li>Tous opérateurs disponible</li>
            <li>Support technique</li>
          </ul>
          <button type="button" class="w-100 btn btn-lg btn-primary">Nous contacter</button>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection