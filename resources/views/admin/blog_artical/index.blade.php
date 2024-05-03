@extends('layouts.admin.dashboard')

@section('title')
    {{ __('admin/blog.articals') }}
@endsection

@section('page_name')
    {{ __('admin/blog.articals') }}
@endsection

@section('breadcrumb')
    {{ __('admin/blog.articals') }}
@endsection
@section('content')
    <!-- Start Create Artical !-->
    <div class="m-2">
        <a href="" class="btn btn-sm btn-outline-primary mr-2" href="#" data-toggle="modal"
            data-target="#create_artical">{{ __('admin/blog.add_artical') }}</a>
    </div>
    <div class="modal fade" id="create_artical" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">{{ __('admin/blog.add_artical') }}</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <form action="{{ route('admin.blog_artical.store') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="modal-body">
                            <div class="form-group">
                                <label for="">{{ __('admin/blog.title') }}</label>
                                <input class="form-control" type="text" name="title">
                            </div>
                            <div class="form-group">
                                <label for="">{{ __('admin/blog.content') }}</label>
                                <textarea class="form-control" name="content"></textarea>
                            </div>
                            <div class="form-group">
                                <label for="">{{ __('admin/blog.status') }}</label>
                                <select class="form-control" name="status" id="">
                                    <option value="active">{{ __('admin/blog.active') }}</option>
                                    <option value="archive">{{ __('admin/blog.archive') }}</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="">{{ __('admin/blog.department') }}</label>
                                <select class="form-control" name="blog_id" id="">
                                    @forelse($departments as $item)
                                    <option value="{{ $item->id }}">{{ $item->name }}</option>
                                    @empty
                                    <option value=""></option>
                                    @endforelse
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="">{{ __('admin/blog.image') }}</label>
                                <input class="form-control" type="file" name="image">
                            </div>
                            <div class="form-group">
                                <label for="">{{ __('admin/blog.tags') }}</label>
                                <input class="form-control" type="text" name="tags">
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
    <!-- End Create Artical !-->


    <!-- Start Edit Artical !-->
<!--{{-- 
    <div class="modal fade" id="edit_artical" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">{{ __('admin/blog.edit_artical') }}</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <form action="{{ route('admin.blog_artical.update') }}" method="post">
                        @method('put')
                        @csrf

                        <div class="modal-body">
                            <div class="form-group">
                                <label for="">{{ __('admin/blog.title') }}</label>
                                <input class="form-control" type="text" name="title">
                                {{-- <input class="form-control" type="text" name="title"> --}}
                                <input type="hidden" name="id" id="edit_artical" value="">
                            </div>
                            <div class="form-group">
                                <label for="">{{ __('admin/blog.content') }}</label>
                                <textarea class="form-control" name="content"></textarea>
                            </div>
                            <div class="form-group">
                                <label for="">{{ __('admin/blog.status') }}</label>
                                <select class="form-control" name="status" id="">
                                    <option value="active">{{ __('admin/blog.active') }}</option>
                                    <option value="archive">{{ __('admin/blog.archive') }}</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="">{{ __('admin/blog.department') }}</label>
                                <select class="form-control" name="blog_id" id="">
                                    @forelse($departments as $item)
                                    <option value="{{ $item->id }}">{{ $item->name }}</option>
                                    @empty
                                    <option value=""></option>
                                    @endforelse
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="">{{ __('admin/blog.image') }}</label>
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
    </div>  --}}
     End Edit Department !-->

    <!-- Start Delete Department !-->
    <div class="modal fade" id="delete_artical" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">{{ __('admin/blog.delete_artical') }}</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <form action="{{ route('admin.blog_artical.delete') }}" method="post">
                        @method('delete')
                        @csrf

                        <div class="modal-body">
                            {{ __('admin/blog.sure') }}
                            <input type="hidden" name="id" id="delete_artical_id" value="">

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
    <!-- End Delete Department !-->


    <table class="table">
        <thead>
            <tr>
                <th>{{ __('admin/blog.title') }}</th>
                <th>{{ __('admin/blog.add_by') }}</th>
                <th>{{ __('admin/moderator.created_at') }}</th>
                <th colspan="2">{{ __('admin/pages.operation') }}</th>
            </tr>
        </thead>
        <tbody>
            <x-alert type="success" />
            <x-alert type="info" />
            <x-alert type="fail" />
            @forelse ($articals as $item)
                <tr>
                    <td>{{ $item->title }}</td>
                    <?php $writer = App\Models\User::where('id' ,$item->writer )->first(); ?>
                    <td>{{  $writer->name}}</td>
                    <td>{{ $item->created_at->shortAbsoluteDiffForHumans() }}</td>

                    <td>
                        <a href="{{ route('admin.blog_artical.edit' , $item->id) }}" class="btn btn-sm btn-outline-success" >{{ __('admin/blog.edit_artical') }}</a>
                    </td>

                    <td>
                        <a href="{{ route('admin.blog_artical.show' , $item->id) }}" class="btn btn-sm btn-outline-info" >{{ __('admin/blog.show') }}</a>
                    </td>
                    <td>
                        <a href="" class="btn btn-sm btn-outline-danger" data-toggle="modal"
                            data-artical_id="{{ $item->id }}"
                            data-target="#delete_artical">{{ __('admin/blog.delete_artical') }}</a>
                    </td>

                </tr>
            @empty
                <tr>
                    <td colspan="7">{{ __('admin/blog.no_artical') }}</td>
                </tr>
            @endforelse
        </tbody>
    </table>
    {{ $articals->withQueryString()->appends(['search' => 1])->links() }}
@endsection

@section('css')
<link href="{{ asset('css/dist/tagify.css') }}" rel="stylesheet" type="text/css" />
@endsection

@section('js')
    <script>
        $('#delete_artical').on('show.bs.modal', function(event) {
            var button = $(event.relatedTarget)
            var artical_id = button.data('artical_id')
            var modal = $(this)
            modal.find('.modal-body #delete_artical_id').val(artical_id);
        })
    </script>

<script src="{{ asset('js/dist/tagify.js') }}"></script>
<script src="{{ asset('js/dist/tagify.polyfills.min.js') }}"></script>
<script>
    var inputElm = document.querySelector('[name=tags]');
    tagify = new Tagify (inputElm);

    ClassicEditor
        .create(document.querySelector('#editor') ,   
        {
            ckfinder:
            {
                uploadUrl: "{{ route('admin.store-image' , ['_token' => csrf_token()]) }}",
            }
        })
        .then(editor => {
            // console.log(editor);
        })
        .catch(error => {
            // console.error(error);
        });
</script>

@endsection 