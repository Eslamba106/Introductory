@extends('layouts.moderator.dashboard')

@section('title')
    {{ __('admin/knowledge.edit') }}
@endsection

@section('page_name')
    {{ __('admin/knowledge.edit') }}
@endsection

@section('breadcrumb')
    {{ __('admin/knowledge.knowledge') }}
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
        @can('edit')
            <form action="{{ route('user.knowledge_center.update', $knowledge->id) }}" method="post"
                enctype="multipart/form-data">
                @method('put')
                @csrf

                <div class="modal-body">
                    <div class="form-group">
                        <label for="">{{ __('admin/knowledge.title') }}</label>
                        <input class="form-control" type="text" name="title" value="{{ old('title', $knowledge->title) }}">
                        <input class="form-control" type="hidden" name="id" value="{{ $knowledge->id }}">
                    </div>
                    <div class="form-group">
                        <label for="">{{ __('admin/knowledge.content') }}</label>
                        <textarea class="form-control" name="content" value="">{{ old('content', $knowledge->content) }}</textarea>
                    </div>
                    <div class="form-group">
                        <label for="">{{ __('admin/knowledge.department') }}</label>
                        <select class="form-control" name="knowledge_category_id" id="">
                            @forelse($departments as $item)
                                <option value="{{ $item->id }}">{{ $item->name }}</option>
                            @empty
                                <option value=""></option>
                            @endforelse
                        </select>
                    </div>
                    <div>
                        <label for="">{{ __('admin/knowledge.tags') }}</label>
                        <input class="form-control" type="text" name="tags" value="{{ old('title', $knowledge->tags) }}">
                    </div>
                    <div class="form-group">
                        <label for="">{{ __('admin/knowledge.image') }}</label>
                        <input class="form-control" type="file" name="image">
                    </div>

                </div>
                <div class="modal-footer">

                    <button type="submit" class="btn btn-success">{{ __('admin/blog.save') }}</button>
                </div>
            </form>
        @endcan
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
        tagify = new Tagify(inputElm);
    </script>
@endsection
