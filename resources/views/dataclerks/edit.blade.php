@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Dataclerk
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-success">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($dataclerk, ['route' => ['dataclerks.update', $dataclerk->id], 'method' => 'patch', 'enctype'=>'multipart/form-data']) !!}

                        @include('dataclerks.fieldsEdit')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection