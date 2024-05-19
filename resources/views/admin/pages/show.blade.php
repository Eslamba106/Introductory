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
    @if (session()->has('locale') && session()->get('locale') == 'ar')
        {!! $page->content_ar !!}
    @else
        {!! $page->content_en !!}
    @endif
    <hr>
    <hr>
    @foreach ($tags as $item)
        {{ $item->value }} <br>
    @endforeach
@endsection
