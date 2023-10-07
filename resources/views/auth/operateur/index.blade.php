@extends('layouts.admin')

@section('titlePage')
    Opérateur réseau
@endsection

@section('contenu')

<div class="row ml-3 mr-3">
  <h5><a class="btn btn-primary" href="{{ route('operateur.add') }}">Ajouter un opérateur</a></h5>
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
                <th>Nom de l'opérateur</th>
                <th>Actions</th>
              </tr>
            </thead>
            <tbody>
              @php
                  $iteration = 1;
              @endphp
              @foreach ($operateurs as $item)
              <tr>
                <td>{{ $iteration }}</td>
                <td>
                  <img src="/{{ $item->url_operateur }}" alt="Logo {{ $item->nom_operateur }}" height="32px">
                </td>
                <td>{{ $item->nom_operateur }}</td>
                <td>
                    <a href="#"><i class="fa fa-edit mr-2"></i></a>
                    <a href="#"><i class="fa fa-trash"></i></a>
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