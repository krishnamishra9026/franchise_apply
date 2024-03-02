@extends('layouts.buyer')
@section('title', 'Live Stock')
@section('content')
@section('topBarMenu', 'Live Stock')

<div class="content">
        <!-- Topbar Start -->
        @include('buyer.includes.navbar')
        <!-- end Topbar -->

        <!-- Start Content-->
        <div class="container-fluid">
            <h3 class="text-center mt-3"><u>Total available units: <strong>{{ $seller_cars_count }}</strong></u></h3>
            <div class="filter mt-2 mb-4">
                <form action="{{ route('buyer.liveStock') }}">
                <div class="row">
                    <div class="col-sm-2">
                        <div class="form-group">
                            <label class="form-label">Manufacturer</label>
                            <select class="form-select" id="manufacturer" name="filter_manufacturer">
                                <option value="">Please select</option>
                                @foreach($manufacturers as $manufacturer)
                                <option @if(request()->get('filter_manufacturer') == $manufacturer->id) selected @endif value="{{ $manufacturer->id }}">{{ $manufacturer->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-sm-3">
                        <div class="form-group">
                            <label class="form-label">Model</label>
                            <select class="form-select" id="model" name="filter_model">
                                <option value="">Please select</option>
                                @foreach($models as $model)
                                <option @if(request()->get('filter_model') == $model->id) selected @endif value="{{ $model->id }}">{{ $model->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-sm-3">
                        <div class="form-group">
                            <label class="form-label">Variant</label>
                            <select class="form-select" id="model"  name="filter_variant" >
                                <option value="">Please select</option>
                                @foreach($variants as $variant)
                                <option @if(request()->get('filter_variant') == $variant->id) selected @endif value="{{ $variant->id }}">{{ $variant->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-sm-2">
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary mt30">Filter</button>
                            <a href="{{ route('buyer.liveStock') }}" class="btn btn-dark ms-1 mt30">Reset</a>
                        </div>
                    </div>
                </div>
            </form>
            </div>
            <table class="table-panel table table-bordered table-striped table-centered mb-0">
                <thead>
                    <tr>
                        <th><strong>Vehicle Description</strong></th>
                        <th><strong>Body</strong></th>
                        <td class="text-center"><strong>Specification</strong></td>
                        <td><strong>Color</strong></td>
                        <td><strong>Model Series</strong></td>
                        <td class="text-center"><strong>Action</strong></td>
                    </tr>
                </thead>
                <tbody>
                    @if($seller_cars && count($seller_cars))
                    @foreach($seller_cars as $seller_car)
                    <tr>
                        <td><a href="{{ route('buyer.viewStock', $seller_car->id) }}">{{ $seller_car->car->carMake->name }} {{ $seller_car->car->carRange->name }}</a></td>
                        <td>{{ $seller_car->car_body ?? $seller_car->car->body_shape.' '.$seller_car->car->body_style }}</span></td>
                        <td class="text-center">{{ $seller_car->car_spec ?? $seller_car->car->carModel->name }}</td>
                        <td>{{ $seller_car->car_color }}</td>
                        <td>{{ @$seller_car->car->CarModelSeries->name }}</td>
                        <td class="text-center"><a class="btn btn-primary btn-sm" href="{{ route('buyer.viewStock', $seller_car->id) }}"><i class="dripicons-preview"></i></a></td>
                    </tr>
                    @endforeach
                    @else
                    <tr>
                        <td colspan="7">
                            <div class="no-data">
                                <img src="{{ asset('assets/images/icons/no-data.png') }}" alt="No data available" class="img-fluid">
                                <h3>No data available</h3>
                                <p>Sorry, The data which you are searching for <br/>is not available at the moment</p>
                            </div>
                        </td>
                    </tr>
                    @endif
                    
                </tbody>
            </table>
            

            <nav class="mt-3 mb-3 float-right">
                <ul class="pagination mb-0">
                    {{ $seller_cars->appends(request()->query())->links('pagination::bootstrap-4') }}
                </ul>
            </nav>

            <nav class="mt-3 mb-3 float-right" style="display: none;">
                <ul class="pagination mb-0">
                    <li class="page-item disabled">
                        <a class="page-link" href="#" tabindex="-1" aria-disabled="true">Previous</a>
                    </li>
                    <li class="page-item"><a class="page-link" href="#">1</a></li>
                    <li class="page-item active" aria-current="page">
                        <a class="page-link" href="#">2</a>
                    </li>
                    <li class="page-item"><a class="page-link" href="#">3</a></li>
                    <li class="page-item">
                        <a class="page-link" href="#">Next</a>
                    </li>
                </ul>
            </nav>
        </div>

    </div> <!-- content -->

<!-- Footer Start -->
<footer class="footer">
    <div class="container-fluid">
        <div>
            <script>document.write(new Date().getFullYear())</script> © Trading Platform
        </div>
    </div>
</footer>
<!-- end Footer -->


@endsection
