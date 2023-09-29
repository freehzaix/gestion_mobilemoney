@extends('layouts.front')

@section('pageTitre')
  Nous contacter - 
@endsection

@section('contenu')
  <div class="container">
    <form method="POST" action="/nous-contacter">
        @csrf
     
        <!-- Equivalent to... -->
        <input type="text" class="form-control" name="_token" value="{{ csrf_token() }}" />
    </form>
  </div>
@endsection