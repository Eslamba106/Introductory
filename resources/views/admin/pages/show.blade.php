@extends('layouts.admin.dashboard')

@section('title')
    {{ $page->title }}
@endsection

@section('page_name')
{{ $page->title }}

@endsection

@section('breadcrumb')
    {{ __('admin/pages.pages') }}
@endsection
@section('content')
    {!! $page->content !!}
    <hr><hr>
    @foreach ($tags as $item)
       {{ $item->value }} <br> 
    @endforeach
    
@endsection