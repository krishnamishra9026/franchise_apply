@extends('layouts.admin')
@section('title', 'View Stock')
@section('content')

<div class="content">

    <div class="container-fluid">
        
         <section id="basic-vertical-layouts">
        <div class="row match-height">
            <div class="col-12">

                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title"></h4>
                    </div>
                    <div class="card-content">

                        @if(Session::has('error_msg'))
                        <p class="alert {{ Session::get('alert-class', 'alert-info') }}">{{ Session::get('error_msg') }}</p>
                        @endif

                        <div class="card-body import-file">
                            <form class="form form-vertical"
                                  action="{{ route('admin.stock.import-process') }}" method="post">
                                @csrf
                                <div class="row">
                                    <div class="table-responsive">
                                        <table class="table table-borderless">
                                            <thead>
                                            @foreach ($csv_data as $key => $row)
                                                <tr>
                                                    @foreach ($row as $value)
                                                        @if(!$key)
                                                        <th>{{ $value }}</th>
                                                        @else
                                                        <td>{{ $value }}</td>
                                                        @endif
                                                    @endforeach
                                                </tr>
                                            @endforeach
                                            </thead>
                                            <tbody>
                                            <tr>
                                                @foreach ($csv_data[0] as $key => $value)
                                                    <td>
                                                        <select name="fields[{{ $key }}]" class="form-select select2">
                                                            <option value="">Please select</option>
                                                            @foreach (config('app.db_fields') as $db_key => $db_field)
                                                                <option value="{{ $db_key }}">{{ $db_field }}</option>
                                                            @endforeach
                                                        </select>
                                                    </td>
                                                @endforeach
                                            </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-12">
                                        <input type="hidden" name="csv_data_file_id" value="{{ $csv_data_file->id }}"/>
                                        <button type="submit" class="btn btn-primary mt-2 mx-2 mb-1">
                                            <i data-feather="save"></i> Import
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>

                    </div>
                </div>
            </div>


        </div>
    </section>

    </div>
</div>

@endsection