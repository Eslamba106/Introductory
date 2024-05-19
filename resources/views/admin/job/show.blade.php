@extends('layouts.admin.dashboard')

@section('title')
    {{ __('admin/news_ads.show') }}
@endsection

@section('page_name')
    {{ __('admin/news_ads.show') }}
@endsection

@section('breadcrumb')
    {{ __('admin/news_ads.news') }}
@endsection
@section('content')
    @forelse ($applications as $item)
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">{{ __('admin/news_ads.show') }}</h3>
                    </div>
                    <!-- /.card-header -->

                    <div class="card-body">
                        <table id="example2" class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <td class="width30">{{ __('admin/news_ads.title') }}</td>
                                    <td>{{ $item->name }}</td>
                                </tr>
                                <tr>
                                    <td class="width30">{{ __('admin/news_ads.content') }}</td>
                                    <td>{{ $item->application_code }}</td>
                                </tr>
                                {{-- <tr>
                                <td class="width30">{{ __('admin/news_ads.status') }}</td>
                                <td>
                                    <td>{{ $item->application_code }}</td>
                                </td>
                            </tr> --}}
                                <tr>
                                    <td class="width30">{{ __('admin/news_ads.tags') }}</td>
                                    <td>
                                        {{ $item->email }}
                                    </td>
                                </tr>
                                <tr>
                                    <td class="width30">{{ __('admin/news_ads.image') }}</td>
                                    <td>
                                        <div class="image">
                                            <img src="{{ $item->image_url }}" alt="{{ __('admin/news_ads.image') }}"
                                                class="custom_img">
                                        </div>

                                    </td>
                                </tr>
                                <tr>
                                    <td class="width30">{{ __('admin/blog.writer') }}</td>
                                    <td>
                                        {{ $item->phone }}

                                    </td>
                                </tr>

                                <tr>
                                    <td class="width30">{{ __('admin/blog.create_at') }}</td>
                                    <td>
                                        {{ $item->created_at->shortAbsoluteDiffForHumans() }}
                                    </td>
                                </tr>


                            </thead>
                        </table>
                    </div>


                </div>
            </div>
        </div>
    @empty
    @endforelse
@endsection
