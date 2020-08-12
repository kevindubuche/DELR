<input type="hidden" id="role" name="role" value="1">
<input type="hidden" id="user_id" name="user_id" value="1">
<!-- Nom Field -->
<div class="form-group col-sm-6">
    {!! Form::label('nom', 'Nom:') !!}
    {!! Form::text('nom', null, ['class' => 'form-control','maxlength' => 191,'maxlength' => 191, 'required']) !!}
</div>

<!-- Prenom Field -->
<div class="form-group col-sm-6">
    {!! Form::label('prenom', 'Prenom:') !!}
    {!! Form::text('prenom', null, ['class' => 'form-control','maxlength' => 191,'maxlength' => 191, 'required']) !!}
</div>

<!-- Email Field -->
<div class="form-group col-sm-6">
    {!! Form::label('email', 'Email:') !!}
    {!! Form::email('email', null, ['class' => 'form-control','maxlength' => 191,'maxlength' => 191, 'required']) !!}
</div>

<!-- Username Field -->
<div class="form-group col-sm-6">
    {!! Form::label('username', 'Username:') !!}
    {!! Form::text('username', null, ['class' => 'form-control','maxlength' => 191,'maxlength' => 191, 'required']) !!}
</div>

<!-- Password Field -->
<div class="form-group col-sm-6">
    {!! Form::label('password', 'Password:') !!}
    {!! Form::password('password', ['class' => 'form-control','maxlength' => 191,'maxlength' => 191, 'required']) !!}
</div>

<!-- Sexe Id Field -->
<div class="form-group col-sm-6">
    <label>Sexe</label>
    <select class="form-control" name="sexe" id="sexe" required>
        <option value="0" selected="false" disabled="true">Choisir sexe</option>
        <option value="0">Masculin</option>
        <option value="1">Féminim</option>
    </select>
</div>

<div class="form-group col-sm-6">
    <input type="file" name="image" id="image"
    accept="image/x-png, image/png,image/jpg,image/jpeg" 
    >

    <input type="button"style="text-align: center; background:#ddd;"
    name="browse_file"
    id="browse_file"
    class="form-control texte-capitalize btn-browse"
    class="btn btn-outline-danger" value="Choisir image">
</div>

<div class="form-group col-sm-6" >
    {!!Html::image('user_images/defaultAvatar.png',
    null,
    ['class'=>'student.image', 'id'=>'showImage' , 'style'=>'width:200px; height:200px;'])!!} 
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Enregistrer', ['class' => 'btn btn-success']) !!}
    <a href="{{ route('dataclerks.index') }}" class="btn btn-default">Annuler</a>
</div>


@push('scripts')

<script type="text/javascript">
   $('#browse_file').on('click', function(){
       //leum klike sou youn mdeklanche sak kache a
       $('#image').click();
   })
   $('#image').on('change', function(e){
       showFile(this, '#showImage');
   })

   function showFile(fileInput,img, showName){
       if(fileInput.files[0]){
           var reader = new FileReader();
           reader.onload = function(e){
               $(img).attr('src', e.target.result);
           }
           reader.readAsDataURL(fileInput.files[0]);
       }
       $(showName).text(fileInput.files[0].name)
   };
</script>   
@endpush