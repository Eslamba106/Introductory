@extends('layouts.front.index')

@section('title')
    {{ __('admin/job.jobs') }}
@endsection

@section('content')
<div class="main-content app-content">
    <section>
        <div class="section banner-4 banner-section">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-md-12 text-center">
                        <div class="">
                            <p class="mb-3 content-1 h5 text-white">{{ __('admin/job.jobs') }} <span class="tx-info-dark"></span></p>
                            {{-- <p class="mb-0 tx-28">We Fight Passionately to Get Our Clients Every Time They Deserve</p> --}}
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </section>
    <section class="section">
        <div class="container">
            <div class="row">
                <div class="col-xl-12">
                    <div class="row">
                       <form action="{{ route('store-application') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="">Name</label>
                            <input type="hidden" name="slug" class="form-control" value="{{ $job->slug }}">
                            <input class="form-control" type="text" name="name">
                        </div>
                        <div class="form-group">
                            <label for="">Email</label>
                            <input class="form-control" type="email" name="email">
                        </div>
                        <div class="form-group">
                            <label for="">Phone</label>
                            <input class="form-control" type="text" name="phone">
                        </div>
                        <div class="form-group">
                            <label for="">Image</label>
                            <input class="form-control" type="file" name="attachments">
                        </div>
                        <div class="modal-footer">
                            {{-- <button type="button" class="btn btn-secondary"
                                data-dismiss="modal">{{ __('admin/blog.cancel') }}</button> --}}
                            <button type="submit" class="btn btn-success">{{ __('admin/blog.save') }}</button>
                        </div>
                       </form>
                    </div>
                    <!-- COL-END -->
              
                </div>
                <!-- COL-END -->

            </div>
        </div>
    </section>

</div>
@endsection