@extends('layouts.admin')

@section('titlePage')
    Ajouter une caisse
@endsection

@section('contenu')

<div class="row mt-3">
    <div class="col-lg-8">
        <form action="{{ route('caisse.add.post') }}" method="post">
            @csrf
            <div class="form-group">
                @error('nom_caisse')
                    <div class="btn btn-danger"> {{ $message }} </div>  
                @enderror
                <label for="nom_caisse">Nom de la caisse</label>
                <input type="text" id="nom_caisse" name="nom_caisse" class="form-control" />
            </div>

            <div class="form-group">
                @error('montant_caisse')
                    <div class="btn btn-danger"> {{ $message }} </div>  
                @enderror
                <label for="montant_caisse">Montant de la caisse</label>
                <input type="text" id="montant_caisse" name="montant_caisse" class="form-control" />
            </div>

            <div class="form-group">
                @error('taux_caisse')
                    <div class="btn btn-danger"> {{ $message }} </div>  
                @enderror
                <label for="taux_caisse">Taux de la caisse (en %)</label>
                <input type="text" id="taux_caisse" name="taux_caisse" class="form-control" />
            </div>
            
            <div class="form-group">
                @error('operateur_id')
                    <div class="btn btn-danger"> {{ $message }} </div> <br>
                @enderror
                <label for="operateur_id" class="mt-1"> Opérateur </label> <br>
                @foreach ($operateur as $item)
                    <div class="mt-2">
                        <img src="/{{ $item->url_operateur }}" height="32px" /> 
                        <input type="radio" name="operateur_id" class="ml-1" value="{{ $item->id }}" />
                        {{ $item->nom_operateur }}
                    </div>
                @endforeach
            </div>
            
            <div class="form-group">
                <input type="submit" class="btn btn-primary" value="Ajouter la caisse">
            </div>
            <br />
        </form>
    </div>

    <div class="col-lg-4">
      
    </div>

</div>
<!-- /.row -->    

<div class="row">
    <h5><a class="text text-primary" href="{{ route('caisse.index') }}">Liste des caisses par opérateur</a></h5>
    <br> <br> <br>
</div>
@endsection