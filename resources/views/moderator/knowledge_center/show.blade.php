@extends('layouts.moderator.dashboard')

@section('title')
    {{ __('admin/knowledge.show') }}
@endsection

@section('page_name')
    {{ __('admin/knowledge.show') }}
@endsection

@section('breadcrumb')
    {{ __('admin/knowledge.knowledge') }}
@endsection
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">{{ __('admin/knowledge.show') }}</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <table id="example2" class="table table-bordered table-hover">
                        <thead>
                            <tr>
                                <td class="width30">{{ __('admin/knowledge.title') }}</td>
                                <td>{{ $knowledge->title }}</td>
                            </tr>
                            <tr>
                                <td class="width30">{{ __('admin/knowledge.content') }}</td>
                                <td>{{ $knowledge->content }}</td>
                            </tr>
                            <tr>
                                <td class="width30">{{ __('admin/knowledge.department') }}</td>
                                <td>{{ $department->name }}</td>
                            </tr>

                            <tr>
                                <td class="width30">{{ __('admin/knowledge.tags') }}</td>
                                <td>
                                    @foreach ($tags as $item)
                                        {{ $item->value }} <br>
                                    @endforeach

                                </td>
                            </tr>
                            <tr>
                                <td class="width30">{{ __('admin/knowledge.image') }}</td>
                                <td>
                                    <div class="image">
                                        <img src="{{ $knowledge->image_url }}" alt="{{ __('admin/blog.image') }}"
                                            class="custom_img">
                                    </div>

                                </td>
                            </tr>

                            <tr>
                                <td class="width30">{{ __('admin/knowledge.created_at') }}</td>
                                <td>
                                    {{ $knowledge->created_at->shortAbsoluteDiffForHumans() }}
                                </td>
                            </tr>


                        </thead>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
