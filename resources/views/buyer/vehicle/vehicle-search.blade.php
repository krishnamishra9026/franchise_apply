@extends('layouts.buyer')
@section('title', 'Vehicle Search')
@section('content')

<div class="content">
    <!-- Topbar Start -->
    @include('buyer.includes.navbar')
    <!-- end Topbar -->
    <div class="v-search container-fluid">
        <div class="vehicle-details" style="display: block;clear:both">
            <h4 class="mt-3 mb-2">Vehicle details: <strong></strong></h4>
            <h3 class="mt-4 mb-1 text-center"><span style="color:chocolate">Renault Trafic</span> , 
                <span>{{ @$range }}</span>
                <span style="display:inline-block;margin-left: 20px;margin-right:20px"> | </span>
                <span style="display:inline-block;margin-left: 20px;margin-right:20px"> Model: <span style="color:cadetblue">{{ @$model }}</span></span>
                <span style="display:inline-block;margin-left: 20px;margin-right:20px"> | </span>
                <span>UVC: <span style="color:deeppink">{{ $car->uvc }}</span></span>
            </h3>
            <div class="mt-3 table-responsive">
            <table class="table table-bordered table-striped table-sm">
                <tbody>
                    <thead>
                        <th>Code</th>
                        <th>Description</th>
                        <th>Category</th>
                        <th>List Price</th>
                        <th>Discount Price</th>
                    </thead>
                    <tr>
                        <td>102123</td>
                        <td>Base Vehicle</td>
                        <td></td>
                        <td>£ 20,433.33</td>
                        <td>£ 17,981.33</td>
                    </tr>
                    <tr>
                        <td>102123</td>
                        <td>Additional Discount</td>
                        <td></td>
                        <td>£ 0.00</td>
                        <td>£ 0.00</td>
                    </tr>
                    <tr>
                        <td>-1</td>
                        <td>Twelve Months Road Tax</td>
                        <td>on the road</td>
                        <td>£ 210.00</td>
                        <td>£ 210.00</td>
                    </tr>
                    <tr>
                        <td>0</td>
                        <td>Registration Fee</td>
                        <td>on the road</td>
                        <td>£ 55.00</td>
                        <td>£ 55.00</td>
                    </tr>
                    <tr>
                        <td>1</td>
                        <td>Delivery</td>
                        <td>on the road</td>
                        <td>£ 795.00</td>
                        <td>£ 795.00</td>
                    </tr>
                    <tr>
                        <td>142911</td>
                        <td>Black roof and A pillar</td>
                        <td>exterior features</td>
                        <td>£ 0.00</td>
                        <td>£ 0.00</td>
                    </tr>
                    <tr>
                        <td>181147</td>
                        <td>Two coat premium metallic - Crimson red</td>
                        <td>paintwork</td>
                        <td>£ 0.00</td>
                        <td>£ 0.00</td>
                    </tr>
                    <tr>
                        <td>150146</td>
                        <td>Alcantara seat trim - Jet black</td>
                        <td>trim</td>
                        <td>£ 0.00</td>
                        <td>£ 0.00</td>
                    </tr>
                    <tr>
                        <td>69372</td>
                        <td>Tyre repair kit</td>
                        <td>wheels</td>
                        <td>£ 0.00</td>
                        <td>£ 0.00</td>
                    </tr>
                    <tr>
                        <td colspan="3" style="text-align: right;background: #000;color:#fff">TOTAL (ex VAT)</td>
                        <td style="background: #000;color:#fff">£ 21,493.33</td>
                        <td style="background: #000;color:#fff">£ 19,041.33</td>
                    </tr>
                    <tr>
                        <td colspan="3" style="text-align: right;color:#000">VAT</td>
                        <td style="background: #000;color:#fff">&nbsp;</td>
                        <td style="color:#000">£ 3,755.27</td>
                    </tr>
                    <tr>
                        <td colspan="3" style="text-align: right;background: #000;color:#fff">Grand Total</td>
                        <td style="background: #000;color:#000">&nbsp;</td>
                        <td style="background: #000;color:#fff">£22,796.60</td>
                    </tr>
                </tbody>
            </table>
            <div class="mb-2">
                <div class="float-right">
                    <button class="btn btn-danger ms-1" type="button" data-bs-toggle="collapse" data-bs-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
                        VEHICLE STANDARD DETAILS
                    </button>
                    <a style="display: none;" href="{{ route('buyer.buy-stock', $car->id) }}" class="btn btn-primary">PLACE ORDER</a>
                </div>
            </div>
            <div class="collapse" id="collapseExample">
                <div class="vehicle-details" style="clear:both">
                    <h4>Vehicle details</h4>
                    <div class="card">
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered table-sm">
                                    <tr>
                                        <td><strong>Maker</strong></td>
                                        <td>{{ @$car->carMake->name }}</td>
                                    </tr>
                                    <tr>
                                        <td><strong>UVC</strong></td>
                                        <td>{{ $car->uvc }}</td>
                                    </tr>
                                    <tr>
                                        <td><strong>Range</strong></td>
                                        <td>{{ $car->carRange->name }}</td>
                                    </tr>
                                    <tr>
                                        <td><strong>Model</strong></td>
                                        <td>{{ $car->carModel->name }}</td>
                                    </tr>
                                    <tr>
                                        <td><strong>Mark</strong></td>
                                        <td>{{ $car->mark }}</td>
                                    </tr>
                                    <tr>
                                        <td><strong>Model Series</strong></td>
                                        <td>{{ @$car->carModelSeries->name }}</td>
                                    </tr>
                                    <tr>
                                        <td><strong>Fuel Type</strong></td>
                                        <td>{{ $car->fuel_type }}</td>
                                    </tr>
                                    <tr>
                                        <td><strong>Vehicle Class</strong></td>
                                        <td>{{ $car->vehicle_class }}</td>
                                    </tr>
                                    <tr>
                                        <td><strong>Body Shape</strong></td>
                                        <td>{{ $car->body_shape }}</td>
                                    </tr>
                                    <tr>
                                        <td><strong>Body Style</strong></td>
                                        <td>{{ $car->body_style }}</td>
                                    </tr>
                                    <tr>
                                        <td><strong>Number Of Doors</strong></td>
                                        <td>{{ $car->number_of_doors }}</td>
                                    </tr>
                                    <tr>
                                        <td><strong>Gross Vehicle Weight (KG)</strong></td>
                                        <td>{{ $car->gross_vehicle_weight_kg }}</td>
                                    </tr>
                                    <tr>
                                        <td><strong>Power Delivery</strong></td>
                                        <td>{{ $car->power_delivery }}</td>
                                    </tr>
                                    <tr>
                                        <td><strong>Engine Capacity (CC)</strong></td>
                                        <td>{{ $car->engine_capacity_cc }}</td>
                                    </tr>
                                    <tr>
                                        <td><strong>Engine Capacity (Litres)</strong></td>
                                        <td>{{ $car->engine_capacity_litres }}</td>
                                    </tr>
                                    <tr>
                                        <td><strong>Aspiration</strong></td>
                                        <td>{{ $car->aspiration }}</td>
                                    </tr>
                                    <tr>
                                        <td><strong>KW</strong></td>
                                        <td>{{ $car->kw }}</td>
                                    </tr>
                                    <tr>
                                        <td><strong>BHP</strong></td>
                                        <td>{{ $car->bhp }}</td>
                                    </tr>
                                    <tr>
                                        <td><strong>Number Of Gears</strong></td>
                                        <td>{{ $car->number_of_gears }}</td>
                                    </tr>
                                    <tr>
                                        <td><strong>Transmission Type</strong></td>
                                        <td>{{ $car->transmission_type }}</td>
                                    </tr>
                                    <tr>
                                        <td><strong>Drive Type</strong></td>
                                        <td>{{ $car->drive_type }}</td>
                                    </tr>
                                    <tr>
                                        <td><strong>Driving Axle</strong></td>
                                        <td>{{ $car->driving_axle }}</td>
                                    </tr>
                                    <tr>
                                        <td><strong>Battery Capacity</strong></td>
                                        <td>{{ $car->battery_capacity }}</td>
                                    </tr>
                                    <tr>
                                        <td><strong>Vehicle Type</strong></td>
                                        <td>{{ $car->vehicle_type }}</td>
                                    </tr>
                                    <tr>
                                        <td><strong>Model Status</strong></td>
                                        <td>{{ $car->model_status }}</td>
                                    </tr>
                                    <tr>
                                        <td><strong>Vehicles On The Road</strong></td>
                                        <td>{{ $car->vehicles_on_the_road }}</td>
                                    </tr>
                                    <tr>
                                        <td><strong>Document Version</strong></td>
                                        <td>{{ $car->document_version }}</td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@push('scripts')
<script>
$(document).ready(function(){
  $("#showRange").click(function(){ 
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
  });
});
</script>
@endpush

@endsection