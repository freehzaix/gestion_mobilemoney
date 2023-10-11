@extends('layouts.admin')

@section('titlePage')
    Ajouter une transaction
@endsection

@section('contenu')

<div class="row mt-3">
    <div class="col-lg-8">
        <form action="{{ route('transaction.add.post') }}" method="POST">
            @csrf
            
            <div class="form-group">
                <div class="row">
                    <div class="col">
                        <label for="client">Client</label>

                        <input type="text" id="telephone" name="telephone" class="form-control" placeholder="Numéro de téléphone">

                        <select id="resultats" name="client_id" class="form-control">
                            
                        </select>
                        
                        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
                        <script>
                            $(document).ready(function() {
                                $('#telephone').on('input', function() {
                                    var numeroTelephone = $(this).val();
                        
                                    $.ajax({
                                        url: "{{ route('rechercher-client') }}",
                                        type: "GET",
                                        data: { telephone: numeroTelephone }, // Utiliser "numero_telephone" au lieu de "telephone"
                                        success: function(response) {
                                            var clients = response.clients;
                                            var selectOptions = '';
                        
                                            clients.forEach(function(client) {
                                                selectOptions += '<option value="' + client.id + '">' + client.nom + ' - ' + client.telephone + '</option>';
                                            });
                        
                                            $('#resultats').html(selectOptions);
                                        }
                                    });
                                });
                            });
                        </script>
                        
                    </div>
                    <div class="col">
                        <h5><a class="btn btn-primary" href="{{ route('client.add') }}">Ajouter un client</a></h5>
                    </div>
                </div>
                
            </div>
            
            <div class="form-group">
                <div class="row">
                    <div class="col">
                        <label for="montant">Montant</label>
                        <input type="text" id="montant" name="montant" class="form-control" required/>
                    </div>
                    <div class="col">
                        <label for="frais">Frais</label>
                        <input type="text" id="frais" name="frais" value="0" class="form-control" />
                    </div>
                </div>
            </div>

            <div class="form-group">
                <label for="details">Détails</label>
                <textarea name="details" id="details" cols="30" rows="5" class="form-control"></textarea>
            </div>
            
            <div class="form-group">
                <div class="row">
                    <div class="col">
                        <label for="type">Type de transaction</label>
                        <select name="type" id="type" class="form-control">
                            <option value="">Choisir une option</option>
                            <option value="depot">Dépôt</option>
                            <option value="retrait">Retrait</option>
                        </select>
                    </div>
                    <div class="col">
                        <label for="caisse">Caisse</label>
                        @foreach ($caisses as $item)                        
                        <select type="text" id="caisse" name="caisse_id" class="form-control">
                            <option value="{{ $item->id }}">{{ $item->nom_caisse }}</option>
                        </select>
                        @endforeach
                    </div>
                </div>
                
            </div>
            <br>
            <div class="form-group">
                <input type="submit" class="btn btn-primary" value="Ajouter la transaction">
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