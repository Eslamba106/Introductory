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

{{-- @if (session()->has('restore_invoice'))
<script>
    window.onload = function() {
        notif({
            msg: "تم الغاء أرشفة الفاتورة بنجاح",
            type: "success"
        })
    }

</script>
@endif

@if (session()->has('delete_department'))
<script>
    window.onload = function() {
        notif({
            msg: "تم حذف الفاتورة بنجاح",
            type: "success"
        })
    }

</script> --}}
{{-- @endif --}}
    <!-- Start Create Department !-->
    {{-- @can('create')
        
    
    <div class="m-2">
        <a href="" class="btn btn-sm btn-outline-primary mr-2" href="#" data-invoice_id="" data-toggle="modal"
            data-target="#Transfer_invoice">{{ __('admin/blog.add_department') }}</a>
    </div>
    @endcan
    @can('create') --}}
    {{-- <div class="modal fade" id="Transfer_invoice" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">{{ __('admin/blog.add_department') }}</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <form action="{{ route('user.blog_department.store') }}" method="post">
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
    @endcan --}}
    <!-- End Create Department !-->


    <!-- Start Edit Department !-->
    {{-- @can('edit')
        
    <div class="modal fade" id="editdepartment" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">{{ __('admin/blog.edit_department') }}</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <form action="{{ route('user.blog_department.update') }}" method="post">
                        @method('put')
                        @csrf

                        <div class="modal-body">
                            <label for="">{{ __('admin/blog.name') }}</label>
                            <input type="hidden" name="id" id="department_id" value="">
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
    
@endcan --}}
    <!-- End Edit Department !-->

    <!-- Start Delete Department !-->
    {{-- @can('delete')
        
    <div class="modal fade" id="delete_department" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">{{ __('admin/blog.delete_department') }}</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <form action="{{ route('user.blog_department.delete' ) }}" method="post">
                        @method('delete')
                        @csrf

                        <div class="modal-body">
                            {{ __('admin/blog.sure') }}
                            <input type="hidden" name="id" id="delete_department" value="">

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
    @endcan --}}

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
            @forelse ($departments as $item)
                <tr>
                    <td>{{ $item->name }}</td>
                    <td>{{ $item->created_at->shortAbsoluteDiffForHumans() }}</td>
                    {{-- @can('edit')
                    <td>
                        <a href="" class="btn btn-sm btn-outline-success" data-toggle="modal"
                            data-department_id="{{ $item->id }}"
                            data-target="#editdepartment">{{ __('admin/blog.edit_department') }}</a>
                    </td>
                    @endcan
                    @can('delete')
                    <td>
                        <a href="" class="btn btn-sm btn-outline-danger" data-toggle="modal"
                            data-department_id="{{ $item->id }}"
                            data-target="#delete_department">{{ __('admin/blog.delete_department') }}</a>
                    </td>
                    @endcan --}}

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
    {{ $departments->withQueryString()->appends(['search' => 1])->links() }}
@endsection
@section('js')
    {{-- <script>
        $('#editdepartment').on('show.bs.modal', function(event) {
            var button = $(event.relatedTarget)
            var department_id = button.data('department_id')
            var modal = $(this)
            modal.find('.modal-body #department_id').val(department_id);
        })
    </script>
    <script>
        $('#delete_department').on('show.bs.modal', function(event) {
            var button = $(event.relatedTarget)
            var department_id = button.data('department_id')
            var modal = $(this)
            modal.find('.modal-body #delete_department').val(department_id);
        })
    </script> --}}
@endsection


{{-- 

      <div class="m-2">
        <a href="" class="btn btn-sm btn-outline-primary mr-2" href="#" data-invoice_id="" data-toggle="modal"
            data-target="#Transfer_invoice">{{ __('admin/blog.add_department') }}</a>
        <a href="{{ route('moderator.create') }}" class="btn btn-sm btn-outline-primary mr-2">{{ __('admin/blog.add_department') }}</a> 
    </div> 
{{-- 
    <div class="modal fade" id="Transfer_invoice" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">{{ __('admin/blog.add_department') }}</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <form action="" method="post">
                        @method('patch')
                        @csrf

                        <div class="modal-body">
                            هل انت متاكد من عملية الغاء الارشفة ؟
                            <input type="hidden" name="invoice_id" id="invoice_id" value="">

                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">الغاء</button>
                            <button type="submit" class="btn btn-success">تاكيد</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
  --}}
