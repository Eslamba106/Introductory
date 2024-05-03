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
            data-target="#add_category">{{ __('admin/news.add_category') }}</a>
    </div>
    @endcan
    @can('create')
    <div class="modal fade" id="add_category" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">{{ __('admin/news.add_category') }}</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <form action="{{ route('user.news_categories.store') }}" method="post">
                        @csrf
                        <div class="modal-body">
                            <div class="form-group">
                                <label for="">{{ __('admin/blog.name') }}</label>
                                <input class="form-control" type="text" name="name">
                            </div>
                            <div class="form-group">
                                <label for="">{{ __('admin/news.main') }}</label>
                                <select class="form-control" name="parent_id" id="">
                                    <option value="0"></option>
                                    @foreach ($news_categories as $item)
                                        <option value="{{ $item->id }}">{{ $item->name }}</option>
                                    @endforeach
                                </select>
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


    <!-- Start Edit Category !-->
@can('edit')
    

    <div class="modal fade" id="edit_category" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">{{ __('admin/news.edit_category') }}</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <form action="{{ route('user.news_categories.update') }}" method="post">
                        @method('put')
                        @csrf

                        <div class="modal-body">
                            <div class="form-group">
                            <label for="">{{ __('admin/blog.name') }}</label>
                            <input type="hidden" name="id" id="category_id" >
                            <input class="form-control" type="text" name="name">
                            </div>
                            <div class="form-group">
                                <label for="">{{ __('admin/news.main') }}</label>
                                <select class="form-control" name="parent_id" id="">
                                    <option value="0"></option>
                                    @foreach ($news_categories as $item)
                                        <option value="{{ $item->id }}">{{ $item->name }}</option>
                                    @endforeach
                                </select>
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
    <!-- End Edit Category !-->
    @endcan
    <!-- Start Delete Category !-->
    @can('delete')
    <div class="modal fade" id="delete_category" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">{{ __('admin/news.delete_category') }}</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <form action="{{ route('user.news_categories.delete' ) }}" method="post">
                        @method('delete')
                        @csrf

                        <div class="modal-body">
                            {{ __('admin/blog.sure') }}
                            <input type="hidden" name="id" id="category_id" value="">

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
            @forelse ($news_categories as $item)
                <tr>
                    <td>{{ $item->name }}</td>
                    <td>{{ $item->created_at->shortAbsoluteDiffForHumans() }}</td>

                    <td>
                        <a href="" class="btn btn-sm btn-outline-success" data-toggle="modal"
                            data-category_edit_id="{{ $item->id }}"
                            data-target="#edit_category">{{ __('admin/news.edit_category') }}</a>
                    </td>
                    <td>
                        <a href="" class="btn btn-sm btn-outline-danger" data-toggle="modal"
                            data-category_id="{{ $item->id }}"
                            data-target="#delete_category">{{ __('admin/news.delete_category') }}</a>
                    </td>

                </tr>
            @empty
                <tr>
                    <td colspan="7">{{ __('admin/news.no_categories') }}</td>
                </tr>
            @endforelse
            {{-- @else

        @endif --}}
        </tbody>
    </table>
    {{ $news_categories->withQueryString()->appends(['search' => 1])->links() }}
@endsection
@section('js')
    <script>
        $('#edit_category').on('show.bs.modal', function(event) {
            var button = $(event.relatedTarget)
            var category_id = button.data('category_edit_id')
            var modal = $(this)
            modal.find('.modal-body #category_id').val(category_id);
        })
    </script>
    <script>
        $('#delete_category').on('show.bs.modal', function(event) {
            var button = $(event.relatedTarget)
            var category_id = button.data('category_id')
            var modal = $(this)
            modal.find('.modal-body #category_id').val(category_id);
        })
    </script>
@endsection



