@extends('layouts.admin.dashboard')

@section('title')
    {{ __('admin/job.edit') }}
@endsection

@section('page_name')
    {{ __('admin/job.edit') }}
@endsection

@section('breadcrumb')
    {{ __('admin/job.jobs') }}
@endsection
@section('content')

    <div class="container">
        @if ($errors->any())
            <div class="alert alert-danger">
                <h3>Error Occured!</h3>
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <form action="{{ route('admin.job.update' , $job->id) }}" method="post" enctype="multipart/form-data">
            @method('put')
            @csrf

            <div class="modal-body">
                <div class="form-group">
                    <label for="">{{ __('admin/job.title') }}</label>
                    <input class="form-control" type="text" name="title" value="{{ old('title', $job->title) }}">
                    <input class="form-control" value="{{ $job->id }}" type="hidden" name="id">
                </div>
                <div class="form-group">
                    <label for="">{{ __('admin/job.description') }}</label>
                    <textarea class="form-control" name="description" >{{ old('description', $job->description) }}</textarea>
                </div>
                <div class="form-group">
                    <label for="">{{ __('admin/blog.status') }}</label>
                    <select  class="form-control" name="status" id="">
                        <option value="active">{{ __('admin/blog.active') }}</option>
                        <option value="archive">{{ __('admin/blog.archive') }}</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="">{{ __('admin/blog.department') }}</label>
                    <input class="form-control" name="category" value="{{ old('category', $job->category) }}">
                </div>
                <div class="form-group">
                    <label for="">{{ __('admin/job.feature') }}</label>
                    <input class="form-control" type="text" name="feature" value="{{ old('title', $job->feature) }}">
                </div>
                <div class="form-group">
                    <label for="">{{ __('admin/blog.image') }}</label>
                    <input class="form-control" type="file" name="image">
                </div>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary"
                    data-dismiss="modal">{{ __('admin/blog.cancel') }}</button>
                <button type="submit" class="btn btn-success">{{ __('admin/blog.save') }}</button>
            </div>
        </form>
    </div>







@endsection
@section('css')
<link href="{{ asset('css/dist/tagify.css') }}" rel="stylesheet" type="text/css" />
@endsection

@section('js')

<script src="{{ asset('js/dist/tagify.js') }}"></script>
<script src="{{ asset('js/dist/tagify.polyfills.min.js') }}"></script>
<script>
    var inputElm = document.querySelector('[name=tags]');
    tagify = new Tagify (inputElm);

    ClassicEditor
        .create(document.querySelector('#editor') ,   
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