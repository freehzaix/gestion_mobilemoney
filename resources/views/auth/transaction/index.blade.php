@extends('layouts.admin')

@section('titlePage')
    Transaction
@endsection

@section('contenu')

<div class="row ml-3 mr-3">
  <h5><a class="btn btn-primary" href="{{ route('transaction.add') }}">Ajouter une transaction</a></h5>
</div>

<div class="row mt-3">
    <div class="col-lg-9">

      @if (session('status'))
          <div class="btn btn-success">{{ session('status') }}</div>
          <hr />
      @endif
        
        <table class="table table-striped">
            <thead>
              <tr>
                <th>#</th>
                <th>Montant</th>
                <th>Téléphone</th>
                <th>Nom & prénom</th>
                <th>Type</th>
                <th>Date et heure</th>
                <th></th>
              </tr>
            </thead>
            <tbody>
              @php
                  $iteration = 1;
              @endphp
              @foreach ($transactions as $item)
              <tr>
                <td>{{ $iteration }}</td>              
                <td>{{ $item->montant }} FCFA</td>
                <td>
                  @php
                    $cli = App\Models\Client::find($item->client_id);
                  @endphp
                  {{ $cli->telephone }}
                </td>
                <td>
                  @php
                    $cli = App\Models\Client::find($item->client_id);
                  @endphp
                  {{ $cli->nom }} {{ $cli->prenom }}
                </td>
                <td>
                  @if($item->type == 'depot')
                    <b style="color: blue">Dépôt</b>
                  @else
                    <b style="color: red">Retrait</b>
                  @endif
                </td>
                <td>{{ $item->dateHeure }}</td>
                
                <td>
                  <a href="{{ route('transaction.delete', $item->id) }}"><i class="fa fa-trash text-red"></i></a>
                </td>
              </tr>
              @php
                  $iteration += 1;
              @endphp
              @endforeach
            </tbody>
          </table>

    </div>

    <div class="col-lg-3">
      
    </div>

</div>
<!-- /.row -->    
@endsection