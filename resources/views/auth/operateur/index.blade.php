@extends('layouts.admin')

@section('titlePage')
    Opérateur réseau
@endsection

@section('contenu')

<div class="row ml-3 mr-3">
    <h5><a class="btn btn-primary" href="{{ route('operateur.add') }}">Ajouter un opérateur</a></h5>
</div>

<div class="row">
    <div class="col-lg-12">
        
        

    </div>
</div>
<!-- /.row -->    
@endsection