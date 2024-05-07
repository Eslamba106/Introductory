@extends('layouts.moderator.dashboard')

@section('title')
    {{ __('admin/news.news_ads') }}
@endsection

@section('page_name')
    {{ __('admin/news.news') }}
@endsection

@section('breadcrumb')
    {{ __('admin/news.news_ads') }}
@endsection
@section('content')
    <!-- Start Create Category !-->
    @can('create')
        <div class="m-2">
            <a href="" class="btn btn-sm btn-outline-primary mr-2" href="#" data-toggle="modal"
                data-target="#add_category">{{ __('admin/news_ads.add_news') }}</a>
        </div>
    @endcan
    @can('create')
        <div class="modal fade" id="add_category" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">{{ __('admin/news_ads.add_news') }}</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        <form action="{{ route('user.news_ads.store') }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="modal-body">
                                <div class="form-group">
                                    <label for="">{{ __('admin/news_ads.title') }}</label>
                                    <input class="form-control" type="text" name="title">
                                </div>
                                <div class="form-group">
                                    <label for="">{{ __('admin/news_ads.content') }}</label>
                                    <textarea class="form-control" name="content"></textarea>
                                </div>
                                <div class="form-group">
                                    <label for="">{{ __('admin/news_ads.status') }}</label>
                                    <select class="form-control" name="status" id="">
                                        <option value="active">{{ __('admin/blog.active') }}</option>
                                        <option value="archive">{{ __('admin/blog.archive') }}</option>
                                    </select>
                                </div>
                                {{-- <div class="form-group">
                                <label for="">{{ __('admin/news_ads.status') }}</label>
                                <input class="form-control" type="text" name="status">
                            </div> --}}
                                <div class="form-group">
                                    <label for="">{{ __('admin/news_ads.tags') }}</label>
                                    <input class="form-control" type="text" name="tags">
                                </div>
                                <div class="form-group">
                                    <label for="">{{ __('admin/news_ads.category') }}</label>
                                    <select class="form-control" name="news_category_id" id="">
                                        <option value="0"></option>
                                        @foreach ($news_categories as $item)
                                            <option value="{{ $item->id }}">{{ $item->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="">{{ __('admin/news_ads.image') }}</label>
                                    <input class="form-control" type="file" name="image">
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary"
                                    data-dismiss="modal">{{ __('admin/blog.cancel') }}</button>
                                <button type="submit" class="btn btn-success">{{ __('admin/blog.save') }}</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    @endcan
    <!-- End Create Category !-->

    @can('delete')
        <!-- Start Delete Category !-->
        <div class="modal fade" id="delete_news" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">{{ __('admin/news_ads.delete') }}</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        <form action="{{ route('user.news_ads.delete') }}" method="post">
                            @method('delete')
                            @csrf

                            <div class="modal-body">
                                {{ __('admin/blog.sure') }}
                                <input type="hidden" name="id" id="news_id" value="">

                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary"
                                    data-dismiss="modal">{{ __('admin/blog.cancel') }}</button>
                                <button type="submit" class="btn btn-danger">{{ __('admin/blog.delete') }}</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    @endcan

    <!-- End Delete Category !-->


    <table class="table">
        <thead>
            <tr>
                <th>{{ __('admin/moderator.name') }}</th>
                <th>{{ __('admin/moderator.created_at') }}</th>
                <th colspan="2">{{ __('admin/pages.operation') }}</th>
            </tr>
        </thead>
        <tbody>
            <x-alert type="success" />
            <x-alert type="info" />
            <x-alert type="fail" />
            {{-- @if ($products->count()) --}}
            @forelse ($news as $item)
                <tr>
                    <td>{{ $item->title }}</td>
                    <td>{{ $item->created_at->shortAbsoluteDiffForHumans() }}</td>
                    @can('edit')
                        <td>
                            <a href="{{ route('user.news_ads.edit', $item->id) }}"
                                class="btn btn-sm btn-outline-success">{{ __('admin/news_ads.edit') }}</a>
                        </td>
                    @endcan

                    {{-- <td>
                        <a href="" class="btn btn-sm btn-outline-success" data-toggle="modal"
                            data-category_edit_id="{{ $item->id }}"
                            data-target="#edit_category">{{ __('admin/news_ads.edit') }}</a>
                    </td> --}}

                    <td>
                        <a href="{{ route('user.news_ads.show', $item->id) }}"
                            class="btn btn-sm btn-outline-info">{{ __('admin/news_ads.show') }}</a>
                    </td>
                    @can('delete')
                        <td>
                            <a href="" class="btn btn-sm btn-outline-danger" data-toggle="modal"
                                data-news_id="{{ $item->id }}"
                                data-target="#delete_news">{{ __('admin/news_ads.delete') }}</a>
                        </td>
                    @endcan


                </tr>
            @empty
                <tr>
                    <td colspan="7">{{ __('admin/news_ads.no_news') }}</td>
                </tr>
            @endforelse
            {{-- @else

        @endif --}}
        </tbody>
    </table>
    {{ $news->withQueryString()->appends(['search' => 1])->links() }}
@endsection

@section('css')
    <link href="{{ asset('css/dist/tagify.css') }}" rel="stylesheet" type="text/css" />
@endsection
@section('js')
    <script src="{{ asset('js/dist/tagify.js') }}"></script>
    <script src="{{ asset('js/dist/tagify.polyfills.min.js') }}"></script>
    <script>
        var inputElm = document.querySelector('[name=tags]');
        tagify = new Tagify(inputElm);
    </script>

    <script>
        $('#delete_news').on('show.bs.modal', function(event) {
            var button = $(event.relatedTarget)
            var news_id = button.data('news_id')
            var modal = $(this)
            modal.find('.modal-body #news_id').val(news_id);
        })
    </script>
@endsection
