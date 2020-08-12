{!!Html::image('user_images/'.$epidemiologiste->image,
null,
['class'=>'student.image', 'id'=>'showImage' , 'style'=>'width:200px; height:200px; border-radius:100px;'])!!} 
<hr>

<!-- Nom Field -->
<div class="form-group">
    {!! Form::label('nom', 'Nom:') !!}
    <p>{{ $epidemiologiste->nom }}</p>
</div>

<!-- Prenom Field -->
<div class="form-group">
    {!! Form::label('prenom', 'Prénom:') !!}
    <p>{{ $epidemiologiste->prenom }}</p>
</div>

<!-- Email Field -->
<div class="form-group">
    {!! Form::label('email', 'Email:') !!}
    <p>{{ $epidemiologiste->email }}</p>
</div>

<!-- Username Field -->
<div class="form-group">
    {!! Form::label('username', 'Username:') !!}
    <p>{{ $epidemiologiste->username }}</p>
</div>

<!-- Telephone Field -->
<div class="form-group">
    {!! Form::label('telephone', 'Téléphone:') !!}
    <p>{{ $epidemiologiste->telephone }}</p>
</div>

<!-- Password Field -->
<div class="form-group">
    {!! Form::label('password', 'Password:') !!}
    <p>{{ $epidemiologiste->password }}</p>
</div>

<!-- Integer Field -->
<div class="form-group">
    {!! Form::label('sexe', 'Sexe:') !!}
    <p>{{ $epidemiologiste->integer }}</p>
</div>


<!-- Creer Field -->
<div class="form-group">
    {!! Form::label('created_at', 'Créé le:') !!}
    <p>{{ $epidemiologiste->created_at }}</p>
</div>

<!-- Modifier Field -->
<div class="form-group">
    {!! Form::label('updated_at', 'Modifié le:') !!}
    <p>{{ $epidemiologiste->updated_at }}</p>
</div>