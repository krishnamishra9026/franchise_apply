@extends('layouts.admin')
@section('title', 'Live Stock')
@section('content')

<div class="content">
    <!-- Topbar Start -->
    
    <!-- end Topbar -->

    <div class="container-fluid">
        <div class="filter mt-3 mb-2" style="clear: both">
            <form action="{{ route('admin.live-stock') }}">
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
                    <div class="col-sm-3" style="display:none;">
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
                            <label class="form-label">Specification</label>
                            <select class="form-select" id="model"  name="filter_variant" >
                                <option value="">Please select</option>
                                @foreach($variants as $variant)
                                <option @if(request()->get('filter_variant') == $variant->id) selected @endif value="{{ $variant->id }}">{{ $variant->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                     <div class="col-sm-3">
                        <div class="form-group">
                            <label class="form-label">Model Series </label>
                            <select class="form-select" name="filter_model_series">
                                <option value="">Please select</option>
                                @foreach($ranges as $range)
                                <option @if(request()->get('filter_model_series') == $range->id) selected @endif value="{{ $range->id }}">{{ $range->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-sm-2">
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary mt30">Filter</button>
                            <a href="{{ route('admin.live-stock') }}" class="btn btn-dark ms-1 mt30">Reset</a>
                        </div>
                    </div>
                </div>
            </form>
        </div>
        <div class="table-responsive">
            <table class="table-panel table table-bordered table-centered mb-0">
                <thead>
                    <tr>
                        <th><strong>Vehicle Description</strong></th>
                        <th><strong>Body</strong></th>
                        <td class="text-center"><strong>Specification</strong></td>
                        <th><strong>Model Series</strong></th>
                        <td>Sellers</td>
                        <td class="text-center" style="min-width: 120px"><strong>Action</strong></td>
                    </tr>
                </thead>
                <tbody>
                    @if($cars && count($cars))
                    @foreach($cars as $car)
                    <tr>
                        <td><a href="#">{{ $car->carMake->name }} {{ $car->carRange->name }}</a></td>
                        <td>{{ $car->body_shape }} {{ $car->body_style }}</td>
                        <td>{{ $car->carModel->name }}</td>
                        <td>{{ @$car->carModelSeries->name }}</td>
                        <td>
                            <span class="badge bg-danger text-light">{{ $car->sellers->count() }}</span>
                            <button type="button" class="ms-2 btn btn-light dropdown-toggle btn-sm" data-bs-toggle="dropdown" aria-expanded="false">View seller listing</button>
                            <div class="dropdown-menu">
                                <ul class="list-group">
                                    @foreach($car->sellers as $seller)
                                    <li class="dropdown-item list-group-item"><a href="{{ route('admin.view-live-stock', ['id' => $car->id, 'seller_id' => $seller->id]) }}">{{$seller->firstname}} {{$seller->lastname}} - £{{ getCarSellerPriceGrandTotal($car->id, $seller->id) }}</a> <a class="btn btn-primary btn-sm" href="{{ route('admin.view-live-stock', ['id' => $car->id, 'seller_id' => $seller->id]) }}"><i class="mdi mdi-eye"></i></a></li>
                                    @endforeach
                                </ul>
                            </div>
                        </td>
                        <td class="text-center" style="min-width: 120px">      
                        <!-- onclick="confirmDelete({{ $car->id }})" -->                      
                            <!-- <a class="ml-2 btn btn-danger btn-sm"  href="#"><i class="dripicons-trash"></i></a> -->
                            <a class="btn btn-primary btn-sm" href="{{ route('admin.view-stock', $car->id) }}"><i class="mdi mdi-eye"></i></a>
                        </td>
                        <form id='delete-form{{ $car->id }}'
                            action='{{ route('admin.buyers.destroy', $car->id) }}'
                            method='POST'>
                            <input type='hidden' name='_token'
                            value='{{ csrf_token() }}'>
                            <input type='hidden' name='_method' value='DELETE'>
                        </form>
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
        </div>

        <div class="col-12 bordertop paginate" style="float: right;">
            {{ $cars->appends(request()->query())->links('pagination::bootstrap-4') }}
        </div>

    </div>

</div>

@endsection


@push('scripts')

<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script type="text/javascript">
    function confirmDelete(no) {
        Swal.fire({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!'
        }).then((result) => {
            if (result.isConfirmed) {
                document.getElementById('delete-form' + no).submit();
            }
        })
    };
</script>
@endpush