@extends('layouts.moderator.dashboard')

@section('title')
    {{ __('admin/blog.show') }}
@endsection

@section('page_name')
    {{ __('admin/blog.show') }}
@endsection

@section('breadcrumb')
    {{ __('admin/blog.articals') }}
@endsection
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">{{ __('admin/blog.show') }}</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <table id="example2" class="table table-bordered table-hover">
                        <thead>
                            <tr>
                                <td class="width30">{{ __('admin/blog.title') }}</td>
                                <td>{{ $artical->title }}</td>
                            </tr>
                            <tr>
                                <td class="width30">{{ __('admin/blog.content') }}</td>
                                <td>{{ $artical->content }}</td>
                            </tr>
                            <tr>
                                <td class="width30">{{ __('admin/blog.status') }}</td>
                                <td>
                                    {{ $artical->status }}

                                </td>
                            </tr>
                            <tr>
                                <td class="width30">{{ __('admin/blog.tags') }}</td>
                                <td>
                                @foreach ($tags as $item)
                                    {{ $item->value }} <br> 
                                 @endforeach

                                </td>
                            </tr>
                            <tr>
                                <td class="width30">{{ __('admin/blog.image') }}</td>
                                <td>
                                    <div class="image">
                                        <img src="{{ $artical->image_url }}" alt="{{ __('admin/blog.image') }}"
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
                                <td class="width30">{{ __('admin/blog.create_at') }}</td>
                                <td>
                                    {{ $artical->created_at->shortAbsoluteDiffForHumans() }}
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
