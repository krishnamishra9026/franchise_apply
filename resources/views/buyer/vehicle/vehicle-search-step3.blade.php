@extends('layouts.buyer')
@section('title', 'Vehicle Search')
@section('content')

<div class="content">
    <!-- Topbar Start -->
    @include('buyer.includes.navbar')
    <!-- end Topbar -->
    <div class="v-search container-fluid">
        <div class="allModels" style="display: block;clear:both">
            <h4>Make: <strong>{{ @$make }}</strong></h4>
            <h4>Range: <strong>{{ @$range }}</strong></h4>
            <div class="row">
              @foreach($cars as $car)
              <div class="col-sm-2">
                  <a href="{{ route('buyer.vehicle-search') }}?make={{ request()->get('make') }}&range={{ request()->get('range') }}&model={{ $car->model }}" class="btn-danger btn-block mb-3" id="showVariant">{{ $car->carModel->name }}</a>
              </div>
              @endforeach

            
                <!-- @foreach($models as $model)
                <div class="col-sm-3">
                    <a href="{{ route('buyer.vehicle-search') }}?make={{ request()->get('make') }}&range={{ request()->get('range') }}&model={{ $model->id }}" class="btn-danger btn-block mb-3" id="showVariant">{{ $model->name }}</a>
                </div>
                @endforeach -->
                <div class="col-sm-3" style="display: none;">
                    <a href="javascript:void(0)" class="btn-danger btn-block mb-3">A4 Saloon</a>
                </div>
            </div>
            <div class="float-right mt-2 mb-2">
                <a href="{{ url()->previous() }}" type="button" class="btn btn-dark" id="goToAllMaker">Go Back</a>
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