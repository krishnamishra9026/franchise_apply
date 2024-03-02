@extends('layouts.buyer')
@section('title', 'Vehicle Search')
@section('content')

<div class="content">
    <!-- Topbar Start -->
    @include('buyer.includes.navbar')
    <!-- end Topbar -->
    <div class="v-search container-fluid">

        <div class="allRange" style="display: block;">
            <h3 class="mt-2 mb-2">Manufacturer: <strong>{{ @$make }}</strong></h3>
            <div class="row">
                @foreach($cars as $car)
                <div class="col-sm-2">
                    <a href="{{ route('buyer.vehicle-search') }}?make={{ request()->get('make') }}&range={{ $car->range }}" class="btn-success btn-block mb-3" id="showModel">{{ $car->carRange->name }}</a>
                </div>
                @endforeach
                <!-- @foreach($ranges as $range)
                <div class="col-sm-2">
                    <a href="{{ route('buyer.vehicle-search') }}?make={{ request()->get('make') }}&range={{ $range->id }}" class="btn-success btn-block mb-3" id="showModel">{{ $range->name }}</a>
                </div>
                @endforeach -->
                <div class="col-sm-2" style="display: none;">
                    <a href="javascript:void(0)" class="btn-success btn-block mb-3">E-TRON GT</a>
                </div>
            </div>
            <div class="float-right mt-2 mb-2">
                <a href="{{ url()->previous() }}" type="button" class="btn btn-dark" id="goToAllRange">Go Back</a>
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