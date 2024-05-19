@extends('layouts.front.index')

@section('title')
    {{ __('main.home') }}
@endsection

@section('content')
    <div class="main-content app-content">
        <section class="banner-section section banner-1">
            <img src="{{ asset('assets/images/patterns/1.png') }}" alt="img" class="patterns-2">
            <img src="{{ asset('assets/images/patterns/4.png') }}" alt="img" class="patterns-3">
            <img src="{{ asset('assets/images/patterns/6.png') }}" alt="img" class="patterns-4">
            <img src="{{ asset('assets/images/patterns/6.png') }}" alt="img" class="patterns-6">
            <img src="{{ asset('assets/images/patterns/10.png') }}" alt="img" class="patterns-8 op-2">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-7">
                        <div class="mb-5">
                            <p class="mb-3 content-1 h5 text-white">Trusted Web Hosting Site For Your <span
                                    class="tx-info-dark position-relative">Website.<span
                                        class="br-bottom-before"></span></span></p>
                            <p class="content-2">Dedicated resources, full root access & easy scaling. It is the virtual
                                private server you've been cravin'</p>
                        </div>
                        <a href="#domain" class="btn btn-lg  btn-secondary me-2 mb-2 mb-sm-0"><i
                                class="bi bi-arrow-right me-2"></i>Get Started</a>
                        <a href="contact-us.html" class="btn btn-lg btn-white mb-2 mb-sm-0"><i
                                class="bi bi-telephone me-2"></i>Contact Us</a>
                    </div>
                    <div class="col-lg-5">
                        <div class="text-lg-end text-center mt-4 mt-lg-0">
                            <img src="{{ $general_settings->image_url }}" class="img-fluid" alt="img" height="300"
                                width="300">
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section class="section bg-pattern-1 bg-gray-100" id="domain">
            <div class="container">
                <div class="row text-center justify-content-center">
                    <div class="heading-section">
                        <div class="heading-title">{{ __('admin/settings.looking') }} <span
                                class="tx-primary">{{ __('admin/settings.blog') }}</span> </div>
                        <div class="heading-description">Invidunt erat elitr ut accusam amet ipsum lorem</div>
                    </div>
                    <div class="col-xl-9">
                        <div class="card-body text-center">
                            <img src="../assets/images/patterns/7.png" alt="img" class="patterns-7">
                            <img src="../assets/images/patterns/24.png" alt="img"
                                class="patterns-8 sub-pattern-1 op-1 z-index-1">
                            <img src="../assets/images/patterns/24.png" alt="img"
                                class="patterns-3 sub-pattern-1 op-1 z-index-1">
                            <div class="row">

                                @forelse ($blog_artical as $item)
                                    <div class="col-lg-4 col-sm-6">
                                        <div class="card feature-card reveal">
                                            <div class="card-body">
                                                <div class="mb-2 d-flex align-items-center">
                                                    <span class="tx-primary addons tx-28">
                                                        <i class="bi bi-nut outline fade-in"></i>
                                                        <i class="bi bi-nut-fill filled fade-in"></i>
                                                    </span>
                                                    <h5 class="flex-grow-1 mb-0 ms-3">{{ $item->title }}</h5>
                                                </div>
                                                <p class="mb-0">{{ $item->content }}</p>
                                                <div class="heading-description">{{ $item->articalWriter->name }}</div>
                                            </div>
                                        </div>
                                    </div>
                                @empty
                                @endforelse

                            </div>
                        </div>

                    </div>
                </div>
            </div>
    </div>
    </section>
    <section class="section bg-pattern-2 bg-image2">
        <div class="container">
            <div class="heading-section">
                <div class="heading-title text-white">{{ __('admin/blog.departments') }}</div>
                <div class="heading-description text-white op-8">Est amet sit vero sanctus labore no sed ipsum ipsum
                    nonumy.</div>
            </div>
            <div class="row align-items-center">
                @forelse ($blog_departments as $item)
                    <div class="col-lg-3 col-sm-6">
                        <div class="card text-center feature-card-16 mb-lg-0">
                            <div class="card-body">
                                <svg class="feature-icon br-style1 primary mb-3" xmlns="http://www.w3.org/2000/svg"
                                    height="60" width="60" enable-background="new 0 0 24 24" viewBox="0 0 24 24">
                                    <path fill="#729af0"
                                        d="M15 20.5H7c-1.7 0-3-1.3-3-3v-5.3c0-.6.4-1 1-1h12c.6 0 1 .4 1 1v5.3c0 1.7-1.3 3-3 3z" />
                                    <path fill="#1457e6"
                                        d="m21.5 10.2-1-.5-9-5c-.3-.2-.7-.2-1 0l-9 5c-.5.2-.6.8-.4 1.3.1.2.2.3.4.4l9 5c.3.2.7.2 1 0l8.5-4.7v2.9c0 .6.4 1 1 1s1-.4 1-1v-3.4c0-.5-.2-.8-.5-1z" />
                                </svg>
                                <h4 class="">{{ $item->name }}</h4>
                                <h2 class="counter tx-primary  mb-0">{{ $item->artical->count() }}</h2>
                            </div>
                        </div>
                    </div>
                @empty
                @endforelse


            </div>
        </div>
    </section>

    
    <section class="section">
        <div class="container">
            <div class="heading-section">
                <div class="heading-subtitle"><span
                        class="tx-primary tx-16 fw-semibold">{{ __('admin/settings.news') }}</span></div>
                <div class="heading-title">{{ __('admin/news.last') }}<span
                        class="tx-primary">{{ __('admin/news.news') }}</span> </div>
                {{-- <div class="heading-description">Est amet sit vero sanctus labore no sed ipsum ipsum nonumy.</div> --}}
            </div>
            <div class="row">
                {{-- <div class="col-lg-4">
                    <div class="card mb-lg-0">
                        <div class="position-relative">
                            <a href="blog-details.html">
                                <img class="card-img-top" src="../assets/images/blog/3.jpg" alt="blog-image">
                            </a>
                            <span class="badge bg-secondary blog-badge">Hosting</span>
                        </div>
                        <div class="card-body d-flex flex-column">
                            <h5><a href="blog-details.html" class="tx-color-default">Starting a Web Hosting
                                    Business</a></h5>
                            <div class="tx-muted">To take a trivial example, which of us ever undertakes laborious
                                physical exerciser , except to obtain some advantage from it...</div>
                            <div class="d-flex align-items-center pt-4 mt-auto">
                                <div class="avatar me-3 cover-image rounded-circle">
                                    <img src="../assets/images/profile/1.jpg" class="rounded-circle" alt="img"
                                        width="40">
                                </div>
                                <div>
                                    <a href="javascript:void(0);" class="h6">Megan Peters</a>
                                    <small class="d-block tx-muted">1 day ago</small>
                                </div>
                                <div class="ms-auto">
                                    <a href="javascript:void(0)" class="icon d-inline-block tx-muted"><i
                                            class="fe fe-heart me-1 rounded-circle p-2 bg-gray-200 tx-muted"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- COL-END -->
                </div> --}}
                <!-- COL-END -->
                {{-- <div class="col-lg-4">
                    <div class="card mb-lg-0">
                        <div class="position-relative">
                            <a href="blog-details.html">
                                <img class="card-img-top" src="../assets/images/blog/6.jpg" alt="blog-image">
                            </a>
                            <span class="badge bg-info blog-badge">Email</span>
                        </div>
                        <div class="card-body d-flex flex-column">
                            <h5><a href="blog-details.html" class="tx-color-default">Email Hosting For Your
                                    Projects</a></h5>
                            <div class="tx-muted">At vero eos et accusamus et iusto odio dignissimos ducimus qui
                                blanditiis praesentium voluptatum deleniti atque...</div>
                            <div class="d-flex align-items-center pt-4 mt-auto">
                                <div class="avatar me-3 cover-image rounded-circle">
                                    <img src="../assets/images/profile/2.jpg" class="rounded-circle" alt="img"
                                        width="40">
                                </div>
                                <div>
                                    <a href="javascript:void(0);" class="h6">Mike Rowe-Soft</a>
                                    <small class="d-block tx-muted">2 days ago</small>
                                </div>
                                <div class="ms-auto">
                                    <a href="javascript:void(0)" class="icon d-inline-block tx-muted"><i
                                            class="fe fe-heart me-1 rounded-circle p-2 bg-gray-200 tx-muted"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div> --}}
                @forelse ($news as $item)
                    <div class="col-lg-4">
                        <div class="card mb-lg-0">
                            <div class="position-relative">
                                <a href="blog-details.html">
                                    <img class="card-img-top" src="{{ $item->imageUrl }}" alt="blog-image">
                                </a>
                                <span class="badge bg-success blog-badge">@if($item->status == 'active'){{ __('admin/blog.active') }} @else {{ __('admin/blog.archive') }} @endif</span>
                            </div>
                            <div class="card-body d-flex flex-column">
                                <h5><a href="blog-details.html"> {{ $item->title }} </a></h5>
                                <div class="tx-muted">{{ $item->content }}</div>
                                <div class="d-flex align-items-center pt-4 mt-auto">
                                    <div class="avatar me-3 cover-image rounded-circle">
                                        <img src="../assets/images/profile/5.jpg" class="rounded-circle" alt="img"
                                            width="40">
                                    </div>
                                    <div>
                                        <a href="javascript:void(0);" class="h6">{{ $item->writerName->name }}</a>
                                        <small class="d-block tx-muted">{{ $item->created_at->shortAbsoluteDiffForHumans() }}</small>
                                    </div>
                                    <div class="ms-auto">
                                        {{-- <a href="javascript:void(0)" class="icon d-inline-block tx-muted"><i
                                                class="fe fe-heart me-1 rounded-circle p-2 bg-gray-200 tx-muted"></i></a> --}}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @empty
                @endforelse

            </div>
        </div>
    </section>

    <section class="section bg-pattern-2 bg-image2">
        <div class="container">
            <div class="heading-section">
                <div class="heading-title text-white">{{ __('admin/news.category') }}</div>
                <div class="heading-description text-white op-8">{{ __('admin/news.category_details') }}</div>
            </div>
            <div class="row align-items-center">
                @forelse ($news_category as $item)
                    <div class="col-lg-3 col-sm-6">
                        <div class="card text-center feature-card-16 mb-lg-0">
                            <div class="card-body">
                                <svg class="feature-icon br-style1 primary mb-3" xmlns="http://www.w3.org/2000/svg"
                                    height="60" width="60" enable-background="new 0 0 24 24" viewBox="0 0 24 24">
                                    <path fill="#729af0"
                                        d="M15 20.5H7c-1.7 0-3-1.3-3-3v-5.3c0-.6.4-1 1-1h12c.6 0 1 .4 1 1v5.3c0 1.7-1.3 3-3 3z" />
                                    <path fill="#1457e6"
                                        d="m21.5 10.2-1-.5-9-5c-.3-.2-.7-.2-1 0l-9 5c-.5.2-.6.8-.4 1.3.1.2.2.3.4.4l9 5c.3.2.7.2 1 0l8.5-4.7v2.9c0 .6.4 1 1 1s1-.4 1-1v-3.4c0-.5-.2-.8-.5-1z" />
                                </svg>
                                <h4 class="">{{ $item->name }}</h4>
                                <h2 class="counter tx-primary  mb-0">{{ $item->news->count() }}</h2>
                            </div>
                        </div>
                    </div>
                @empty
                @endforelse


            </div>
        </div>
    </section>
    <section class="section">
        <div class="container">
            <div class="heading-section">
                <div class="heading-subtitle"><span
                        class="tx-primary tx-16 fw-semibold">{{ __('admin/settings.knowledge') }}</span></div>
                {{-- <div class="heading-title">{{ __('admin/news.last') }}<span
                        class="tx-primary">{{ __('admin/knowledge.knowledge') }}</span> </div> --}}
                {{-- <div class="heading-description">Est amet sit vero sanctus labore no sed ipsum ipsum nonumy.</div> --}}
            </div>
            <div class="row">
                {{-- <div class="col-lg-4">
                    <div class="card mb-lg-0">
                        <div class="position-relative">
                            <a href="blog-details.html">
                                <img class="card-img-top" src="../assets/images/blog/3.jpg" alt="blog-image">
                            </a>
                            <span class="badge bg-secondary blog-badge">Hosting</span>
                        </div>
                        <div class="card-body d-flex flex-column">
                            <h5><a href="blog-details.html" class="tx-color-default">Starting a Web Hosting
                                    Business</a></h5>
                            <div class="tx-muted">To take a trivial example, which of us ever undertakes laborious
                                physical exerciser , except to obtain some advantage from it...</div>
                            <div class="d-flex align-items-center pt-4 mt-auto">
                                <div class="avatar me-3 cover-image rounded-circle">
                                    <img src="../assets/images/profile/1.jpg" class="rounded-circle" alt="img"
                                        width="40">
                                </div>
                                <div>
                                    <a href="javascript:void(0);" class="h6">Megan Peters</a>
                                    <small class="d-block tx-muted">1 day ago</small>
                                </div>
                                <div class="ms-auto">
                                    <a href="javascript:void(0)" class="icon d-inline-block tx-muted"><i
                                            class="fe fe-heart me-1 rounded-circle p-2 bg-gray-200 tx-muted"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- COL-END -->
                </div> --}}
                <!-- COL-END -->
                {{-- <div class="col-lg-4">
                    <div class="card mb-lg-0">
                        <div class="position-relative">
                            <a href="blog-details.html">
                                <img class="card-img-top" src="../assets/images/blog/6.jpg" alt="blog-image">
                            </a>
                            <span class="badge bg-info blog-badge">Email</span>
                        </div>
                        <div class="card-body d-flex flex-column">
                            <h5><a href="blog-details.html" class="tx-color-default">Email Hosting For Your
                                    Projects</a></h5>
                            <div class="tx-muted">At vero eos et accusamus et iusto odio dignissimos ducimus qui
                                blanditiis praesentium voluptatum deleniti atque...</div>
                            <div class="d-flex align-items-center pt-4 mt-auto">
                                <div class="avatar me-3 cover-image rounded-circle">
                                    <img src="../assets/images/profile/2.jpg" class="rounded-circle" alt="img"
                                        width="40">
                                </div>
                                <div>
                                    <a href="javascript:void(0);" class="h6">Mike Rowe-Soft</a>
                                    <small class="d-block tx-muted">2 days ago</small>
                                </div>
                                <div class="ms-auto">
                                    <a href="javascript:void(0)" class="icon d-inline-block tx-muted"><i
                                            class="fe fe-heart me-1 rounded-circle p-2 bg-gray-200 tx-muted"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div> --}}
                @forelse ($knowledge_center as $item)
                    <div class="col-lg-4">
                        <div class="card mb-lg-0">
                            <div class="position-relative">
                                <a href="blog-details.html">
                                    <img class="card-img-top" src="{{ $item->imageUrl }}" alt="blog-image">
                                </a>
                                {{-- <span class="badge bg-success blog-badge">@if($item->status == 'active'){{ __('admin/blog.active') }} @else {{ __('admin/blog.archive') }} @endif</span> --}}
                            </div>
                            <div class="card-body d-flex flex-column">
                                <h5><a href="blog-details.html"> {{ $item->title }} </a></h5>
                                <div class="tx-muted">{{ $item->content }}</div>
                                <div class="d-flex align-items-center pt-4 mt-auto">
                                    <div class="avatar me-3 cover-image rounded-circle">
                                        {{-- <img src="../assets/images/profile/5.jpg" class="rounded-circle" alt="img"
                                            width="40"> --}}
                                    </div>
                                    <div>
                                        <a href="javascript:void(0);" class="h6">{{ $item->view }}</a>
                                        <small class="d-block tx-muted">{{ $item->created_at->shortAbsoluteDiffForHumans() }}</small>
                                    </div>
                                    <div class="ms-auto">
                                        {{-- <a href="javascript:void(0)" class="icon d-inline-block tx-muted"><i
                                                class="fe fe-heart me-1 rounded-circle p-2 bg-gray-200 tx-muted"></i></a> --}}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @empty
                @endforelse

            </div>
        </div>
    </section>

    <section class="section bg-pattern-2 bg-image2">
        <div class="container">
            <div class="heading-section">
                <div class="heading-title text-white">{{ __('admin/knowledge.department') }}</div>
                <div class="heading-description text-white op-8">{{ __('admin/knowledge.category_details') }}</div>
            </div>
            <div class="row align-items-center">
                @forelse ($knowledge_category as $item)
                    <div class="col-lg-3 col-sm-6">
                        <div class="card text-center feature-card-16 mb-lg-0">
                            <div class="card-body">
                                <svg class="feature-icon br-style1 primary mb-3" xmlns="http://www.w3.org/2000/svg"
                                    height="60" width="60" enable-background="new 0 0 24 24" viewBox="0 0 24 24">
                                    <path fill="#729af0"
                                        d="M15 20.5H7c-1.7 0-3-1.3-3-3v-5.3c0-.6.4-1 1-1h12c.6 0 1 .4 1 1v5.3c0 1.7-1.3 3-3 3z" />
                                    <path fill="#1457e6"
                                        d="m21.5 10.2-1-.5-9-5c-.3-.2-.7-.2-1 0l-9 5c-.5.2-.6.8-.4 1.3.1.2.2.3.4.4l9 5c.3.2.7.2 1 0l8.5-4.7v2.9c0 .6.4 1 1 1s1-.4 1-1v-3.4c0-.5-.2-.8-.5-1z" />
                                </svg>
                                <h4 class="">{{ $item->name }}</h4>
                                {{-- <h2 class="counter tx-primary  mb-0">{{ $item->news->count() }}</h2> --}}
                            </div>
                        </div>
                    </div>
                @empty
                @endforelse


            </div>
        </div>
    </section>

    <section class="section overflow-hidden">
        <div class="container">
            <div class="heading-section">
                <div class="heading-subtitle"><span class="tx-primary tx-16 fw-semibold">{{ __('admin/job.jobs') }}</span></div>
              
            </div>
            <div class="row align-items-center">
                <div class="col-xl-3 text-center text-lg-start feature-client-bg">
                    <span><i class="bi bi-quote tx-secondary tx-50"></i></span>
                    <p class="h3 mb-5">{{ __('admin/job.some') }}</p>
                    <div class="swiper-pagination"></div>
                </div>
                <div class="col-xl-9">
                    <div class="bg-client position-relative">
                        <img src="../assets/images/patterns/9.png" alt="img"
                            class="patterns-11 z-index-0 filter-invert op-2">
                        <div class="swiper testimonialSwiper">
                            <div class="swiper-wrapper">
                              
                                   @forelse ($jobs as $item)
                                          <div class="swiper-slide">
                                    <div class="card shadow-none mb-0">
                                        <div class="card-body">
                                            <div class="d-flex align-items-center">
                                                <img src="../assets/images/profile/1.jpg" alt="img"
                                                    class="avatar avatar-lg rounded-circle me-2">
                                                <div class="flex-grow-1">
                                                    <h6 class="mb-0 text-white">{{ $item->title }}</h6>
                                                    <span class="tx-11">{{ $item->created_at->shortAbsoluteDiffForHumans() }}</span>
                                                </div>
                                                <i class="bi bi-quote review-quote"></i>
                                            </div>
                                            <p class="mt-2 mb-0 tx-14">
                                                {{ $item->description }}
                                            </p>
                                        </div>
                                    </div>
                                </div>
                                   
                                   @empty
                                       
                                   @endforelse
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    </div>
@endsection
