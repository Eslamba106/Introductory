@extends('layouts.moderator.dashboard')

@section('title')
    {{ __('admin/blog.department') }}
@endsection

@section('page_name')
    {{ __('admin/blog.department') }}
@endsection

@section('breadcrumb')
    {{ __('admin/blog.department') }}
@endsection
@section('content')
    <!-- Start Create Department !-->
    @can('create')
        <div class="m-2">
            <a href="" class="btn btn-sm btn-outline-primary mr-2" href="#" data-category_id="" data-toggle="modal"
                data-target="#category_id">{{ __('admin/blog.add_department') }}</a>
        </div>
    @endcan
    @can('create')
        <div class="modal fade" id="category_id" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">{{ __('admin/blog.add_department') }}</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        <form action="{{ route('user.knowledge_categories.store') }}" method="post">
                            @csrf
                            <div class="modal-body">
                                <div class="form-group">
                                    <label for="">{{ __('admin/blog.name') }}</label>
                                    <input class="form-control" type="text" name="name">
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

    <!-- End Create Department !-->


    <!-- Start Edit Department !-->
    @can('edit')
        <div class="modal fade" id="edit_category" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">{{ __('admin/blog.edit_department') }}</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        <form action="{{ route('user.knowledge_categories.update') }}" method="post">
                            @method('put')
                            @csrf

                            <div class="modal-body">
                                <label for="">{{ __('admin/blog.name') }}</label>
                                <input type="hidden" name="id" id="category_id" value="">
                                <input class="form-control" type="text" name="name">

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

    <!-- End Edit Department !-->

    <!-- Start Delete Department !-->
    @can('delete')
        <div class="modal fade" id="delete_category" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">{{ __('admin/blog.delete_department') }}</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        <form action="{{ route('user.knowledge_categories.delete') }}" method="post">
                            @method('delete')
                            @csrf

                            <div class="modal-body">
                                {{ __('admin/blog.sure') }}
                                <input type="hidden" name="id" id="delete_category" value="">

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
    <!-- End Delete Department !-->


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
            @forelse ($knowledge_categories as $item)
                <tr>
                    <td>{{ $item->name }}</td>
                    <td>{{ $item->created_at->shortAbsoluteDiffForHumans() }}</td>
                    @can('edit')
                        <td>
                            <a href="" class="btn btn-sm btn-outline-success" data-toggle="modal"
                                data-category_id="{{ $item->id }}"
                                data-target="#edit_category">{{ __('admin/blog.edit_department') }}</a>
                        </td>
                    @endcan
                    @can('delete')
                        <td>
                            <a href="" class="btn btn-sm btn-outline-danger" data-toggle="modal"
                                data-category_id="{{ $item->id }}"
                                data-target="#delete_category">{{ __('admin/blog.delete_department') }}</a>
                        </td>
                    @endcan

                </tr>
            @empty
                <tr>
                    <td colspan="7">{{ __('admin/blog.no_department') }}</td>
                </tr>
            @endforelse
            {{-- @else

        @endif --}}
        </tbody>
    </table>
    {{ $knowledge_categories->withQueryString()->appends(['search' => 1])->links() }}
@endsection
@section('js')
    <script>
        $('#edit_category').on('show.bs.modal', function(event) {
            var button = $(event.relatedTarget)
            var category_id = button.data('category_id')
            var modal = $(this)
            modal.find('.modal-body #category_id').val(category_id);
        })
    </script>
    <script>
        $('#delete_category').on('show.bs.modal', function(event) {
            var button = $(event.relatedTarget)
            var category_id = button.data('category_id')
            var modal = $(this)
            modal.find('.modal-body #delete_category').val(category_id);
        })
    </script>
@endsection
