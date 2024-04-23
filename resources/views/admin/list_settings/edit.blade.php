@extends('layouts.admin.dashboard')

@section('title')
    {{ __('admin/settings.list_settings') }}
@endsection

@section('page_name')
    {{ __('admin/list_settings.edit') }}
@endsection

@section('breadcrumb')
    {{ __('admin/list_settings.list_settings') }}
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
    <form action="{{ route('admin.list_settings.update', $list_settings->id) }}" method="post" enctype="multipart/form-data">
        @csrf
        @method('put')

        <div class="form-group">
            <lable class="" for="">{{ __('admin/list_settings.facebook') }}</lable>
            <input type="text" name="facebook" class="form-control"
                value="{{ old('facebook', $list_settings->facebook) }}" />
        </div>

        <div class="form-group">
            <lable for="">{{ __('admin/list_settings.x') }}</lable>
            <input type="text" name="x" class="form-control"
                value="{{ old('x', $list_settings->x) }}">
        </div>
        <div class="form-group">
            <lable for="">{{ __('admin/list_settings.linkedin') }}</lable>
            <input type="text" name="linked_in" class="form-control"
                value="{{ old('linked_in', $list_settings->linked_in) }}">
        </div>
        <div class="form-group">
            <lable for="">{{ __('admin/list_settings.instagram') }}</lable>
            <input type="text" name="instagram" class="form-control"
            value="{{ old('instagram', $list_settings->instagram) }}">
        </div>
        <div class="form-group">
            <lable for="">{{ __('admin/list_settings.phone') }}</lable>
            <input type="text" name="phone" class="form-control"
            value="{{ old('phone', $list_settings->phone) }}">
        </div>
        <div class="form-group">
            <lable for="">{{ __('admin/list_settings.email') }}</lable>
            <input type="text" name="email" class="form-control"
            value="{{ old('email', $list_settings->email) }}">
        </div>

        <div class="form-group">
            <button type="submit" class="btn btn-success">{{ __('admin/settings.update') }}</button>
        </div>
    </form>
</div>
@endsection
