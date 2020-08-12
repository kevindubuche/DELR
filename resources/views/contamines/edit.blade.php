@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Contaminé
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-success">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($contamine, ['route' => ['contamines.update', $contamine->id], 'method' => 'patch']) !!}

                        @include('contamines.fieldsEdit')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection