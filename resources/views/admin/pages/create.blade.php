@extends('layouts.admin.dashboard')

@section('title')
    {{ __('admin/pages.page_create') }}
@endsection

@section('page_name')
    {{ __('admin/pages.page_create') }}
@endsection

@section('breadcrumb')
    {{ __('admin/pages.pages') }}
@endsection
@section('content')
    <form action="{{ route('admin.store-page') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-group col-md-12">
            <label>{{ __('admin/pages.title_ar') }}</label>
            <input type="text" name="title_ar" class="form-control">
        </div>
        <div class="form-group col-md-12">
            <label>{{ __('admin/pages.title_en') }}</label>
            <input type="text" name="title_en" class="form-control">
        </div>

        <div class="form-group col-md-12">
            <label>{{ __('admin/pages.content_ar') }}</label>
            <textarea  name="content_ar" class="form-control" id="editor1" cols="50" rows="10"></textarea>
        </div>
        <div class="form-group col-md-12">
            <label>{{ __('admin/pages.content_en') }}</label>
            <textarea  name="content_en" class="form-control" id="editor2" cols="50" rows="10"></textarea>
        </div>

        <div class="form-group col-md-12">
            <label>{{ __('admin/pages.tags') }}</label>
            <input type="text" name="tags" class="form-control">
        </div>
        <div class="form-group">
            <button type="submit" class="btn btn-primary ml-3">{{ __('admin/general.save') }}</button>
        </div>
    </form>
@endsection
@section('css')
<link href="{{ asset('css/dist/tagify.css') }}" rel="stylesheet" type="text/css" />
@endsection
@section('js')
<script src="{{ asset('js/dist/tagify.js') }}"></script>
<script src="{{ asset('js/dist/tagify.polyfills.min.js') }}"></script>
{{-- <script>
    CKEDITOR.replace('editor');
</script> --}}
<script>
    var inputElm = document.querySelector('[name=tags]');
    tagify = new Tagify (inputElm);

    ClassicEditor
        .create(document.querySelector('#editor1') ,   
        {
            ckfinder:
            {
                uploadUrl: "{{ route('admin.store-image' , ['_token' => csrf_token()]) }}",
            }
        })
        .then(editor => {
            // console.log(editor);
        })
        .catch(error => {
            // console.error(error);
        });

    ClassicEditor
        .create(document.querySelector('#editor2') ,   
        {
            ckfinder:
            {
                uploadUrl: "{{ route('admin.store-image' , ['_token' => csrf_token()]) }}",
            }
        })
        .then(editor => {
            // console.log(editor);
        })
        .catch(error => {
            // console.error(error);
        });
</script>

@endsection 

