@extends('layouts.admin.dashboard')

@section('title')
    {{ __('admin/moderator.edit_moderator') }}
@endsection

@section('page_name')
    {{ __('admin/moderator.edit_moderator') }}
@endsection

@section('breadcrumb')
    {{ __('admin/moderator.moderators') }}
@endsection
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">{{ __('admin/moderator.edit_moderator') }}</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">

                    <form action="{{ route('moderator.update', $moderator->id) }}" method="post">
                        @csrf
                        @method('put')
                        <div class="form-group">
                            <lable for="">{{ __('admin/moderator.name') }}</lable>
                            <input type="text" name="name" class="form-control"
                                value="{{ old('name', $moderator->name) }}">

                        </div>
                        <div class="form-group">
                            <lable for="">{{ __('admin/moderator.email') }}</lable>
                            <input type="email" name="email" class="form-control"
                                value="{{ old('email', $moderator->email) }}">
                        </div>
                        <div class="form-group">
                            <lable for="">{{ __('admin/moderator.password') }}</lable>
                            <input type="password" name="password" class="form-control">
                        </div>
                        <div class="form-group">
                            <strong>نوع المستخدم</strong>
                            {!! Form::select('roles[]', $roles, $userRole, ['class' => 'form-control', 'multiple']) !!}
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-success">{{ __('admin/moderator.save') }}</button>
                        </div>

                      

                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
