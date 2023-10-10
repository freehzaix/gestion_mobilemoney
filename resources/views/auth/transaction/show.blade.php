@extends('layouts.admin')

@section('titlePage')
    Modifier la transaction
@endsection

@section('contenu')

<div class="row mt-3">
    <div class="col-lg-8">
        <form action="{{ route('transaction.update') }}" method="post">
            @csrf
            <input type="text" name="id" value="{{ $transaction->id }}" style="display: none;">
            <div class="form-group">
                @error('montant')
                    <div class="btn btn-danger"> {{ $message }} </div>  
                @enderror
                <label for="montant">Montant</label>
                <input type="text" id="montant" name="montant" value="{{ $transaction->montant }}" class="form-control" />
            </div>

            <div class="form-group">
                @error('details')
                    <div class="btn btn-danger"> {{ $message }} </div>  
                @enderror
                <label for="details">Details</label>
                <textarea name="details" id="details" cols="30" rows="10" value="{{ $transaction->details }}" class="form-control"></textarea>
            </div>
            
            <div class="form-group">
                <input type="submit" class="btn btn-primary" value="Modifier la transaction">
            </div>
            <br />
        </form>
    </div>

    <div class="col-lg-4">
      
    </div>

</div>
<!-- /.row -->    

<div class="row">
    <h5><a class="text text-primary" href="{{ route('transaction.index') }}">Liste des transactions</a></h5>
</div>
@endsection