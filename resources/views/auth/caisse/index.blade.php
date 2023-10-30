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
                <th>Nom</th>
                <th>Montant</th>
                <th>Taux (en %)</th>
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
                  @php
                    $op = App\Models\Operateur::find($item->operateur_id);
                  @endphp
                  <img src="./{{ $op->url_operateur }}" alt="Logo {{ $item->nom_operateur }}" height="32px">
                </td>
                <td>{{ $item->nom_caisse }}</td>
                <td>{{ $item->montant_caisse }} FCFA</td>
                <td>{{ $item->taux_caisse }}%</td>
                <td>
                  <a href="{{ route('caisse.show', $item->id) }}"><i class="fa fa-edit mr-2 text-green"></i></a>
                  <a href="{{ route('caisse.delete', $item->id) }}"><i class="fa fa-trash text-red"></i></a>
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