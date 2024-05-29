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
    <form action="{{ route('admin.nav.update', $general_settings->id) }}" method="post" enctype="multipart/form-data">
        @csrf
        @method('put')

        <div class="form-group">
            <lable class="" for="">{{ __('admin/general.webname_ar') }}</lable>
            <input type="text" name="name_ar" class="form-control"
                value="{{ old('name_ar', $general_settings->name_ar) }}" />
        </div>

        <div class="form-group">
            <lable for="">{{ __('admin/general.webname_en') }}</lable>
            <input type="text" name="name_en" class="form-control"
                value="{{ old('name_en', $general_settings->name_en) }}">
        </div>
        <div class="form-group">
            <lable for="">{{ __('admin/general.description_ar') }}</lable>
            <textarea name="description_ar" class="form-control"
                value="{{ old('description_ar', $general_settings->description_ar) }}">{{ old('description_ar', $general_settings->description_ar) }}</textarea>
        </div>
        <div class="form-group">

            <lable for="">{{ __('admin/general.department') }}</lable>
            <select name="parent_id" id="validationCustom01" class="form-control">
                <option value="0">{{ __('admin/general.main') }}</option>
                @if ($navs)
                    @foreach ($navs as $item)
                        <option value="{{ $item->id }}">
                            @if (session()->has('locale') && session()->get('locale') == 'ar')
                                {{ $item->name_ar }}
                            @else
                                {{ $item->name_en }}
                            @endif
                        </option>
                    @endforeach
                @endif
            </select>
            {{-- <input type="text" name="parent_id" class="form-control" > --}}
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
