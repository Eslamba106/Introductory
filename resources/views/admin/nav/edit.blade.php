@extends('layouts.admin.dashboard')

@section('title')
    {{ __('admin/settings.edit') }}
@endsection

@section('page_name')
    {{ __('admin/pages.edit') }}
@endsection

@section('breadcrumb')
    {{ __('admin/settings.settings') }}
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
    <form action="{{ route('admin.settings.update', $general_settings->id) }}" method="post" enctype="multipart/form-data">
        @csrf
        @method('put')

        <div class="form-group">
            <lable class="" for="">{{ __('admin/general.webname_ar') }}</lable>
            <input type="text" name="webname_ar" class="form-control"
                value="{{ old('webname_ar', $general_settings->webname_ar) }}" />
        </div>

        <div class="form-group">
            <lable for="">{{ __('admin/general.webname_en') }}</lable>
            <input type="text" name="webname_en" class="form-control"
                value="{{ old('webname_en', $general_settings->webname_en) }}">
        </div>
        <div class="form-group">
            <lable for="">{{ __('admin/general.description_ar') }}</lable>
            <textarea name="description_ar" class="form-control"
                value="{{ old('description_ar', $general_settings->description_ar) }}">{{ old('description_ar', $general_settings->description_ar) }}</textarea>
        </div>
        <div class="form-group">
            <lable for="">{{ __('admin/general.description_en') }}</lable>
            <textarea name="description_en" class="form-control"
                value="{{ old('description_en', $general_settings->description_en) }}">{{ old('description_en', $general_settings->description_en) }}</textarea>
        </div>
        <div class="form-group">
            <lable for="">{{ __('admin/general.logo') }}</lable>
            <input type="file" name="logo" class="form-control" >
        </div>
        <div class="form-group">
            <button type="submit" class="btn btn-success">{{ __('admin/settings.update') }}</button>
        </div>
    </form>
</div>
@endsection
