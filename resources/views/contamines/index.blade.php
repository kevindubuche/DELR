@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1 class="pull-left">Contaminés</h1>
        <h1 class="pull-right">
           <a class="btn btn-success btn-lg pull-right" style="margin-top: -10px;margin-bottom: 5px; border-radius:30px;"  href="{{ route('contamines.create') }}"><i class="fa fa-plus-circle"></i></a>
        </h1>
          {{-- Bouton PDF --}}
          <div class="btn btn-group" style="margin-top:20px, float:left; margin-right:25px">
            <button type="button" class="btn btn-sm btn-success"><i class="fa fa-file-excel-o" style="color:white"></i> CSV</button>
            <button type="button" class="btn btn-success btn-sm  dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                <span class="caret"></span>
                <span class="sr-only">Toggle Dropdown</span>
            </button>
            <ul class="dropdown-menu" role="menu" id="export-menu">
                <li id="export-to-pdf">
                    <a href="{{url('download-csv-contamines')}}" class="btn btn">Télécharger CSV</a>
                </li>
            </ul>
        </div>
        {{-- Fin Bouton PDF --}}
    </section>
    <div class="content">
        <div class="clearfix"></div>

        @include('flash::message')

        <div class="clearfix"></div>
        <div class="box box-success">
            <div class="box-body">
                    @include('contamines.table')
            </div>
        </div>
        <div class="text-center">
        
        </div>
    </div>
@endsection


@push('scripts')

<script>
    function exportTasks(_this) {
       let _url = $(_this).data('href');
       window.location.href = _url;
    }
 </script>
@endpush