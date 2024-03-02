@extends('layouts.admin')
@section('title', 'Stock')
@section('content')

<div class="content">


    <div class="container-fluid">
        @include('admin.includes.flash-message')
        <div class="float-right mt-3">
            <a href="{{ route('admin.stock-import') }}" class="btn btn-success">Import CSV</a>
        </div>
        <div class="filter mt-3 mb-2" style="clear: both">
            <form action="{{ route('admin.stock') }}">
                <div class="row">
                    <div class="col-sm-2">
                        <div class="form-group">
                            <label class="form-label">Manufacturer</label>
                            <select class="form-select" id="manufacturer" name="filter_manufacturer" value="{{ request()->get('filter_manufacturer') }}">
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
                            <select class="form-select" id="model" name="filter_model" value="{{ request()->get('filter_model') }}">
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
                            <select class="form-select" id="model"  name="filter_variant" value="{{ request()->get('filter_variant') }}" >
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
                            <a href="{{ route('admin.stock') }}" class="btn btn-dark ms-1 mt30">Reset</a>
                        </div>
                    </div>
                </div>
            </form>
        </div>
        <div class="table-responsive">
            <table class="table-panel table table-bordered table-centered mb-0">
                <thead>
                    <tr>
                        <th><strong>Vehicle</strong></th>
                        <th><strong>Variant</strong></th>
                        <th><strong>Range</strong></th>
                        <td><strong>Status</strong></td>
                        <td class="text-center" style="min-width: 120px"><strong>Action</strong></td>
                    </tr>
                </thead>
                <tbody>

                    @foreach($cars as $car)
                    <tr>
                        <td><a href="{{ route('admin.view-stock', $car->id) }}">{{ $car->carMake->name }} {{ $car->carRange->name }}</a></td>
                        <td>{{ $car->carModel->name }}</td>
                        <td>{{ @$car->carModelSeries->name }}</td>
                        <td>@if($car->status) Active @else Inactive @endif</td>
                        <td class="text-center" style="min-width: 120px">
                            <a class="btn btn-primary btn-sm" href="{{ route('admin.view-stock', $car->id) }}"><i class="mdi mdi-eye"></i></a>
                            <a class="ml-2 btn btn-danger btn-sm" onclick="confirmDelete({{ $car->id }})"><i class="dripicons-trash"></i></a>
                        </td>
                        <form id='delete-form{{ $car->id }}'
                            action='{{ route('admin.stock.delete', $car->id) }}'
                            method='POST'>
                            <input type='hidden' name='_token'
                            value='{{ csrf_token() }}'>
                            <input type='hidden' name='_method' value='DELETE'>
                        </form>
                    </tr>
                    @endforeach
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