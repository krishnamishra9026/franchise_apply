@extends('layouts.buyer')
@section('title', 'Vehicle Search')
@section('content')

<div class="content">
    <!-- Topbar Start -->
    @include('buyer.includes.navbar')
    <!-- end Topbar -->
    <div class="v-search container-fluid">
        <div class="allVariants" style="display: block;clear:both">
            <h4>Make: <strong>{{ @$make }}</strong></h4>
            <h4>Range: <strong>{{ @$range }}</strong></h4>
            <h4>Model: <strong>{{ @$model }}</strong></h4>
            <div class="row">

              @if($cars && count($cars))

              @foreach($cars as $car)

              @if($car->carModelSeries)
              
              <div class="col-sm-2">
                  <a href="{{ route('buyer.vehicle-search') }}?make={{ request()->get('make') }}&range={{ request()->get('range') }}&model={{ request()->get('model') }}&variant={{ $car->model_series }}" class="btn-info btn-block mb-3" id="showVdetails">{{$car->carModelSeries->name}} </a>
              </div>
              @else
              <div>Data not Avilable</div>
              @endif

              @endforeach
              @else
              <div>Data not Avilable</div>
              @endif

                <!-- @foreach($model_series as $modelSeries)
                <div class="col-sm-3">
                    <a href="{{ route('buyer.vehicle-search') }}?make={{ request()->get('make') }}&range={{ request()->get('range') }}&model={{ request()->get('model') }}&variant={{ $modelSeries->id }}" class="btn-info btn-block mb-3" id="showVdetails">{{ $modelSeries->name }} </a>
                </div>
                @endforeach -->
                <div class="col-sm-3" style="display: none;">
                    <a href="javascript:void(0)" class="btn-info btn-block mb-3">40 TFSI 204 S Line 5dr S Tronic [Tech Pack]  </a>
                </div>
            </div>
            <div class="float-right mt-2 mb-2">
                <a href="{{ url()->previous() }}" type="button" class="btn btn-dark" id="goToAllModel">Go Back</a>
            </div>
        </div>
</div>

@push('scripts')
<script>
$(document).ready(function(){
  /*$("#showRange").click(function(){ 
    $(".allRange").slideDown("slow");
    $(".allMaker").hide();
  });
  $("#showModel").click(function(){ 
    $(".allModels").slideDown("slow");
    $(".allRange").hide();
  });
  $("#showVariant").click(function(){ 
    $(".allVariants").slideDown("slow");
    $(".allModels").hide();
  });
  $("#showVdetails").click(function(){ 
    $(".vehicle-details").slideDown("slow");
    $(".allVariants").hide();
  });
  $("#goToAllRange").click(function(){ 
    $(".allMaker").slideDown("slow");
    $(".allRange").hide();
  });
  $("#goToAllMaker").click(function(){ 
    $(".allRange").slideDown("slow");
    $(".allModels").hide();
  });
  $("#goToAllModel").click(function(){ 
    $(".allModels").slideDown("slow");
    $(".allVariants").hide();
  });
  $("#goToAllVariants").click(function(){ 
    $(".allVariants").slideDown("slow");
    $(".vehicle-details").hide();
  });*/
});
</script>
@endpush

@endsection