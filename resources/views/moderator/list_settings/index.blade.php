@extends('layouts.admin.dashboard')

@section('title')
    {{ __('admin/settings.settings') }}
@endsection

@section('page_name')
    {{ __('admin/list_settings.list_settings') }}
@endsection

@section('breadcrumb')
    {{ __('admin/settings.settings') }}
@endsection
@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">{{ __('admin/list_settings.info') }}</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                <table id="example2" class="table table-bordered table-hover">
                    <thead>
                        <tr>
                            <td class="width30">{{ __('admin/list_settings.facebook') }}</td>
                            <td>{{ $list_settings->facebook}}</td>
                        </tr>
                        <tr>
                            <td class="width30">{{ __('admin/list_settings.x') }}</td>
                            <td>{{ $list_settings->x }}</td>
                        </tr>
                        <tr>
                            <td class="width30">{{ __('admin/list_settings.linkedin') }}</td>
                            <td>
                                {{ $list_settings->linked_in }}
                                
                            </td>
                        </tr>
                        <tr>
                            <td class="width30">{{ __('admin/list_settings.instagram') }}</td>
                            <td>
                                {{ $list_settings->instagram }}
                                
                            </td>
                        </tr>
                        <tr>
                            <td class="width30">{{ __('admin/list_settings.phone') }}</td>
                            <td>
                                {{ $list_settings->phone }}
                                
                            </td>
                        </tr>
                        <tr>
                            <td class="width30">{{ __('admin/list_settings.email') }}</td>
                            <td>
                                {{ $list_settings->email }}
                                
                            </td>
                        </tr>

                        <tr>
                            <td class="width30">{{ __('admin/general.last_update') }}</td>
                            <td>
                                {{ $list_settings->updated_at->shortAbsoluteDiffForHumans() }}
                            </td>
                        </tr>
                        <tr>
                            <td class="width30">{{ __('admin/settings.edit') }}</td>
                            <td>
                                <a href="{{ route('admin.list_settings.edit') }}"><button class="btn btn-info">{{ __('admin/settings.edit') }}</button></a>
                            </td>
                        </tr>

                    </thead>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
