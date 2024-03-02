@extends('layouts.seller')
@section('title', 'Add Stock')
@section('content')

<div class="content">
    <!-- Topbar Start -->
    @include('seller.includes.navbar')
    <!-- end Topbar -->

    <div class="container-fluid">
        <h4 class="mt-3">Please select vehicle</h4>
        @include('seller.includes.flash-message')
        <div class="card">
            <div class="card-body">
                <div>
                    <form method="GET">
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="" class="form-label">Manufacturer</label>
                                    <select class="form-control select2 select-manufacturer" data-toggle="select2" required name="manufacturer">
                                        <option value="">Please Select</option>
                                        @foreach($manufacturers as $manufacturer)
                                        <option @if($manufacturer->id == request()->get('manufacturer')) selected @endif value="{{ $manufacturer->id }}">{{ $manufacturer->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="" class="form-label">Range</label>
                                    <select class="form-control select2 select-range" data-toggle="select2" required name="range"> 
                                        <option value="">Please Select</option>
                                        @foreach($car_ranges as $range)
                                        <option @if($range->range == request()->get('range')) selected @endif value="{{ $range->range }}">{{ @$range->carRange->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="" class="form-label">Model</label>
                                    <select class="form-control select2 select-model" data-toggle="select2" required name="model">
                                        <option value="">Please Select</option>
                                        @foreach($car_models as $model)
                                        <option @if($model->model == request()->get('model')) selected @endif value="{{ $model->model }}">{{ $model->carModel->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="" class="form-label">Variant</label>
                                    <select class="form-control select2 select-variant" data-toggle="select2" required name="variant">
                                        <option value="">Please Select</option>
                                        @foreach($car_variants as $variant)
                                        <option @if($variant->model_series == request()->get('variant')) selected @endif value="{{ $variant->model_series }}">{{ @$variant->carModelSeries->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>



                        </div>
                        <button type="Submit" class="btn btn-primary mt30">Filter</button>
                        <a type="button" href="{{ route('seller.add-stock') }}" class="btn btn-primary mt30">Reset</a>
                    </form>
                </div>

                <div class="form-group" >
                    <div class="selectedVariant" @if((request()->get('manufacturer') || request()->get('model') || request()->get('range') || request()->get('variant')) && !empty($car->uvc) ) style="display: block;" @else style="display: none;" @endif>
                        <h3 class="mt-4 mb-4" style="letter-spacing: -0.5px;line-height: 32px"><span style="color:chocolate">{{ @$car->carMake->name }}</span> , 
                            <span>{{ @$car->carModelSeries->name }} </span>
                            <span style="display:inline-block;margin-left: 15px;margin-right:15px"> | </span>
                            <span style="display:inline-block;margin-left: 15px;margin-right:15px"> Variant: <span style="color:cadetblue">{{ @$car->carModel->name }}</span></span>
                            <span style="display:inline-block;margin-left: 15px;margin-right:15px"> | </span>
                            <span>UVC: <span style="color:deeppink">{{ @$car->carRange->name }}</span></span>
                        </h3>
                        <div class="row">
                            
                            <div class="col-sm-3">

                                <form method="POST" action="{{ route('seller.stock.store') }}" enctype="multipart/form-data">
                                    @csrf
                                    <input type="hidden" name="car_id" value="{{ @$car->id }}">
                                    <input type="hidden" name="seller_id" value="{{ auth()->user()->id }}">
                                    <div class="form-group">
                                        <label class="form-label">Color</label>
                                        <input type="text" class="form-control" name="car_color" placeholder="Color">
                                    </div> 
                                    <div class="form-group">
                                        <label class="form-label">Base Vehicle Price</label>
                                        <input type="text" required class="form-control" name="car_base_price" placeholder="Base Vehicle Price (£)">
                                    </div>
                                    <div class="form-group">
                                        <label class="form-label">Twelve Months Road Tax</label>
                                        <input type="text" class="form-control" name="car_road_tax" placeholder="Twelve Months Road Tax (£)">
                                    </div>
                                    <div class="form-group">
                                        <label class="form-label">Registration Fee</label>
                                        <input type="text" class="form-control" name="car_registration_fee" placeholder="Registration Fee (£)">
                                    </div>
                                    <div class="form-group">
                                        <label class="form-label">Delivery Charges</label>
                                        <input type="text" class="form-control" name="car_delivery_charge" placeholder="Delivery Charges (£)">
                                    </div>
                                    <div class="form-group text-center">
                                        <button type="submit" class="btn btn-primary" @if($data_exists) disabled @endif>Submit</button>
                                    </div>
                                </form>
                            </div>

                            <div class="col-sm-9">
                                <div class="table-responsive" style="border: 3px solid #ccc">
                                    <table class="table table-bordered table-striped table-sm">
                                        <tbody>
                                            <tr>
                                                <td><strong>Maker</strong></td>
                                                <td>{{ $car ? @$car->carMake->name : '' }}</td>
                                            </tr>
                                            <tr>
                                                <td><strong>Year</strong></td>
                                                <td>{{ $car ? @$car->carYear->name : '' }}</td>
                                            </tr>
                                            <tr>
                                                <td><strong>UVC</strong></td>
                                                <td>{{ $car ? $car->uvc : '' }}</td>
                                            </tr>
                                            <tr>
                                                <td><strong>Model</strong></td>
                                                <td>{{ $car ? @$car->carModel->name : '' }}</td>
                                            </tr>
                                            <tr>
                                                <td><strong>Range</strong></td>
                                                <td>{{ $car ? @$car->carRange->name : '' }}</td>
                                            </tr>
                                            <tr>
                                                <td><strong>Variant</strong></td>
                                                <td>{{ $car ? @$car->carModel->name : '' }}</td>
                                            </tr>
                                            <tr>
                                                <td><strong>Mark</strong></td>
                                                <td>{{ $car ? $car->mark : '' }}</td>
                                            </tr>
                                            <tr>
                                                <td><strong>Model Series</strong></td>
                                                <td>{{ $car ? @$car->carModelSeries->name : '' }}</td>
                                            </tr>
                                            <tr>
                                                <td><strong>Fuel Type</strong></td>
                                                <td>{{ $car ? $car->fuel_type : '' }}</td>
                                            </tr>
                                            <tr>
                                                <td><strong>Vehicle Class</strong></td>
                                                <td>{{ $car ? $car->vehicle_class : '' }}</td>
                                            </tr>
                                            <tr>
                                                <td><strong>Body Shape</strong></td>
                                                <td>{{ $car ? $car->body_shape : '' }}</td>
                                            </tr>
                                            <tr>
                                                <td><strong>Body Style</strong></td>
                                                <td>{{ $car ? $car->body_style : '' }}</td>
                                            </tr>
                                            <tr>
                                                <td><strong>Number Of Doors</strong></td>
                                                <td>{{ $car ? $car->number_of_doors : '' }}</td>
                                            </tr>
                                            <tr>
                                                <td><strong>Gross Vehicle Weight (KG)</strong></td>
                                                <td>{{ $car ? $car->gross_vehicle_weight_kg : '' }}</td>
                                            </tr>
                                            <tr>
                                                <td><strong>Power Delivery</strong></td>
                                                <td>{{ $car ? $car->power_delivery : '' }}</td>
                                            </tr>
                                            <tr>
                                                <td><strong>Engine Capacity (CC)</strong></td>
                                                <td>{{ $car ? $car->engine_capacity_cc : '' }}</td>
                                            </tr>
                                            <tr>
                                                <td><strong>Engine Capacity (Litres)</strong></td>
                                                <td>{{ $car ? $car->engine_capacity_litres : '' }}</td>
                                            </tr>
                                            <tr>
                                                <td><strong>Aspiration</strong></td>
                                                <td>{{ $car ? $car->aspiration : '' }}</td>
                                            </tr>
                                            <tr>
                                                <td><strong>KW</strong></td>
                                                <td>{{ $car ? $car->kw : '' }}</td>
                                            </tr>
                                            <tr>
                                                <td><strong>BHP</strong></td>
                                                <td>{{ $car ? $car->bhp : '' }}</td>
                                            </tr>
                                            <tr>
                                                <td><strong>Number Of Gears</strong></td>
                                                <td>{{ $car ? $car->number_of_gears : '' }}</td>
                                            </tr>
                                            <tr>
                                                <td><strong>Transmission Type</strong></td>
                                                <td>{{ $car ? $car->transmission_type : '' }}</td>
                                            </tr>
                                            <tr>
                                                <td><strong>Drive Type</strong></td>
                                                <td>{{ $car ? $car->drive_type : '' }}</td>
                                            </tr>
                                            <tr>
                                                <td><strong>Driving Axle</strong></td>
                                                <td>{{ $car ? $car->driving_axle : '' }}</td>
                                            </tr>
                                            <tr>
                                                <td><strong>Battery Capacity</strong></td>
                                                <td>{{ $car ? $car->battery_capacity : '' }}</td>
                                            </tr>
                                            <tr>
                                                <td><strong>Vehicle Type</strong></td>
                                                <td>{{ $car ? $car->vehicle_type : '' }}</td>
                                            </tr>
                                            <tr>
                                                <td><strong>Model Status</strong></td>
                                                <td>{{ $car ? $car->model_status : '' }}</td>
                                            </tr>
                                            <tr>
                                                <td><strong>Vehicles On The Road</strong></td>
                                                <td>{{ $car ? $car->vehicles_on_the_road : '' }}</td>
                                            </tr>
                                            <tr>
                                                <td><strong>Document Version</strong></td>
                                                <td>{{ $car ? $car->document_version : '' }}</td>
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
    $(document).on("change", ".select-manufacturer" ,function(){
        var  value = this.value;
        var url = "{{ route('seller.add-stock') }}?manufacturer="+value;
        location = url;
    });

    $(document).on("change", ".select-model" ,function(){
        var  value = this.value;
        var url = "{{ route('seller.add-stock') }}?manufacturer={{ request()->get('manufacturer') }}&range={{ request()->get('range') }}&model="+value;
        location = url;
    });

    $(document).on("change", ".select-range" ,function(){
         var  value = this.value;
        var url = "{{ route('seller.add-stock') }}?manufacturer={{ request()->get('manufacturer') }}&range="+value;
        location = url;
    });

    $(document).on("change", ".select-variant" ,function(){
         var  value = this.value;
        var url = "{{ route('seller.add-stock') }}?manufacturer={{ request()->get('manufacturer') }}&model={{ request()->get('model') }}&range={{ request()->get('range') }}&variant="+value;
        location = url;
    });
</script>
@endpush

@endsection