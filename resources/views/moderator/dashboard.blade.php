@extends('layouts.admin.dashboard')

@section('title')

{{ __('main.admin_dash') }}
    
@endsection

@section('page_name')
    {{ __('main.home') }}
@endsection

@section('breadcrumb')
{{ __('main.home') }}
@endsection
@section('content')

@endsection


{{-- $admin = new App\Models\Admin();
$admin->name = 'Eslam';
$admin->email = 'eslam@admin.com';
$admin->password = Hash::make('password');
$admin->save(); --}}