@extends('layouts.admin.dashboard')

@section('title')
    {{ __('admin/settings.settings') }}
@endsection

@section('page_name')
    {{ __('admin/settings.settings') }}
@endsection

@section('breadcrumb')
    {{ __('admin/settings.settings') }}
@endsection
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">{{ __('admin/settings.info') }}</h3>
                </div>
                @if ($general_settings)
                    <!-- /.card-header -->
                    <div class="card-body">
                        <table id="example2" class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <td class="width30">{{ __('admin/general.webname_en') }}</td>
                                    <td>{{ $general_settings->webname_en }}</td>
                                </tr>
                                <tr>
                                    <td class="width30">{{ __('admin/general.webname_ar') }}</td>
                                    <td>{{ $general_settings->webname_ar }}</td>
                                </tr>
                                <tr>
                                    <td class="width30">{{ __('admin/general.description_en') }}</td>
                                    <td>
                                        {{ $general_settings->description_en }}

                                    </td>
                                </tr>
                                <tr>
                                    <td class="width30">{{ __('admin/general.description_ar') }}</td>
                                    <td>
                                        {{ $general_settings->description_ar }}

                                    </td>
                                </tr>
                                <td class="width30">{{ __('admin/general.logo') }}</td>
                                <td>
                                    <div class="image">
                                        <img src="{{ $general_settings->image_url }}" alt="{{ __('admin/general.logo') }}"
                                            class="custom_img">
                                        {{-- <img src="{{ asset('storage/' . $general_settings->logo) }}" alt="{{ __('admin/general.logo') }}"
                                        class="custom_img"> --}}
                                    </div>

                                </td>

                                <tr>
                                    <td class="width30">{{ __('admin/general.last_update') }}</td>
                                    <td>
                                        {{ $general_settings->updated_at->shortAbsoluteDiffForHumans() }}
                                    </td>
                                </tr>
                                <tr>
                                    <td class="width30">{{ __('admin/settings.edit') }}</td>
                                    <td>
                                        <a href="{{ route('admin.settings.edit') }}"><button
                                                class="btn btn-info">{{ __('admin/settings.edit') }}</button></a>
                                    </td>
                                </tr>

                            </thead>
                        </table>
                    </div>
                @endif
            </div>
        </div>
    </div>
@endsection
