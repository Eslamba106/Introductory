@extends('layouts.admin.dashboard')

@section('title')
    {{ __('admin/permission.permission') }}
@endsection

@section('page_name')
    {{ __('admin/permission.create') }}
@endsection

@section('breadcrumb')
    {{ __('admin/permission.permission') }}
@endsection
@section('content')

@if (count($errors) > 0)
    <div class="alert alert-danger">
        <button aria-label="Close" class="close" data-dismiss="alert" type="button">
            <span aria-hidden="true">&times;</span>
        </button>
        <strong>خطا</strong>
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif




{!! Form::open(['route' => 'roles.store', 'method' => 'POST']) !!}
<!-- row -->
<div class="row">
    <div class="col-md-12">
        <div class="card mg-b-20">
            <div class="card-body">
                <div class="main-content-label mg-b-5">
                    <div class="col-xs-7 col-sm-7 col-md-7">
                        <div class="form-group">
                            <p>{{ __('admin/permission.name') }} :</p>
                            {!! Form::text('name', null, ['class' => 'form-control']) !!}
                        </div>
                    </div>
                </div>
                <div class="row">
                    <!-- col -->
                    <div class="col-lg-4">
                        <ul id="treeview1">
                            <li><a href="#">{{ __('admin/permission.permission') }}</a>
                                <ul>
                            </li>
                            @foreach ($permission as $value)
                                <label
                                    style="font-size: 16px;">{{ Form::checkbox('permission[]', $value->name, false, ['class' => 'name']) }}
                                    {{ $value->name }}</label>
                            @endforeach
                            </li>

                        </ul>
                        </li>
                        </ul>
                    </div>
                    <!-- /col -->
                    <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                        <button type="submit" class="btn btn-main-primary">{{ __('admin/permission.save') }}</button>
                    </div>

                </div>
            </div>
        </div>
    </div>

</div>
<!-- row closed -->
</div>
<!-- Container closed -->
</div>
<!-- main-content closed -->

{!! Form::close() !!}
@endsection
@section('js')
<!-- Internal Treeview js -->
<script src="{{ URL::asset('assets/plugins/treeview/treeview.js') }}"></script>
@endsection
