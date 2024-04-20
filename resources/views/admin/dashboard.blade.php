@extends('layouts.dashboard')

@section('title')

{{ __('main.admin_dash') }}
    
@endsection

@section('page_name')
    {{ __('main.home') }}
@endsection

@section('breadcrumb')
    Start
@endsection
@section('content')
    <a href="{{ route('lang' , 'en') }}">HELLO ESLAM</a>
@endsection


{{-- $admin = new App\Models\Admin();
$admin->name = 'Eslam';
$admin->email = 'eslam@admin.com';
$admin->password = Hash::make('password');
$admin->save(); --}}