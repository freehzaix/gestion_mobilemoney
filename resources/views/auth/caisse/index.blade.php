@extends('layouts.admin')

@section('titlePage')
    Caisse
@endsection

@section('contenu')

<div class="row ml-3 mr-3">
  <h5><a class="btn btn-primary" href="{{ route('caisse.add') }}">Ajouter une caisse</a></h5>
</div>

<div class="row mt-3">
    <div class="col-lg-8">

      @if (session('status'))
          <div class="btn btn-success">{{ session('status') }}</div>
          <hr />
      @endif
        
        <table class="table table-striped">
            <thead>
              <tr>
                <th>#</th>
                <th>Logo</th>
                <th>Nom de la caisse</th>
                <th>Montant de la caisse</th>
                <th>Taux de caisse (en %)</th>
                <th>Actions</th>
              </tr>
            </thead>
            <tbody>
              @php
                  $iteration = 1;
              @endphp
              @foreach ($caisses as $item)
              <tr>
                <td>{{ $iteration }}</td>
                <td>
                  <img src="/{{ $item->url_operateur }}" alt="Logo {{ $item->nom_operateur }}" height="32px">
                </td>
                <td>{{ $item->nom_caisse }}</td>
                <td>{{ $item->montant_caisse }} FCFA</td>
                <td>{{ $item->taux_caisse }}%</td>
                <td>
                  <a href="{{ route('caisse.show', $item->id) }}"><i class="fa fa-edit mr-2"></i></a>
                  <a href="{{ route('caisse.delete', $item->id) }}"><i class="fa fa-trash"></i></a>
                </td>
              </tr>
              @php
                  $iteration += 1;
              @endphp
              @endforeach
            </tbody>
          </table>

    </div>

    <div class="col-lg-4">
      
    </div>

</div>
<!-- /.row -->    
@endsection