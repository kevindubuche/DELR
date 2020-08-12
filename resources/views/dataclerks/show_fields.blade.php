{!!Html::image('user_images/'.$dataclerk->image,
null,
['class'=>'student.image', 'id'=>'showImage' , 'style'=>'width:200px; height:200px; border-radius:100px;'])!!} 
<hr>
<!-- Nom Field -->
<div class="form-group">
    {!! Form::label('nom', 'Nom:') !!}
    <p>{{ $dataclerk->nom }}</p>
</div>

<!-- Prenom Field -->
<div class="form-group">
    {!! Form::label('prenom', 'Prénom:') !!}
    <p>{{ $dataclerk->prenom }}</p>
</div>

<!-- Email Field -->
<div class="form-group">
    {!! Form::label('email', 'Email:') !!}
    <p>{{ $dataclerk->email }}</p>
</div>

<!-- Username Field -->
<div class="form-group">
    {!! Form::label('username', 'Username:') !!}
    <p>{{ $dataclerk->username }}</p>
</div>

<!-- Sexe Field -->
<div class="form-group">
    {!! Form::label('sexe', 'Sexe:') !!}
    @if($dataclerk->sexe ==0)
    <p>Masculin</p>
    @elseif($dataclerk->sexe ==1)
    <p>Féminin</p>
    @endif
</div>

<!-- Creer Field -->
<div class="form-group">
    {!! Form::label('created_at', 'Créé le:') !!}
    <p>{{ $dataclerk->created_at }}</p>
</div>

<!-- Modifier Field -->
<div class="form-group">
    {!! Form::label('updated_at', 'Modifié le:') !!}
    <p>{{ $dataclerk->updated_at }}</p>
</div>
