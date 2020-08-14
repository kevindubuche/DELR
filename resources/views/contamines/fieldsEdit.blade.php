<input type="hidden" id="created_by" name="created_by" value="{{$contamine->created_by}}">
<!-- Nom Field -->
<div class="form-group col-sm-6">
    {!! Form::label('nom', 'Nom:') !!}
    {!! Form::text('nom', null, ['class' => 'form-control','maxlength' => 191,'maxlength' => 191, 'required']) !!}
</div>

<!-- Prenom Field -->
<div class="form-group col-sm-6">
    {!! Form::label('prenom', 'Prénom:') !!}
    {!! Form::text('prenom', null, ['class' => 'form-control','maxlength' => 191,'maxlength' => 191, 'required']) !!}
</div>

<!-- Sexe Field -->
<div class="form-group col-sm-6">
    <label>Sexe</label>
    <select class="form-control" name="sexe" id="sexe" required>
        <option value="0" selected="false" disabled="true">Choisir sexe</option>
        <option value="1" @if($contamine->sexe==0) selected="true" @endif>Masculin</option>
        <option value="0" @if($contamine->sexe==1) selected="true" @endif>Féminim</option>
    </select>
</div>

<!-- Commune Field -->
<div class="form-group col-sm-6">
    {!! Form::label('commune', 'Commune:') !!}
    {!! Form::text('commune', null, ['class' => 'form-control','maxlength' => 191,'maxlength' => 191, 'required']) !!}
</div>

<!-- Adresse Field -->
<div class="form-group col-sm-6">
    {!! Form::label('adresse', 'Adresse:') !!}
    {!! Form::text('adresse', null, ['class' => 'form-control','maxlength' => 191,'maxlength' => 191, 'required']) !!}
</div>
<!-- Departement Field -->
<div class="form-group col-sm-6">
    <label>Départément</label>
    <select class="form-control" name="departement" id="departement" required>
        <option  value="0" selected="false" disabled="true">Choisir départément</option>
        <option @if($contamine->departement=='Artibonite') selected="true" @endif  value="Artibonite">Artibonite</option>
        <option @if($contamine->departement=='Centre') selected="true" @endif  value="Centre">Centre</option>
        <option @if($contamine->departement=='Grand\'Anse') selected="true" @endif  value="Grand'Anse">Grand'Anse</option>
        <option @if($contamine->departement=='Nippes') selected="true" @endif  value="Nippes">Nippes</option>
        <option @if($contamine->departement=='Nord') selected="true" @endif  value="Nord">Nord</option>
        <option @if($contamine->departement=='Nord-Est') selected="true" @endif  value="Nord-Est">Nord-Est</option>
        <option @if($contamine->departement=='Nord-Ouest') selected="true" @endif value="Nord-Ouest">Nord-Ouest</option>
        <option @if($contamine->departement=='Ouest') selected="true" @endif  value="Ouest">Ouest</option>
        <option @if($contamine->departement=='Sud') selected="true" @endif  value="Sud">Sud</option>
        <option @if($contamine->departement=='Sud-Est') selected="true" @endif  value="Sud-Est">Sud-Est</option>
    </select>
</div>
<!-- Institution Field -->
<div class="form-group col-sm-6">
    {!! Form::label('institution', 'Institution:') !!}
    {!! Form::text('institution', null, ['class' => 'form-control','maxlength' => 191,'maxlength' => 191, 'required']) !!}
</div>

<!-- Telephone Field -->
<div class="form-group col-sm-6">
    {!! Form::label('telephone', 'Téléphone:') !!}
    {!! Form::text('telephone', null, ['class' => 'form-control','maxlength' => 191,'maxlength' => 191, 'required']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Enregistrer', ['class' => 'btn btn-success']) !!}
    <a href="{{ route('contamines.index') }}" class="btn btn-default">Annuler</a>
</div>
