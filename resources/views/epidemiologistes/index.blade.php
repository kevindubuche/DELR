@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1 class="pull-left">Epidémiologistes</h1>
        <h1 class="pull-right">
           <a class="btn btn-success btn-lg pull-right" style="margin-top: -10px;margin-bottom: 5px; border-radius:30px;" href="{{ route('epidemiologistes.create') }}"><i class="fa fa-plus-circle"></i></a>
        </h1>
    </section>
    <div class="content">
        <div class="clearfix"></div>

        @include('flash::message')

        <div class="clearfix"></div>
        <div class="box box-success">
            <div class="box-body">
                    @include('epidemiologistes.table')
            </div>
        </div>
        <div class="text-center">
        
        </div>
    </div>
@endsection

