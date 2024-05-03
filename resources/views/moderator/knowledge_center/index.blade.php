@extends('layouts.admin.dashboard')

@section('title')
    {{ __('admin/knowledge.knowledge') }}
@endsection

@section('page_name')
    {{ __('admin/knowledge.knowledge') }}
@endsection

@section('breadcrumb')
    {{ __('admin/knowledge.knowledge') }}
@endsection
@section('content')


<div class="m-2">
    <a href="" class="btn btn-sm btn-outline-primary mr-2" href="#" data-toggle="modal"
        data-target="#create_artical">{{ __('admin/knowledge.add_knowledge') }}</a>
</div>

    <!-- Start Search knowledge !-->
    <form action="{{ URL::current() }}" method="get" class="d-flex justify-content-between mb-4">
        {{-- <x-form.input name="name" placeholder="Name" class="mx-2" :value="request('name')"/> --}}
        <input type="text" name="title" class="mx-2 form-control" value="{{ request('title') }}">
        <select name="department" class="form-control mx-2">
            <option value="">All</option>
            @foreach ($departments as $item)
                
            <option value="{{ $item->id }}" >{{ $item->name }}</option>
            @endforeach
        </select>
        <button class="btn btn-dark mx-2">Filter</button>
    </form>
    <!-- Start Search knowledge !-->


    <!-- Start Create knowledge !-->

    <div class="modal fade" id="create_artical" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">{{ __('admin/knowledge.add_knowledge') }}</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <form action="{{ route('admin.knowledge_center.store') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="modal-body">
                            <div class="form-group">
                                <label for="">{{ __('admin/knowledge.title') }}</label>
                                <input class="form-control" type="text" name="title">
                            </div>
                            <div class="form-group">
                                <label for="">{{ __('admin/knowledge.content') }}</label>
                                <textarea class="form-control" name="content"></textarea>
                            </div>

                            <div class="form-group">
                                <label for="">{{ __('admin/knowledge.department') }}</label>
                                <select class="form-control" name="knowledge_category_id" id="">
                                    @forelse($departments as $item)
                                        <option value="{{ $item->id }}">{{ $item->name }}</option>
                                    @empty
                                        <option value=""></option>
                                    @endforelse
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="">{{ __('admin/knowledge.tags') }}</label>
                                <input class="form-control" type="text" name="tags">
                            </div>
                            <div class="form-group">
                                <label for="">{{ __('admin/knowledge.image') }}</label>
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
    <!-- End Create knowledge !-->


    <!-- Start Delete knowledge !-->
    <div class="modal fade" id="delete_explained" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">{{ __('admin/knowledge.delete') }}</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <form action="{{ route('admin.knowledge_center.delete') }}" method="post">
                        @method('delete')
                        @csrf

                        <div class="modal-body">
                            {{ __('admin/blog.sure') }}
                            <input type="hidden" name="id" id="delete_explained_id" value="">

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
    <!-- End Delete knowledge !-->


    <table class="table">
        <thead>
            <tr>
                <th>{{ __('admin/knowledge.title') }}</th>
                <th>{{ __('admin/knowledge.created_at') }}</th>
                <th colspan="2">{{ __('admin/pages.operation') }}</th>
            </tr>
        </thead>
        <tbody>
            <x-alert type="success" />
            <x-alert type="info" />
            <x-alert type="fail" />
            @forelse ($knowledge as $item)
                <tr>
                    <td>{{ $item->title }}</td>
                    <?php $writer = App\Models\Admin::where('id', $item->writer)->first(); ?>
                    <td>{{ $item->created_at->shortAbsoluteDiffForHumans() }}</td>

                    <td>
                        <a href="{{ route('admin.knowledge_center.edit', $item->id) }}"
                            class="btn btn-sm btn-outline-success">{{ __('admin/knowledge.edit') }}</a>
                    </td>

                    <td>
                        <a href="{{ route('admin.knowledge_center.show', $item->id) }}"
                            class="btn btn-sm btn-outline-info">{{ __('admin/knowledge.show') }}</a>
                    </td>
                    <td>
                        <a href="" class="btn btn-sm btn-outline-danger" data-toggle="modal"
                            data-delete_explained_id="{{ $item->id }}"
                            data-target="#delete_explained">{{ __('admin/knowledge.delete') }}</a>
                    </td>

                </tr>
            @empty
                <tr>
                    <td colspan="7">{{ __('admin/knowledge.no_explained') }}</td>
                </tr>
            @endforelse
        </tbody>
    </table>
    {{ $knowledge->withQueryString()->appends(['search' => 1])->links() }}
@endsection

@section('css')
    <link href="{{ asset('css/dist/tagify.css') }}" rel="stylesheet" type="text/css" />
@endsection

@section('js')
    <script>
        $('#delete_explained').on('show.bs.modal', function(event) {
            var button = $(event.relatedTarget)
            var delete_explained_id = button.data('delete_explained_id')
            var modal = $(this)
            modal.find('.modal-body #delete_explained_id').val(delete_explained_id);
        })
    </script>

    <script src="{{ asset('js/dist/tagify.js') }}"></script>
    <script src="{{ asset('js/dist/tagify.polyfills.min.js') }}"></script>
    <script>
        var inputElm = document.querySelector('[name=tags]');
        tagify = new Tagify(inputElm);

        // ClassicEditor
        //     .create(document.querySelector('#editor') ,   
        //     {
        //         ckfinder:
        //         {
        //             uploadUrl: "{{ route('admin.store-image', ['_token' => csrf_token()]) }}",
        //         }
        //     })
        //     .then(editor => {
        //         // console.log(editor);
        //     })
        //     .catch(error => {
        //         // console.error(error);
        //     });
    </script>
@endsection
