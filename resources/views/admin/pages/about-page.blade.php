@extends('layouts.admin')
@section('title', 'About page')
@section('head')
<link href="{{ asset('assets/summernote/summernote-bs4.css') }}" rel="stylesheet" type="text/css" />
@endsection
@section('content')

<div class="content">
    <!-- Topbar Start -->
    @include('admin.includes.navbar')
    <!-- end Topbar -->

    <div class="container-fluid">
        <div class="card mt-3 mb-2">
            <div class="card-body">
               <form method="POST" action="{{ route('admin.page.store') }}" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="type" value="about">
                    <div class="form-group">
                        <label class="form-label">Meta title</label>
                        <input type="text" name="meta_title" class="form-control" placeholder="Meta title" value="{{ (isset($page))?old('meta_title',$page->meta_title):old('meta_title') }}">
                           @error('meta_title')
                                <code class="text-danger">{{ $message }}</code>
                            @enderror
                    </div>
                    <div class="form-group">
                        <label class="form-label">Meta description</label>
                        <textarea name="meta_description" cols="30" rows="3" class="form-control" placeholder="Meta description">{{ (isset($page))?old('meta_description',$page->meta_description):old('meta_description') }}</textarea>
                           @error('meta_description')
                                <code class="text-danger">{{ $message }}</code>
                            @enderror
                    </div>
                    <div class="form-group">
                        <label class="form-label">About Us</label>
                        <textarea name="section_1" cols="30" rows="5" class="form-control summernote" placeholder="About Us">{{ (isset($page))?old('section_1',$page->section_1):old('section_1') }}</textarea>
                    </div>
                    <div class="form-group">
                        <label class="form-label">Trade Buyers</label>
                        <textarea name="section_2" cols="30" rows="5" class="form-control summernote" placeholder="Trade Buyers">{{ (isset($page))?old('section_2',$page->section_2):old('section_2') }}</textarea>
                    </div>
                    <div class="form-group">
                        <label class="form-label">our company</label>
                        <textarea name="section_3" cols="30" rows="5" class="form-control summernote" placeholder="our company">{{ (isset($page))?old('section_3',$page->section_3):old('section_3') }}</textarea>
                    </div>
                   
                    <div class="form-group">
                        <input type="Submit" value="Submit" class="btn btn-primary">
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
@push('scripts')
<script type="text/javascript" src="{{ asset('assets/summernote/summernote-bs4.min.js') }}"></script>
<script type="text/javascript">
    $(document).ready(function() {
  $('.summernote').summernote({
        tabsize: 5,
        height: 200
      });
});
</script>
@endpush