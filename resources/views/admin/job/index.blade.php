@extends('layouts.admin.dashboard')

@section('title')
    {{ __('admin/job.jobs') }}
@endsection

@section('page_name')
    {{ __('admin/job.jobs') }}
@endsection

@section('breadcrumb')
    {{ __('admin/job.jobs') }}
@endsection
@section('content')
    <!-- Start Create Category !-->
    <div class="m-2">
        <a href="" class="btn btn-sm btn-outline-primary mr-2" href="#" data-toggle="modal"
            data-target="#add_category">{{ __('admin/job.add_job') }}</a>
    </div>
    <div class="modal fade" id="add_category" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">{{ __('admin/job.add_job') }}</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <form action="{{ route('admin.job.store') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="modal-body">
                            <div class="form-group">
                                <label for="">{{ __('admin/news_ads.title') }}</label>
                                <input class="form-control" type="text" name="title">
                            </div>
                            <div class="form-group">
                                <label for="">{{ __('admin/job.description') }}</label>
                                <textarea class="form-control" name="description"></textarea>
                            </div>
                            {{-- <div class="form-group">
                                <label for="">{{ __('admin/job.feature') }}</label>
                                <textarea class="form-control" name="feature"></textarea>
                            </div> --}}
                            <div class="form-group">
                                <label for="">{{ __('admin/job.feature') }}</label>
                                <input class="form-control" type="text" name="features">
                            </div>
                            <div class="form-group">
                                <label for="">{{ __('admin/job.count') }}</label>
                                <input class="form-control" type="text" name="count">
                            </div>
                            <div class="form-group">
                                <label for="">{{ __('admin/news_ads.status') }}</label>
                                <select class="form-control" name="status" id="">
                                    <option value="active">{{ __('admin/blog.active') }}</option>
                                    <option value="archive">{{ __('admin/blog.archive') }}</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="">{{ __('admin/news_ads.category') }}</label>
                                <input class="form-control" type="text" name="category">
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
    <!-- End Create Category !-->


 

    <!-- Start Delete Category !-->
    <div class="modal fade" id="delete_news" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">{{ __('admin/job.delete') }}</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <form action="{{ route('admin.job.delete') }}" method="post">
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
    <!-- End Delete Category !-->


    <table class="table">
        <thead>
            <tr>
                <th>{{ __('admin/job.title') }}</th>
                <th>{{ __('admin/moderator.created_at') }}</th>
                <th colspan="2">{{ __('admin/pages.operation') }}</th>
            </tr>
        </thead>
        <tbody>
            <x-alert type="success" />
            <x-alert type="info" />
            <x-alert type="fail" />
            {{-- @if ($products->count()) --}}
            @forelse ($jobs as $item)
                <tr>
                    <td>{{ $item->title }}</td>
                    <td>{{ $item->created_at->shortAbsoluteDiffForHumans() }}</td>

                    <td>
                        <a href="{{ route('admin.job.edit' , $item->id) }}" class="btn btn-sm btn-outline-success">{{ __('admin/job.edit') }}</a>
                    </td>
                    <td>
                        <a href="" class="btn btn-sm btn-outline-danger" data-toggle="modal"
                            data-news_id="{{ $item->id }}"
                            data-target="#delete_news">{{ __('admin/job.delete') }}</a>
                    </td>

                </tr>
            @empty
                <tr>
                    <td colspan="7">{{ __('admin/job.no_job') }}</td>
                </tr>
            @endforelse
            {{-- @else

        @endif --}}
        </tbody>
    </table>
    {{ $jobs->withQueryString()->appends(['search' => 1])->links() }}
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
    <script src="{{ asset('js/dist/tagify.js') }}"></script>
    <script src="{{ asset('js/dist/tagify.polyfills.min.js') }}"></script>
    <script>
        var inputElm = document.querySelector('[name=features]');
        tagify = new Tagify(inputElm);
    </script>
@endsection
