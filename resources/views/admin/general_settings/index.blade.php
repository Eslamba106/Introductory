@extends('layouts.admin.dashboard')

@section('title')
    {{ __('admin/settings.settings') }}
@endsection

@section('page_name')
    {{ __('admin/settings.settings') }}
@endsection

@section('breadcrumb')
    {{ __('admin/settings.settings') }}
@endsection
@section('content')

<div class="m-2">
    <a href="" class="btn btn-sm btn-outline-primary mr-2" href="#" data-category_id="" data-toggle="modal"
        data-target="#category_id">{{ __('admin/blog.add_department') }}</a>
</div>
<div class="modal fade" id="category_id" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">{{ __('admin/blog.add_department') }}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <form action="{{ route('admin.settings.store') }}" method="post">
                    @csrf
                    <div class="modal-body">
                        <div class="form-group">
                            <lable class="" for="">{{ __('admin/general.webname_ar') }}</lable>
                            <input type="text" name="webname_ar" class="form-control" />
                        </div>
                       
                        <div class="form-group">
                            <lable for="">{{ __('admin/general.webname_en') }}</lable>
                            <input type="text" name="webname_en" class="form-control">
                        </div>
                        {{-- <div class="form-group"> --}}
{{-- 
                            <lable for="">{{ __('admin/general.department') }}</lable>
                            <select name="parent_id" id="validationCustom01" class="form-control">
                                <option value="0">{{ __('admin/general.main') }}</option>
                                @if ($general_settings)
                                    
                                @foreach ($general_settings as $item)
                                    <option value="{{ $item->id }}">  @if (session()->has('locale') && session()->get('locale') == 'ar') {{ $item->webname_ar }}
                                    @else {{ $item->webname_en }} @endif
                                    </option>
                                @endforeach
                                
                                @endif
                            </select> --}}
                            {{-- <input type="text" name="parent_id" class="form-control" > --}}
                        {{-- </div>  --}}
                        <div class="form-group">
                            <lable for="">{{ __('admin/general.description_ar') }}</lable>
                            <textarea name="description_ar" class="form-control" ></textarea>
                        </div>
                        <div class="form-group">
                            <lable for="">{{ __('admin/general.description_en') }}</lable>
                            <textarea name="description_en" class="form-control"></textarea>
                        </div>
                        <div class="form-group">
                            <lable for="">{{ __('admin/general.logo') }}</lable>
                            <input type="file" name="logo" class="form-control" >
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
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">{{ __('admin/settings.info') }}</h3>
                </div>
                @if ($general_settings)
                    <!-- /.card-header -->
                    <div class="card-body">
                        <table id="example2" class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <td class="width30">{{ __('admin/general.webname_en') }}</td>
                                    <td>{{ $general_settings->webname_en }}</td>
                                </tr>
                                <tr>
                                    <td class="width30">{{ __('admin/general.webname_ar') }}</td>
                                    <td>{{ $general_settings->webname_ar }}</td>
                                </tr>
                                <tr>
                                    <td class="width30">{{ __('admin/general.description_en') }}</td>
                                    <td>
                                        {{ $general_settings->description_en }}

                                    </td>
                                </tr>
                                <tr>
                                    <td class="width30">{{ __('admin/general.description_ar') }}</td>
                                    <td>
                                        {{ $general_settings->description_ar }}

                                    </td>
                                </tr>
                                <td class="width30">{{ __('admin/general.logo') }}</td>
                                <td>
                                    <div class="image">
                                        <img src="{{ $general_settings->image_url }}" alt="{{ __('admin/general.logo') }}"
                                            class="custom_img">
                                        {{-- <img src="{{ asset('storage/' . $general_settings->logo) }}" alt="{{ __('admin/general.logo') }}"
                                        class="custom_img"> --}}
                                    </div>

                                </td>

                                <tr>
                                    <td class="width30">{{ __('admin/general.last_update') }}</td>
                                    <td>
                                        {{ $general_settings->updated_at->shortAbsoluteDiffForHumans() }}
                                    </td>
                                </tr>
                                <tr>
                                    <td class="width30">{{ __('admin/settings.edit') }}</td>
                                    <td>
                                        <a href="{{ route('admin.settings.edit') }}"><button
                                                class="btn btn-info">{{ __('admin/settings.edit') }}</button></a>
                                    </td>
                                </tr>

                            </thead>
                        </table>
                    </div>
                @endif
            </div>
        </div>
    </div>
@endsection

@section('js')
    {{-- <script>
        $('#edit_category').on('show.bs.modal', function(event) {
            var button = $(event.relatedTarget)
            var category_id = button.data('category_id')
            var modal = $(this)
            modal.find('.modal-body #category_id').val(category_id);
        })
    </script> --}}
    <script>
        $('#delete_category').on('show.bs.modal', function(event) {
            var button = $(event.relatedTarget)
            var category_id = button.data('category_id')
            var modal = $(this)
            modal.find('.modal-body #delete_category').val(category_id);
        })
    </script>
@endsection

