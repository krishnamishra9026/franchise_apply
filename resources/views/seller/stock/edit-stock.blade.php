@extends('layouts.seller')
@section('title', 'Edit Stock')
@section('content')

<div class="content">
    <!-- Topbar Start -->
    @include('seller.includes.navbar')
    <!-- end Topbar -->

    <div class="container-fluid">
        <div class="card mt-3">
            <div class="card-body">
                <div class="form-group">
                    <div class="selectedVariant box">
                        <h3 class="mt-4 mb-1 text-center">Manufacturer: <span style="color:chocolate">{{ $car_seller->car->carMake->name }}</span>
                            <span style="display:inline-block;margin-left: 20px;margin-right:20px"> | </span>
                            <span style="display:inline-block;margin-left: 20px;margin-right:20px"> Model: <span style="color:cadetblue">{{ $car_seller->car->carModel->name }}</span></span>
                            <span style="display:inline-block;margin-left: 20px;margin-right:20px"> | </span>
                            <span>Variant: <span style="color:deeppink">{{ $car_seller->car->carModelSeries->name }}</span></span>
                        </h3>
                        <div class="row">
                            <div class="col-sm-3">
                                <form method="POST" action="{{ route('seller.update-stock', $car_seller->id) }}" enctype="multipart/form-data">
                                    @csrf
                                    <div class="form-group">
                                        <label class="form-label">Color</label>
                                        <input type="text" class="form-control" name="car_color" value="{{ $car_seller->car_color }}">
                                    </div>
                                    <div class="form-group">
                                        <label class="form-label">Base Vehicle Price</label>
                                        <input type="text" class="form-control" required name="car_base_price" value="{{ $car_seller->car_base_price }}">
                                    </div>
                                    <div class="form-group">
                                        <label class="form-label">Twelve Months Road Tax</label>
                                        <input type="text" class="form-control" name="car_road_tax" value="{{ $car_seller->car_road_tax }}">
                                    </div>
                                    <div class="form-group">
                                        <label class="form-label">Registration Fee</label>
                                        <input type="text" class="form-control" name="car_registration_fee" value="{{ $car_seller->car_registration_fee }}">
                                    </div>
                                    <div class="form-group">
                                        <label class="form-label">Delivery Charges</label>
                                        <input type="text" class="form-control" name="car_delivery_charge" value="{{ $car_seller->car_delivery_charge }}">
                                    </div>
                                    <div class="form-group text-center">
                                        <button type="submit" class="btn btn-primary">Submit</button>
                                    </div>
                                </form>
                            </div>
                            <div class="col-sm-9">
                                <div class="table-responsive" style="border: 3px solid #ccc">
                                    <table class="table table-bordered table-striped table-sm">
                                        <tbody>
                                            <tr>
                                                <td><strong>Maker</strong></td>
                                                <td>{{ $car_seller ? @$car_seller->car->carMake->name : '' }}</td>
                                            </tr>
                                            <tr>
                                                <td><strong>Year</strong></td>
                                                <td>{{ $car_seller ? @$car_seller->car->carYear->name : '' }}</td>
                                            </tr>
                                            <tr>
                                                <td><strong>UVC</strong></td>
                                                <td>{{ $car_seller ? $car_seller->car->uvc : '' }}</td>
                                            </tr>
                                            <tr>
                                                <td><strong>Model</strong></td>
                                                <td>{{ $car_seller ? @$car_seller->car->carModel->name : '' }}</td>
                                            </tr>
                                            <tr>
                                                <td><strong>Range</strong></td>
                                                <td>{{ $car_seller ? @$car_seller->car->carRange->name : '' }}</td>
                                            </tr>
                                            <tr>
                                                <td><strong>Variant</strong></td>
                                                <td>{{ $car_seller ? @$car_seller->car->carModel->name : '' }}</td>
                                            </tr>
                                            <tr>
                                                <td><strong>Mark</strong></td>
                                                <td>{{ $car_seller ? $car_seller->car->mark : '' }}</td>
                                            </tr>
                                            <tr>
                                                <td><strong>Model Series</strong></td>
                                                <td>{{ $car_seller ? @$car_seller->car->carModelSeries->name : '' }}</td>
                                            </tr>
                                            <tr>
                                                <td><strong>Fuel Type</strong></td>
                                                <td>{{ $car_seller ? $car_seller->car->fuel_type : '' }}</td>
                                            </tr>
                                            <tr>
                                                <td><strong>Vehicle Class</strong></td>
                                                <td>{{ $car_seller ? $car_seller->car->vehicle_class : '' }}</td>
                                            </tr>
                                            <tr>
                                                <td><strong>Body Shape</strong></td>
                                                <td>{{ $car_seller ? $car_seller->car->body_shape : '' }}</td>
                                            </tr>
                                            <tr>
                                                <td><strong>Body Style</strong></td>
                                                <td>{{ $car_seller ? $car_seller->car->body_style : '' }}</td>
                                            </tr>
                                            <tr>
                                                <td><strong>Number Of Doors</strong></td>
                                                <td>{{ $car_seller ? $car_seller->car->number_of_doors : '' }}</td>
                                            </tr>
                                            <tr>
                                                <td><strong>Gross Vehicle Weight (KG)</strong></td>
                                                <td>{{ $car_seller ? $car_seller->car->gross_vehicle_weight_kg : '' }}</td>
                                            </tr>
                                            <tr>
                                                <td><strong>Power Delivery</strong></td>
                                                <td>{{ $car_seller ? $car_seller->car->power_delivery : '' }}</td>
                                            </tr>
                                            <tr>
                                                <td><strong>Engine Capacity (CC)</strong></td>
                                                <td>{{ $car_seller ? $car_seller->car->engine_capacity_cc : '' }}</td>
                                            </tr>
                                            <tr>
                                                <td><strong>Engine Capacity (Litres)</strong></td>
                                                <td>{{ $car_seller ? $car_seller->car->engine_capacity_litres : '' }}</td>
                                            </tr>
                                            <tr>
                                                <td><strong>Aspiration</strong></td>
                                                <td>{{ $car_seller ? $car_seller->car->aspiration : '' }}</td>
                                            </tr>
                                            <tr>
                                                <td><strong>KW</strong></td>
                                                <td>{{ $car_seller ? $car_seller->car->kw : '' }}</td>
                                            </tr>
                                            <tr>
                                                <td><strong>BHP</strong></td>
                                                <td>{{ $car_seller ? $car_seller->car->bhp : '' }}</td>
                                            </tr>
                                            <tr>
                                                <td><strong>Number Of Gears</strong></td>
                                                <td>{{ $car_seller ? $car_seller->car->number_of_gears : '' }}</td>
                                            </tr>
                                            <tr>
                                                <td><strong>Transmission Type</strong></td>
                                                <td>{{ $car_seller ? $car_seller->car->transmission_type : '' }}</td>
                                            </tr>
                                            <tr>
                                                <td><strong>Drive Type</strong></td>
                                                <td>{{ $car_seller ? $car_seller->car->drive_type : '' }}</td>
                                            </tr>
                                            <tr>
                                                <td><strong>Driving Axle</strong></td>
                                                <td>{{ $car_seller ? $car_seller->car->driving_axle : '' }}</td>
                                            </tr>
                                            <tr>
                                                <td><strong>Battery Capacity</strong></td>
                                                <td>{{ $car_seller ? $car_seller->car->battery_capacity : '' }}</td>
                                            </tr>
                                            <tr>
                                                <td><strong>Vehicle Type</strong></td>
                                                <td>{{ $car_seller ? $car_seller->car->vehicle_type : '' }}</td>
                                            </tr>
                                            <tr>
                                                <td><strong>Model Status</strong></td>
                                                <td>{{ $car_seller ? $car_seller->car->model_status : '' }}</td>
                                            </tr>
                                            <tr>
                                                <td><strong>Vehicles On The Road</strong></td>
                                                <td>{{ $car_seller ? $car_seller->car->vehicles_on_the_road : '' }}</td>
                                            </tr>
                                            <tr>
                                                <td><strong>Document Version</strong></td>
                                                <td>{{ $car_seller ? $car_seller->car->document_version : '' }}</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


@push('scripts')
<script type="text/javascript">
    $(document).ready(function(){
    $(".select2").change(function(){
        $(this).find("option:selected").each(function(){
            var optionValue = $(this).attr("value");
            if(optionValue){
                $(".box").not("." + optionValue).hide();
                $("." + optionValue).show();
            } else{
                $(".box").hide();
            }
        });
    }).change();
});
</script>
@endpush

@endsection