@extends('layouts.seller')
@section('title', 'View Order')
@section('content')

<div class="content">
    <!-- Topbar Start -->
    @include('seller.includes.navbar')
    <!-- end Topbar -->

    <div class="row">
        <div class="col-sm-6">
            <div class="card mt-3">
                <div class="card-body">
                    <h4>Order details</h4>
                    <ul class="list-unstyled">
                        <li>Order ID: <strong>#{{ $order->id }}</strong></li>
                        <li>Created at: <strong>{{ date('F d, Y', strtotime($order->created_at)) }}</strong></li>
                        <li>Payment Method: <strong>Bank Transfer</strong></li>
                        @if(getStatus($order->status) == 'Pending')
                            <li class="mt-2"><a href="{{ route('seller.orders.update-status', ['id' => $order->id, 'status' => 2]) }}" class="btn btn-primary btn-sm">Accept</a> <a href="{{ route('seller.orders.update-status', ['id' => $order->id, 'status' => 4]) }}" class="btn btn-danger btn-sm ms-2">Reject</a></li>
                        @elseif($order->status == 2 || $order->status == 4)
                            <li>Order Status: <strong><span class="badge bg-success text-light">{{ getStatus($order->status) }}</span></strong></li>
                            <li class="mt-2"><a href="{{ route('seller.orders.update-status', ['id' => $order->id, 'status' => 3]) }}" class="btn btn-primary btn-sm">Mark Complete</a> </li>
                        @else
                            <li>Order Status: <strong><span class="badge bg-success text-light">{{ getStatus($order->status) }}</span></strong></li>
                        @endif
                    </ul>
                </div>
            </div>
        </div>
        <div class="col-sm-6">
            <div class="card mt-3">
                <div class="card-body">
                    <h4>Delivery details</h4>
                    <ul class="list-unstyled">
                        <li>Delivery date: <strong>{{ $order->delivery_date }}</strong></li>
                        <li>Driver Name: <strong>{{ $order->driver_name }}</strong></li>
                        <li>Driver Phone: <strong>{{ $order->driver_phone }}</strong></li>
                        <li>Delivery Address: <strong>{{ $order->delivery_address }}</strong></li>
                        <li>Address: <strong>{{ $order->address }}</strong></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <h3 class="mt-4 mb-4 text-center" style="letter-spacing: -0.5px;line-height: 32px"><span style="color:chocolate">{{ $order->car->carMake->name }}</span> , 
        <span>{{ $order->car->carRange->name }} </span>
        <span style="display:inline-block;margin-left: 15px;margin-right:15px"> | </span>
        <span style="display:inline-block;margin-left: 15px;margin-right:15px"> Variant: <span style="color:cadetblue">{{ $order->car->carModel->name }}</span></span>
        <span style="display:inline-block;margin-left: 15px;margin-right:15px"> | </span>
        <span>UVC: <span style="color:deeppink">{{ $order->car->uvc }}</span></span>
    </h3>
    <div class="mt-3 table-responsive">
        <table class="table table-bordered table-striped table-sm">
            @if($car_seller)
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
            @endif

            </table>
    </div>

</div>

@endsection