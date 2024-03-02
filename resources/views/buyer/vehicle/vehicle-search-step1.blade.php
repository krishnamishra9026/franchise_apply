@extends('layouts.buyer')
@section('title', 'Vehicle Search')
@section('content')

<div class="content">
    <!-- Topbar Start -->
    @include('buyer.includes.navbar')
    <!-- end Topbar -->
    <div class="v-search container-fluid">
        <div class="allMaker mt-4">
            <div class="row">
                @foreach($makes as $make)
                <div class="col-sm-3">
                    <a href="{{ route('buyer.vehicle-search') }}?make={{ $make->id }}" class="btn-primary btn-block mb-3" id="showRange">{{ $make->name }}</a>
                </div>
                @endforeach
                <div class="col-sm-3" style="display: none;">
                    <a href="javascript:void(0)" class="btn-primary btn-block mb-3">Volkswagen</a>
                </div>
            </div>
        </div>
    </div>

@push('scripts')
<script>
$(document).ready(function(){
/*  $("#showRange").click(function(){ 
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