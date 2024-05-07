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
                                <td>{{ $news->title }}</td>
                            </tr>
                            <tr>
                                <td class="width30">{{ __('admin/news_ads.content') }}</td>
                                <td>{{ $news->content }}</td>
                            </tr>
                            <tr>
                                <td class="width30">{{ __('admin/news_ads.status') }}</td>
                                <td>
                                    @if($news->status == "active"){{ __('admin/news_ads.active') }}
                                    @else {{ __('admin/news_ads.archive') }}
                                    @endif
                                </td>
                            </tr>
                            <tr>
                                <td class="width30">{{ __('admin/news_ads.tags') }}</td>
                                <td>
                                @foreach ($tags as $item)
                                    {{ $item->value }} <br> 
                                 @endforeach

                                </td>
                            </tr>
                            <tr>
                                <td class="width30">{{ __('admin/news_ads.image') }}</td>
                                <td>
                                    <div class="image">
                                        <img src="{{ $news->image_url }}" alt="{{ __('admin/news_ads.image') }}"
                                            class="custom_img">
                                    </div>

                                </td>
                            </tr>
                            <tr>
                                <td class="width30">{{ __('admin/blog.writer') }}</td>
                                <td>
                                    {{ $writer }}

                                </td>
                            </tr>
                            <tr>
                                <td class="width30">{{ __('admin/news_ads.views') }}</td>
                                <td>
                                    {{ $news->views }}
                                </td>
                            </tr>
                            <tr>
                                <td class="width30">{{ __('admin/blog.create_at') }}</td>
                                <td>
                                    {{ $news->created_at->shortAbsoluteDiffForHumans() }}
                                </td>
                            </tr>
                            {{-- <tr>
                                <td class="width30">{{ __('admin/settings.edit') }}</td>
                                <td>
                                    <a href="{{ route('admin.settings.edit') }}"><button
                                            class="btn btn-info">{{ __('admin/settings.edit') }}</button></a>
                                </td>
                            </tr> --}}

                        </thead>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
