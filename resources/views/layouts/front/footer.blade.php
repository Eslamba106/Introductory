        <!-- Start::footer -->
        <footer class="footer bg-primary mt-auto text-white position-relative">
            <img src="{{ asset('assets/images/patterns/9.png') }}" alt="img" class="patterns-9 z-index-0">
            <img src="{{ asset('assets/images/patterns/6.png') }}" alt="img" class="patterns-4 z-index-0">
            <img src="{{ asset('assets/images/patterns/11.png') }}" alt="img" class="patterns-3 z-index-0">
            <div class="py-5">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-3 col-md-6 mb-4 mb-lg-0">
                            {{-- <a href="index.html" class="d-inline-block mb-3"><img src="../assets/images/brand/logo-white.png" alt="img"></a>
                            <p class="mb-4 op-8 fw-light">
                                At dolor clita amet erat takimata sed tempor invidunt lorem.
                                Justo sea nonumy.
                            </p> --}}
                            <ul class="list-unstyled mb-0">
                                <li class="list-item mb-2"><a href="register-domain.html" class="footer-link"><i
                                            class="bi bi-telephone me-3 tx-18"></i>
                                        {{ $list_settings->phone ?? '+125 254 3562' }}</a></li>
                                <li class="list-item mb-2"><a href="register-domain.html" class="footer-link"><i
                                            class="bi bi-envelope-plus me-3 tx-18"></i>{{ $list_settings->email ?? 'hostma@company.com' }}</a>
                                </li>
                                <li class="list-item"><a href="register-domain.html" class="footer-link"><i
                                            class="bi bi-geo-alt me-3 tx-18"></i>{{ $list_settings->address ?? 'San Francisco, CA' }}</a>
                                </li>
                            </ul>
                            <div class="footer-btn-list d-flex align-items-center mt-4">
                                <a href="{{ $list_settings->facebook ?? '#' }}"
                                    class="footer-btn btn btn-icon btn-info-dark rounded-circle me-2"><i
                                        class="bi bi-facebook"></i></a>
                                <a href="{{ $list_settings->linked_in ?? '#' }}"
                                    class="footer-btn btn btn-icon btn-info-dark rounded-circle me-2"><i
                                        class="bi bi-linkedin"></i></a>
                                <a href="{{ $list_settings->instagram ?? '#' }}"
                                    class="footer-btn btn btn-icon btn-info-dark rounded-circle me-2"><i
                                        class="bi bi-instagram"></i></a>
                                <a href="{{ $list_settings->x ?? '#' }}"
                                    class="footer-btn btn btn-icon btn-info-dark rounded-circle"><i
                                        class="bi bi-twitter"></i></a>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6 mb-4 mb-lg-0">
                            <h4 class="text-white">{{ __('admin/blog.department') }}</h4>
                            <ul class="list-unstyled footer-icon">
                                @forelse ($blog_departments as $item)
                                    <li class="list-item mb-2"><a href="register-domain.html"
                                            class="footer-link">{{ $item->name }}</a></li>

                                @empty
                                    {{ __('admin/blog.no_department') }}
                                @endforelse
                            </ul>
                        </div>
                        <div class="col-lg-3 col-md-6 mb-4 mb-lg-0">
                            <h4 class="text-white">{{ __('admin/news.news') }}</h4>
                            <ul class="list-unstyled footer-icon">
                                @forelse ($news as $item)
                                    <li class="list-item mb-2"><a href="linux-shared-hosting.html"
                                            class="footer-link">{{ $item->name }}</a></li>
                                @empty
                                    {{ __('admin/news.no_categories') }}
                                @endforelse
                            </ul>
                        </div>
                        <div class="col-lg-3 col-sm-6 mb-4 mb-lg-0">
                            {{-- <h4 class="text-white">Get in Touch With Us</h4>
                            <form action="javascript:void(0);" class="form mb-4">
                                <div class="form-group custom-form-group">
                                    <input type="text" class="form-control rounded-pill border-0"
                                        placeholder="Enter Your Email...">
                                    <button
                                        class="custom-form-btn btn-icon btn btn-primary bg-primary-gradient rounded-circle border-0 right-0 me-1 py-2 px-2 shadow-none"
                                        type="button"><i class="fe fe-arrow-right"></i></button>
                                </div>
                            </form> --}}
                            <h4 class="text-white">{{ __('admin/knowledge.department') }}</h4>
                            <ul class="list-unstyled footer-icon">
                                @forelse ($knowledge_category as $item)
                                    <li class="list-item mb-2"><a href="blog.html"
                                            class="footer-link">{{ $item->name }}</a></li>

                                @empty
                                    {{ __('admin/knowledge.no_explained') }}
                                @endforelse
                            </ul>
                        </div>
                    </div>

                </div>
            </div>

            <div class="py-3 border-top border-white-2 text-center">
                <div class="container">
                    <span class="tx-14 op-8">
                        Copyright &#169;
                        <span id="year"></span>
                        <a href="{{ config('app.developer_link') }}" class="text-white">Badawy</a>
                        Designed with
                        <span class="fa fa-heart tx-danger"></span>
                        by
                        <a href="{{ config('app.developer_link') }}"
                            class="text-white">{{ config('app.developer_name') }}</a>
                        All Rights Reserved
                    </span>
                </div>
            </div>
        </footer>
        <!-- End::footer -->


        </div>

        <div id="cookieNotice" class="accept-cookies">
            <div id="closeIcon">
            </div>
            <div class="title-wrap">
                <h4>Cookies & Privacy Policy?</h4>
            </div>
            <div class="content-wrap">
                <div class="msg-wrap">
                    <p class="mb-0">There are no cookies used on this site, but if there were this message could be
                        customised
                        to provide more details. Click the accept button below to see the optional callback in action...
                    </p>
                    <a href="privacy-policy.html" class="tx-primary plain-link">More information</a>
                    <div class="btn-wrap mt-3">
                        <button class="btn btn-primary" onclick="acceptCookie();">Accept Cookies</button>
                        <button class="btn btn-secondary" id="customize">Customise Cookies</button>
                    </div>
                    <div class="mt-3 d-none" id="customizeCookie">
                        <h6>Select cookies to accept</h6>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="" id="check1"
                                        checked disabled>
                                    <label class="form-check-label" for="check1">
                                        Necessary
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="" id="check2">
                                    <label class="form-check-label" for="check2">
                                        Site Preferences
                                    </label>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="" id="check3">
                                    <label class="form-check-label" for="check3">
                                        Analytics
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="" id="check4">
                                    <label class="form-check-label" for="check4">
                                        Marketing
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
