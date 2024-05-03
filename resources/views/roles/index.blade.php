@extends('layouts.admin.dashboard')

@section('title')
    {{ __('admin/pages.pages') }}
@endsection

@section('page_name')
    {{ __('admin/pages.pages') }}
@endsection

@section('breadcrumb')
    {{ __('admin/pages.pages') }}
@endsection
@section('content')
    {{-- <div class="container"> --}}
        <div class="row row-sm">
            <div class="col-xl-12">
                <div class="card">
                    <div class="card-header pb-0">
                        <div class="d-flex justify-content-between">
                            <div class="col-lg-12 margin-tb">
                                <div class="pull-right">
                                    {{-- @can('اضافة صلاحية') --}}
                                    <a class="btn btn-primary btn-sm" href="{{ route('roles.create') }}">اضافة</a>
                                    {{-- @endcan --}}
                                </div>
                            </div>
                            {{-- <br> --}}
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table mg-b-0 text-md-nowrap table-hover ">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>الاسم</th>
                                    <th>العمليات</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $j = 0; ?>
                                @foreach ($roles as $role)
                                    <?php ++$j; ?>
                                    <tr>
                                        <td><?php echo $j; ?></td>
                                        {{-- <td>{{ ++$i }}</td> --}}
                                        <td>{{ $role->name }}</td>
                                        <td>
                                            {{-- @can('عرض صلاحية') --}}
                                            <a class="btn btn-success btn-sm"
                                                href="{{ route('roles.show', $role->id) }}">عرض</a>
                                            {{-- @endcan --}}

                                            {{-- @can('تعديل صلاحية') --}}
                                            <a class="btn btn-primary btn-sm"
                                                href="{{ route('roles.edit', $role->id) }}">تعديل</a>
                                            {{-- @endcan --}}

                                            {{-- @if ($role->name !== 'owner') --}}
                                            {{-- @can('حذف صلاحية') --}}
                                            {!! Form::open(['method' => 'DELETE', 'route' => ['roles.destroy', $role->id], 'style' => 'display:inline']) !!}
                                            {!! Form::submit('حذف', ['class' => 'btn btn-danger btn-sm']) !!}
                                            {!! Form::close() !!}
                                            {{-- @endcan --}}
                                            {{-- @endif --}}


                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    {{-- </div> --}}
@endsection
{{-- @section('js')
    <!--Internal  Notify js -->
    <script src="{{ URL::asset('assets/plugins/notify/js/notifIt.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/notify/js/notifit-custom.js') }}"></script>
@endsection --}}
