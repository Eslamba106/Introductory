@extends('layouts.front.index')

@section('title')
    {{ __('admin/settings.news') }}
@endsection

@section('content')
<div class="main-content app-content">
    <section>
        <div class="section banner-4 banner-section">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-md-12 text-center">
                        <div class="">
                            <p class="mb-3 content-1 h5 text-white">{{ __('admin/settings.news') }} <span class="tx-info-dark"></span></p>
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
                <div class="col-xl-8">
                    <div class="row">
                        @forelse ($news as $item)
                          <div class="col-md-6">
                            <div class="card">
                                <div class="position-relative">
                                    <a href="#">
                                        <img class="card-img-top" src="{{ $item->imageUrl }}" alt="img" width="100">
                                    </a>
                                    <span class="badge bg-secondary blog-badge">@if ($item->status == 'active')
                                        {{ __('admin/blog.active') }}
                                    @else
                                        {{ __('admin/blog.archive') }}
                                    @endif</span>
                                </div>
                                <div class="card-body d-flex flex-column">
                                    <h5><a href="#">{{ $item->title }}</a></h5>
                                    <div class="tx-muted">{{ $item->content }}</div>
                                    <div class="d-flex align-items-center pt-4 mt-auto">
                                        <div class="avatar me-3 cover-image rounded-circle">
                                            {{-- <img src="{{ $item->imageUrl }}" class="rounded-circle" alt="img" width="40"> --}}
                                        </div>
                                        <div>
                                            <a href="javascript:void(0);" class="h6">{{ $item->writerName->name }}</a>
                                            <small class="d-block tx-muted">{{ $item->created_at->shortAbsoluteDiffForHumans() }}</small>
                                        </div>
                                        <div class="ms-auto">
                                            {{-- <a href="javascript:void(0)" class="icon d-inline-block tx-muted"><i class="fe fe-heart me-1 rounded-circle p-2 bg-gray-200 tx-muted"></i></a> --}}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>  
                        @empty
                            
                        @endforelse

                    </div>
                    <!-- COL-END -->
                    {{ $news->withQueryString()->appends(['search' => 1])->links() }}

                </div>
                <!-- COL-END -->
                <div class="col-xl-4">
                    <div class="card">
                        <div class="card-body">
                        </div>
                    </div> 

                    <div class="card">
                        <div class="card-body">
                            <div class="">
                                <p class="h5 mb-4">{{ __('admin/news.last_news') }}</p>
                                @forelse ($last_news as $item)
                                   <div class="row mb-3 mb-xl-0">
                                    <div class="col-xl-4 col-lg-2 col-md-3 col-sm-4 text-center">
                                        <img src="{{ $item->imageUrl }}" class="img-fluid br-5 w-100" width="120" alt="img">
                                    </div>
                                    <div class="col-xl-8 col-lg-9 col-md-8 col-sm-8">
                                        <span class="badge bg-danger-transparent tx-danger me-1 mb-1 mt-3 mt-sm-0">@if ($item->status == 'active')
                                            {{ __('admin/blog.active') }}
                                        @else
                                            {{ __('admin/blog.archive') }}
                                        @endif</span>
                                        <h6 class="mb-0"><a href="#">{{ $item->title }}</a></h6>
                                        <p class="tx-muted">{{ $item->content }}</p>
                                    </div>
                                </div> 
                                @empty
                                    
                                @endforelse
                                

                            </div>
                        </div>
                    </div>

                    <div class="card">
                        <div class="card-body">
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </section>
</div>
@endsection