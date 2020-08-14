<input type="hidden" name="created_by" id="created_by" value=" {{ Auth::user()->id }}" >

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
        <option value="0">Masculin</option>
        <option value="1">Féminim</option>
    </select>
</div>

<!-- Commune Field -->
<div class="form-group col-sm-6">
    {!! Form::label('commune', 'Commune:') !!}
    {!! Form::text('commune', null, ['class' => 'form-control','maxlength' => 191,'maxlength' => 191, 'required']) !!}
</div>

<!-- Departement Field -->
<div class="form-group col-sm-6">
    <label>Départément</label>
    <select class="form-control" name="departement" id="departement" required >
        <option value="0" selected="false" disabled="true">Choisir départément</option>
        <option value="Artibonite">Artibonite</option>
        <option value="Centre">Centre</option>
        <option value="Grand'Anse">Grand'Anse</option>
        <option value="Nippes">Nippes</option>
        <option value="Nord">Nord</option>
        <option value="Nord-Est">Nord-Est</option>
        <option value="Nord-Ouest">Nord-Ouest</option>
        <option value="Ouest">Ouest</option>
        <option value="Sud">Sud</option>
        <option value="Sud-Est">Sud-Est</option>
    </select>
</div>


<!-- Adresse Field -->
<div class="form-group col-sm-6">
    {!! Form::label('adresse', 'Adresse:') !!}
    {!! Form::text('adresse', null, ['class' => 'form-control','maxlength' => 191,'maxlength' => 191, 'required']) !!}
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
