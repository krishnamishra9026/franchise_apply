@extends('layouts.admin')
@section('title', 'View Order')
@section('content')

<div class="content">
    <!-- Topbar Start -->
   
    <!-- end Topbar -->

    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-4">
                <div class="card mt-3">
                    <div class="card-body">
                        <h4>Order details</h4>
                        <ul class="list-unstyled">
                            <li>Order ID: <strong>#{{ $order->id }}</strong></li>
                            <li>Created at: <strong>{{ date('F d, Y', strtotime($order->created_at)) }}</strong></li>
                            <li>Payment Method: <strong>Bank Transfer</strong></li>
                            <li>Order Status: <strong><span class="badge bg-success text-light">{{ getStatus($order->status) }}</span></strong></li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-sm-4">
                <div class="card mt-3">
                    <div class="card-body">
                        <h4>Seller assigned</h4>
                        <ul class="list-unstyled" style="margin-bottom:-2px">
                            <li>Ref No. <strong>{{ $order->reference_no }}</strong></li>
                            <li>Customer name: <strong>{{ $order->title }} {{ $order->first_name }} {{ $order->last_name }}</strong></li>
                            <li>Email: <strong>{{ $order->email }}</strong></li>
                            <li>Company name: <strong>{{ $order->company_name }}</strong></li>
                            <!-- @if(empty($order->quantity) || empty($order->seller_id))
                            <li><a style="margin-top:7px" href="{{ route('admin.generate-purchase-order', $order->id) }}" class="btn btn-success btn-sm">Generate PO</a></li>
                            @endif -->
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-sm-4">
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
        <h3 class="mt-4 mb-1 text-center"><span style="color:chocolate">{{ $order->car->carMake->name }}</span> , 
            <span>{{ $order->car->carModel->name }}</span>
            <span style="display:inline-block;margin-left: 20px;margin-right:20px"> | </span>
            <span style="display:inline-block;margin-left: 20px;margin-right:20px"> Model: <span style="color:cadetblue">{{ $order->car->carRange->name }}</span></span>
            <span style="display:inline-block;margin-left: 20px;margin-right:20px"> | </span>
            <span>UVC: <span style="color:deeppink">{{ $order->car->uvc }}</span></span>
        </h3>
        <div class="mt-3 table-responsive">
            @if($car_seller)
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
            @endif
          
        </div>
    </div>
</div>

@endsection