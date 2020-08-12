@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Contaminé
        </h1>
    </section>
    <div class="content">
        <div class="box box-success">
            <div class="box-body">
                <div class="row" style="padding-left: 20px">
                    @include('contamines.show_fields')
                    <a href="{{ route('contamines.index') }}" class="btn btn-default">Retour</a>
                </div>
            </div>
        </div>
    </div>
@endsection
