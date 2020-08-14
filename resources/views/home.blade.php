@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        

   @include('flash::message')
   @include('adminlte-templates::common.errors')

        <div class="col-md-4">
            <div class="row">
                <div class="col-lg-10 col-xs-10">
                    <!-- small box -->
                    <div class="small-box bg-aqua">
                        <div class="inner">
                            <h3>{{$totalDataclerks}}</h3>
                            <p>Total Dataclerk</p>
                        </div>
                    </div>
                </div>
          </div>
        </div>

        <div class="col-md-4">
            <div class="row">
                <div class="col-lg-10 col-xs-10">
                    <!-- small box -->
                    <div class="small-box bg-red">
                         <div class="inner">
                            <h3>{{$totalContamines}}</h3>
                            <p>Total Contaminés</p>
                        </div>
                    </div>
                </div>
          </div>
        </div>

        <div class="col-md-4">
            <div class="row">
                <div class="col-lg-10 col-xs-10">
                    <!-- small box -->
                    <div class="small-box bg-green">
                        <div class="inner">
                        <h3>{{$totalEpidemiologistes}}</h3>
                            <p>Total Epidemiologistes</p>
                        </div>
                    </div>
                </div>
          </div>
        </div>

    </div>
<br><br>



    </div>
</div>
@endsection
