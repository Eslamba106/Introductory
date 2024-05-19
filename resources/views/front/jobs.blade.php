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
                        @forelse ($jobs as $item)
                        <div class="col-md-6">
                            <div class="card">
                                <div class="position-relative">
                                    <a href="blog-details.html">
                                        <img class="card-img-top" src="{{ $item->imageUrl }}" alt="img" width="30">
                                    </a>
                                    <span class="badge bg-secondary blog-badge">{{ $item->category }}</span>
                                </div>
                                <div class="card-body d-flex flex-column">
                                    <h5><a href="blog-details.html">{{ $item->title }}</a></h5>
                                    <div class="tx-muted">{{ $item->description }} 
                                        <?php $features = json_decode($item->features); ?>
                                        <ul>
                                            @forelse ($features as $feature)
                                               <li>{{ $feature->value }}</li>
                                          
                                            @empty
                                                {{ __('admin/job.no_job') }}
                                            @endforelse
                                            
                                        </ul>
                                    </div>
                                    <div class="d-flex align-items-center pt-4 mt-auto">
                                        <div class="avatar me-3 cover-image rounded-circle">
                                            <img src="../assets/images/profile/1.jpg" class="rounded-circle" alt="img" width="40">
                                        </div>
                                        <div>
                                            {{-- <a href="javascript:void(0);" class="h6">اضافة نص اختياري</a> --}}
                                            <small class="d-block tx-muted"></small>
                                        </div>
                                        <div class="ms-auto">
                                            <a href="javascript:void(0)" class="icon d-inline-block tx-muted">
                                                <a href="{{ route('application' , $item->slug) }}" class="btn btn-lg btn-secondary mb-2 mb-sm-0"><i class="fa-regular fa-paper-plane me-2"></i>{{ __('admin/job.app') }}</a>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @empty
                            
                        @endforelse
                        
              
                    </div>
                    <!-- COL-END -->
              
                </div>
                <!-- COL-END -->

            </div>
        </div>
    </section>

</div>
@endsection