<!-- Nom Field -->
<div class="form-group">
    {!! Form::label('nom', 'Nom:') !!}
    <p>{{ $contamine->nom }}</p>
</div>

<!-- Prenom Field -->
<div class="form-group">
    {!! Form::label('prenom', 'Prenom:') !!}
    <p>{{ $contamine->prenom }}</p>
</div>

<!-- Sexe Field -->
<div class="form-group">
    {!! Form::label('sexe', 'Sexe:') !!}
    @if($contamine->sexe ==0)
    <p>Masculin</p>
    @elseif($contamine->sexe ==1)
    <p>Féminin</p>
    @endif
</div>

<!-- Commune Field -->
<div class="form-group">
    {!! Form::label('commune', 'Commune:') !!}
    <p>{{ $contamine->commune }}</p>
</div>

<!-- Departement Field -->
<div class="form-group">
    {!! Form::label('departement', 'Departement:') !!}
    <p>{{ $contamine->departement }}</p>
</div>

<!-- Adresse Field -->
<div class="form-group">
    {!! Form::label('adresse', 'Adresse:') !!}
    <p>{{ $contamine->adresse }}</p>
</div>

<!-- Institution Field -->
<div class="form-group">
    {!! Form::label('institution', 'Institution:') !!}
    <p>{{ $contamine->institution }}</p>
</div>

<!-- Telephone Field -->
<div class="form-group">
    {!! Form::label('telephone', 'Telephone:') !!}
    <p>{{ $contamine->telephone }}</p>
</div>

<!-- Creer par -->
<div class="form-group">
    {!! Form::label('created_by', 'Ajouté par:') !!}
    <p>{{ $contamine->GetUser($contamine->created_by)->nom }} {{ $contamine->GetUser($contamine->created_by)->prenom }}</p>
</div>

<!-- Creer Field -->
<div class="form-group">
    {!! Form::label('created_at', 'Créé le:') !!}
    <p>{{ $contamine->created_at }}</p>
</div>

<!-- Modifier Field -->
<div class="form-group">
    {!! Form::label('updated_at', 'Modifié le:') !!}
    <p>{{ $contamine->updated_at }}</p>
</div>
