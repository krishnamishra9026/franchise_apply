@extends('layouts.buyer')
@section('title', 'Vehicle details')
@section('content')

<div class="content">
    <!-- Topbar Start -->
    @include('buyer.includes.navbar')
    <!-- end Topbar -->

    <div class="container-fluid">
         <h3 class="mt-4 mb-1 text-center">Manufacturer: <span style="color:chocolate">{{ $car_seller->car->carMake->name }}</span>
            <span style="display:inline-block;margin-left: 20px;margin-right:20px"> | </span>
            <span style="display:inline-block;margin-left: 20px;margin-right:20px"> Model: <span style="color:cadetblue">{{ $car_seller->car->carModel->name }}</span></span>
            <span style="display:inline-block;margin-left: 20px;margin-right:20px"> | </span>
            <span>Variant: <span style="color:deeppink">{{ $car_seller->car->carModelSeries->name }}</span></span>
        </h3>
        <div class="mt-3 table-responsive">
            <table class="table table-bordered table-striped table-sm">
                <tbody >
                <tr>
                    <th colspan="3">Color</th>                    
                    <td>{{ $car_seller->car_color }}</td>
                </tr>
                <tr>
                    <th colspan="3">Base Vehicle Price</th>
                    <td>£{{ $car_seller->car_base_price }}</td>
                </tr>

                <tr>
                    <th colspan="3">Twelve Months Road Tax</th>                    
                    <td>£{{ $car_seller->car_road_tax }}</td>
                </tr>
                <tr>
                    <th colspan="3">Registration Fee</th>
                    <td>£{{ $car_seller->car_registration_fee }}</td>
                </tr>
                <tr>
                    <th colspan="3">Delivery Charges</th>
                    <td>£{{ $car_seller->car_delivery_charge }}</td>
                </tr>

                @php
                $total = ((int)$car_seller->car_base_price + (int)$car_seller->car_road_tax + (int)$car_seller->car_registration_fee + (int)$car_seller->car_delivery_charge);

                $vat = ($total*5)/100;
                $grand_total = $total+$vat;
                @endphp
                
                <tr>
                    <td colspan="3" style="text-align: right;background: #000;color:#fff">TOTAL (ex VAT)</td>
                    <td style="background: #000;color:#fff">£{{ $total }}</td>
                </tr>
                <tr>
                    <td colspan="3" style="text-align: right;color:#000">VAT</td>
                    <td style="color:#000">£{{ $vat }}</td>
                </tr>
                <tr>
                    <td colspan="3" style="text-align: right;background: #000;color:#fff">Grand Total</td>
                    <td style="background: #000;color:#fff">£{{ $grand_total }}</td>
                </tr>
            </tbody>
            </table>
            <div class="mb-2">
                <div class="float-right">
                    <button class="btn btn-danger ms-1" type="button" data-bs-toggle="collapse" data-bs-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
                        VEHICLE STANDARD DETAILS
                    </button>
                    <a href="{{ route('buyer.buyStock', ['car_id' => $car_seller->car->id, 'seller_id' => $car_seller->seller_id]) }}" class="btn btn-primary">PLACE ORDER</a>
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
                                        <td>{{ @$car_seller->car->carMake->name }}</td>
                                    </tr>
                                    <tr>
                                        <td><strong>UVC</strong></td>
                                        <td>{{ $car_seller->car->uvc }}</td>
                                    </tr>
                                    <tr>
                                        <td><strong>Range</strong></td>
                                        <td>{{ $car_seller->car->carRange->name }}</td>
                                    </tr>
                                    <tr>
                                        <td><strong>Model</strong></td>
                                        <td>{{ $car_seller->car->carModel->name }}</td>
                                    </tr>
                                    <tr>
                                        <td><strong>Mark</strong></td>
                                        <td>{{ $car_seller->car->mark }}</td>
                                    </tr>
                                    <tr>
                                        <td><strong>Variant</strong></td>
                                        <td>{{ @$car_seller->car->carModelSeries->name }}</td>
                                    </tr>
                                    <tr>
                                        <td><strong>Fuel Type</strong></td>
                                        <td>{{ $car_seller->car->fuel_type }}</td>
                                    </tr>
                                    <tr>
                                        <td><strong>Vehicle Class</strong></td>
                                        <td>{{ $car_seller->car->vehicle_class }}</td>
                                    </tr>
                                    <tr>
                                        <td><strong>Body Shape</strong></td>
                                        <td>{{ $car_seller->car->body_shape }}</td>
                                    </tr>
                                    <tr>
                                        <td><strong>Body Style</strong></td>
                                        <td>{{ $car_seller->car->body_style }}</td>
                                    </tr>
                                    <tr>
                                        <td><strong>Number Of Doors</strong></td>
                                        <td>{{ $car_seller->car->number_of_doors }}</td>
                                    </tr>
                                    <tr>
                                        <td><strong>Gross Vehicle Weight (KG)</strong></td>
                                        <td>{{ $car_seller->car->gross_vehicle_weight_kg }}</td>
                                    </tr>
                                    <tr>
                                        <td><strong>Power Delivery</strong></td>
                                        <td>{{ $car_seller->car->power_delivery }}</td>
                                    </tr>
                                    <tr>
                                        <td><strong>Engine Capacity (CC)</strong></td>
                                        <td>{{ $car_seller->car->engine_capacity_cc }}</td>
                                    </tr>
                                    <tr>
                                        <td><strong>Engine Capacity (Litres)</strong></td>
                                        <td>{{ $car_seller->car->engine_capacity_litres }}</td>
                                    </tr>
                                    <tr>
                                        <td><strong>Aspiration</strong></td>
                                        <td>{{ $car_seller->car->aspiration }}</td>
                                    </tr>
                                    <tr>
                                        <td><strong>KW</strong></td>
                                        <td>{{ $car_seller->car->kw }}</td>
                                    </tr>
                                    <tr>
                                        <td><strong>BHP</strong></td>
                                        <td>{{ $car_seller->car->bhp }}</td>
                                    </tr>
                                    <tr>
                                        <td><strong>Number Of Gears</strong></td>
                                        <td>{{ $car_seller->car->number_of_gears }}</td>
                                    </tr>
                                    <tr>
                                        <td><strong>Transmission Type</strong></td>
                                        <td>{{ $car_seller->car->transmission_type }}</td>
                                    </tr>
                                    <tr>
                                        <td><strong>Drive Type</strong></td>
                                        <td>{{ $car_seller->car->drive_type }}</td>
                                    </tr>
                                    <tr>
                                        <td><strong>Driving Axle</strong></td>
                                        <td>{{ $car_seller->car->driving_axle }}</td>
                                    </tr>
                                    <tr>
                                        <td><strong>Battery Capacity</strong></td>
                                        <td>{{ $car_seller->car->battery_capacity }}</td>
                                    </tr>
                                    <tr>
                                        <td><strong>Vehicle Type</strong></td>
                                        <td>{{ $car_seller->car->vehicle_type }}</td>
                                    </tr>
                                    <tr>
                                        <td><strong>Model Status</strong></td>
                                        <td>{{ $car_seller->car->model_status }}</td>
                                    </tr>
                                    <tr>
                                        <td><strong>Vehicles On The Road</strong></td>
                                        <td>{{ $car_seller->car->vehicles_on_the_road }}</td>
                                    </tr>
                                    <tr>
                                        <td><strong>Document Version</strong></td>
                                        <td>{{ $car_seller->car->document_version }}</td>
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

@endsection

