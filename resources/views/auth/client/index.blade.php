@extends('layouts.admin')

@section('titlePage')
    Client
@endsection

@section('contenu')

<div class="row ml-3 mr-3">
  <h5><a class="btn btn-primary" href="{{ route('client.add') }}">Ajouter un client</a></h5>
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
                <th>Téléphone</th>
                <th>Nom & Prénom</th>
                <th>Adresse</th>
                <th>Actions</th>
              </tr>
            </thead>
            <tbody>
              @php
                  $iteration = 1;
              @endphp
              @foreach ($clients as $item)
              <tr>
                <td>{{ $iteration }}</td>              
                <td>{{ $item->telephone }}</td>
                <td>{{ $item->nom }} {{ $item->prenom }}</td>
                <td>{{ $item->adresse }}</td>
                <td>
                  <a href="{{ route('client.show', $item->id) }}"><i class="fa fa-edit mr-2 text-green"></i></a>
                  <a href="{{ route('client.delete', $item->id) }}"><i class="fa fa-trash text-red"></i></a>
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