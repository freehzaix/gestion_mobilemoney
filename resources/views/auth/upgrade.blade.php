@extends('layouts.admin')

@section('titlePage')
    Mise à niveau
@endsection

@section('contenu')

<div class="row ml-3 mr-3">
    <h5>
        Ne laissez pas votre potentiel inexploité. Optez pour notre forfait Particulier, Professionnel ou Entreprise et débloquez une réussite sans limites. Agissez maintenant pour transformer vos ambitions en réalité !
    </h5>
</div>

<div class="row">
    <div class="col-lg-12">
        
        <div class="row text-center">

            <div class="col">
                <div class="card mb-4 rounded-3 shadow-sm">
                  <div class="card-header py-3">
                    <h4 class="my-0 fw-normal">Particulier</h4>
                  </div>
                  <div class="card-body">
                    <h1 class="btn btn-danger">5'000 fcfa<small class="fw-light">/mois</small></h1>
                    <ul class="list-unstyled mt-3 mb-4">
                      <li>{{ $permissions[1]->nombre_user }} utilisateurs</li>
                      <li>Orange, Moov et MTN money</li>
                      <li>Rapport PDF</li>
                      <li>Support technique</li>
                      <li>Accès 30 jours</li>
                    </ul>
                    <button type="button" class="w-100 btn btn-lg btn-primary">Démarrer maintenant</button>
                  </div>
                </div>
            </div>
            
            <div class="col">
                <div class="card mb-4 rounded-3 shadow-sm">
                  <div class="card-header py-3">
                    <h4 class="my-0 fw-normal">Professionnel</h4>
                  </div>
                  <div class="card-body">
                    <h1 class="btn btn-danger">15'000 fcfa<small class="fw-light">/mois</small></h1>
                    <ul class="list-unstyled mt-3 mb-4">
                      <li>{{ $permissions[2]->nombre_user }} utilisateurs</li>
                      <li>Orange, Moov et MTN money</li>
                      <li>Rapport PDF</li>
                      <li>Support technique</li>
                      <li>Accès 30 jours</li>
                    </ul>
                    <button type="button" class="w-100 btn btn-lg btn-primary">Démarrer maintenant</button>
                  </div>
                </div>
            </div>

            <div class="col">
                <div class="card mb-4 rounded-3 shadow-sm">
                  <div class="card-header py-3">
                    <h4 class="my-0 fw-normal">Entreprise</h4>
                  </div>
                  <div class="card-body">
                    <h1 class="btn btn-danger">35'000 fcfa<small class="fw-light">/mois</small></h1>
                    <ul class="list-unstyled mt-3 mb-4">
                      <li>{{ $permissions[3]->nombre_user }} utilisateurs</li>
                      <li>Orange, Moov et MTN money</li>
                      <li>Rapport PDF</li>
                      <li>Support technique</li>
                      <li>Accès 30 jours</li>
                    </ul>
                    <button type="button" class="w-100 btn btn-lg btn-primary">Démarrer maintenant</button>
                  </div>
                </div>
            </div>

        </div>

    </div>
</div>
<!-- /.row -->    

@endsection