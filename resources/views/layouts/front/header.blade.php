    <div class="head_menu_container">


        <div class="sticky">
            <!-- Start::app-sidebar -->
            <aside class="app-sidebar" id="sidebar">

                <div class="app-toggle-header">
                    <div class="header-element">
                        <!-- Start::header-link -->
                        <a href="javascript:void(0);" class="sidemenu-toggle header-link" data-bs-toggle="sidebar">
                            <span class="close-toggle">
                                <i class="bi bi-x header-link-icon"></i>
                            </span>
                        </a>
                        <!-- End::header-link -->
                    </div>
                    <!-- End::header-element -->
                    <a href="index.html" class="brand-main">
                        <img src="../assets/images/brand/logo-white.png" alt="img" class="desktop-logo logo-dark">
                        <img src="../assets/images/brand/logo-color.png" alt="img" class="desktop-logo logo-color">
                    </a>
                </div>

                <!-- Start::main-sidebar -->
                <div class="main-sidebar container" id="sidebar-scroll">

                    <!-- Start::nav -->
                    <nav class="main-menu-container nav nav-pills sub-open">
                        <ul class="main-menu">

                            <!-- Start::slide -->
                            <li class="slide has-sub">
                                <a href="{{ url('/') }}" class="side-menu__item">
                                    <span class="side-menu__label">{{ __('main.home') }}</span>
                                    <i class="fe fe-chevron-down side-menu__angle"></i>
                                </a>
                                <ul class="slide-menu child1 mega-slide-menu-onefr without-icon">

                                </ul>
                            </li>
                            <!-- End::slide -->

                            <!-- Start::slide -->
                            <li class="slide has-sub">
                                <a href="javascript:void(0);" class="side-menu__item">
                                    <span class="side-menu__label">{{ __('admin/settings.blog') }}</span>
                                    <i class="fe fe-chevron-down side-menu__angle"></i>
                                </a>
                                <ul class="slide-menu child1 mega-slide-menu-onefr without-icon">
                                    <li class="mega-menu">
                                        <div class="">
                                            <ul>
                                                <li>
                                                    <p class="mb-3 d-flex align-items-center menu-label">
                                                        <i class="bi bi-journal-text tx-primary tx-18 me-2"></i>
                                                        <span
                                                            class="tx-14 tx-primary">{{ __('admin/blog.departments') }}</span>
                                                    </p>
                                                </li>
                                                @forelse ($blog_departments as $item)
                                                    <li class="slide">
                                                        <a href="register-domain.html" class="side-menu__item">
                                                            <div class="d-lg-flex align-items-start">
                                                                <div class="me-3">
                                                                    <span
                                                                        class="avatar header__dropavatar mb-2 bg-secondary-transparent rounded-circle">
                                                                        <i
                                                                            class="bi bi-hdd-stack me-0 tx-secondary"></i>
                                                                    </span>
                                                                </div>
                                                                <div class="flex-grow-1">
                                                                    <h6 class="d-block mb-1">{{ $item->name }}</h6>
                                                                    <span
                                                                        class="tx-default tx-14">{{ $item->created_at->shortAbsoluteDiffForHumans() }}</span>
                                                                </div>
                                                            </div>
                                                        </a>
                                                    </li>
                                                @empty
                                                    {{ __('admin/blog.no_department') }}
                                                @endforelse

                                            </ul>
                                        </div>
                                        <div class="">
                                            <ul>
                                                <li>
                                                    <p class="mb-3 d-flex align-items-center menu-label">
                                                        <i class="bi bi-arrow-left-right tx-primary tx-18 me-2"></i>
                                                        <span
                                                            class="tx-14 tx-primary">{{ __('admin/blog.articals') }}</span>
                                                    </p>
                                                </li>
                                                @forelse ($blog_artical as $item)
                                                    <li class="slide">
                                                        <a href="domain-transfer.html" class="side-menu__item">
                                                            <div class="d-lg-flex align-items-start">
                                                                <div class="me-3">
                                                                    <span
                                                                        class="avatar header__dropavatar mb-2 bg-pink-transparent rounded-circle">
                                                                        <i
                                                                            class="bi bi-arrow-right-circle me-0 tx-pink"></i>
                                                                    </span>
                                                                </div>
                                                                <div class="flex-grow-1">
                                                                    <h6 class="d-block mb-1">{{ $item->title }}</h6>
                                                                    <span
                                                                        class="tx-default tx-14">{{ $item->created_at->shortAbsoluteDiffForHumans() }}</span>
                                                                </div>
                                                            </div>
                                                        </a>
                                                    </li>
                                                @empty
                                                    {{ __('admin/blog.no_artical') }}
                                                @endforelse

                                            </ul>
                                        </div>

                                    </li>
                                </ul>
                            </li>
                            <!-- End::slide -->

                            <!-- Start::slide -->
                            <li class="slide has-sub">
                                <a href="javascript:void(0);" class="side-menu__item">
                                    <span class="side-menu__label">{{ __('admin/news.news') }}</span>
                                    <i class="fe fe-chevron-down side-menu__angle"></i>

                                </a>
                                <ul class="slide-menu child1 mega-slide-menu-onefr without-icon">
                                    <li class="mega-menu">
                                        <div class="">
                                            <ul>
                                                <li>
                                                    <p class="mb-3 d-flex align-items-center menu-label">
                                                        <i class="bi bi-bar-chart tx-primary tx-18 me-2"></i>
                                                        <span
                                                            class="tx-14 tx-primary">{{ __('admin/news.category') }}</span>
                                                    </p>
                                                </li>
                                                @forelse ($news_category as $item)
                                                    <li class="slide">
                                                        <a href="weebly.html" class="side-menu__item">
                                                            <div class="d-lg-flex align-items-start">
                                                                <div class="me-3">
                                                                    <span
                                                                        class="avatar header__dropavatar mb-2 bg-secondary-transparent rounded-circle">
                                                                        <i class="bi bi-wikipedia me-0 tx-danger"></i>
                                                                    </span>
                                                                </div>
                                                                <div class="flex-grow-1">
                                                                    <h6 class="d-block mb-1">{{ $item->name }}
                                                                        {{-- <span class="badge bg-danger blink-text">New</span> --}}
                                                                    </h6>
                                                                    <span class="tx-default tx-14">
                                                                        @if ($item->parent != null)
                                                                            {{ $item->parent->name }}
                                                                        @endif
                                                                    </span>
                                                                </div>
                                                            </div>
                                                        </a>
                                                    </li>
                                                @empty
                                                    {{ __('admin/news.no_category') }}
                                                @endforelse


                                            </ul>
                                        </div>
                                        <div class="">
                                            <ul>
                                                <li>
                                                    <p class="mb-3 d-flex align-items-center menu-label">
                                                        <i class="bi bi-palette tx-primary tx-18 me-2"></i>
                                                        <span
                                                            class="tx-14 tx-primary">{{ __('admin/news.news') }}</span>
                                                    </p>
                                                </li>
                                                @forelse ($news as $item)
                                                    <li class="slide">
                                                        <a href="javascript:void(0);" class="side-menu__item">
                                                            <div class="d-lg-flex align-items-start">
                                                                <div class="me-3">
                                                                    <span
                                                                        class="avatar header__dropavatar mb-2 rounded-circle bg-purple-transparent">
                                                                        <i class="bi bi-palette2 me-0 tx-purple"></i>
                                                                    </span>
                                                                </div>
                                                                <div class="flex-grow-1">
                                                                    <h6 class="d-block mb-1">
                                                                        {{ $item->title }}
                                                                    </h6>
                                                                    <?php $writer = App\Models\User::where('id', $item->writer)->first(); ?>
                                                                    <span class="tx-default tx-14"> {{ $writer->name }}
                                                                    </span>
                                                                </div>
                                                            </div>
                                                        </a>
                                                    </li>
                                                @empty
                                                    {{ __('admin/news.no_news') }}
                                                @endforelse

                                            </ul>
                                        </div>
                                    </li>
                                </ul>
                            </li>
                            <!-- End::slide -->

                            <!-- Start::slide -->
                            <li class="slide has-sub">
                                <a href="javascript:void(0);" class="side-menu__item">
                                    <span class="side-menu__label">{{ __('admin/knowledge.knowledge') }}</span>
                                    <i class="fe fe-chevron-down side-menu__angle"></i>

                                </a>
                                <ul class="slide-menu child1 mega-slide-menu mega-slide-menu-onefr without-icon">
                                    <li class="mega-menu">
                                        <div class="">
                                            <ul>
                                                <li>
                                                    <p class="mb-3 d-flex align-items-center menu-label">
                                                        <i class="bi bi-hdd-rack tx-primary tx-18 me-2"></i>
                                                        <span
                                                            class="tx-14 tx-primary">{{ __('admin/knowledge.department') }}</span>
                                                    </p>
                                                </li>
                                                @forelse ($knowledge_category as $item)
                                                    <li class="slide">
                                                        <a href="linux-shared-hosting.html" class="side-menu__item">
                                                            <div class="d-lg-flex align-items-start">
                                                                <div class="me-3">
                                                                    <span
                                                                        class="avatar header__dropavatar mb-2 bg-secondary-transparent rounded-circle">
                                                                        <i
                                                                            class="bi bi-database me-0 tx-secondary"></i>
                                                                    </span>
                                                                </div>
                                                                <div class="flex-grow-1">
                                                                    <h6 class="d-block mb-1">{{ $item->name }}</h6>
                                                                    <span
                                                                        class="tx-default tx-14">{{ $item->created_at->shortAbsoluteDiffForHumans() }}</span>
                                                                </div>
                                                            </div>
                                                        </a>
                                                    </li>
                                                @empty
                                                    {{ __('admin/knowledge.no_explained') }}
                                                @endforelse


                                            </ul>
                                        </div>
                                        <div class="">
                                            <ul>
                                                <li>
                                                    <p class="mb-3 d-flex align-items-center menu-label">
                                                        <i class="bi bi-hdd-network tx-primary tx-18 me-2"></i>
                                                        <span
                                                            class="tx-14 tx-primary">{{ __('admin/knowledge.knowledge') }}</span>
                                                    </p>
                                                </li>
                                                @forelse ($knowledge_center as $item)
                                                    <li class="slide">
                                                        <a href="windows-dedicated-server.html"
                                                            class="side-menu__item">
                                                            <div class="d-lg-flex align-items-start">
                                                                <div class="me-3">
                                                                    <span
                                                                        class="avatar header__dropavatar mb-2 rounded-circle bg-danger-transparent">
                                                                        <i class="bi bi-windows me-0 tx-danger"></i>
                                                                    </span>
                                                                </div>
                                                                <div class="flex-grow-1">
                                                                    <h6 class="d-block mb-1">{{ $item->title }}</h6>
                                                                    <span
                                                                        class="tx-default tx-14">{{ $item->created_at->shortAbsoluteDiffForHumans() }}</span>
                                                                </div>
                                                            </div>
                                                        </a>
                                                    </li>
                                                @empty
                                                    {{ __('admin/knowledge.no_explained') }}
                                                @endforelse

                                            </ul>
                                        </div>

                                    </li>
                                </ul>
                            </li>
                            <!-- End::slide -->

                            <!-- Start::slide -->
                            <li class="slide has-sub">
                                <a href="javascript:void(0);" class="side-menu__item">
                                    <span class="side-menu__label">{{ __('admin/job.jobs') }}</span>
                                    <i class="fe fe-chevron-down side-menu__angle"></i>
                                </a>
                                <ul class="slide-menu child1 mega-slide-menu-onefr">
                                    <li class="mega-menu">
                                        <div class="">
                                            <ul>
                                                @forelse ($jobs as $item)
                                                    <li class="slide">
                                                        <a href="cloud.html" class="side-menu__item">
                                                            <div class="d-lg-flex align-items-start">
                                                                <div class="me-3">
                                                                    <span
                                                                        class="avatar header__dropavatar mb-2 bg-warning-transparent rounded-circle">
                                                                        <i class="bi bi-cloud me-0 tx-warning"></i>
                                                                    </span>
                                                                </div>
                                                                <div class="flex-grow-1">
                                                                    <h6 class="d-block mb-1">{{ $item->title }}</h6>
                                                                    <span
                                                                        class="tx-default tx-14">{{ $item->created_at->shortAbsoluteDiffForHumans() }}</span>
                                                                </div>
                                                            </div>
                                                        </a>
                                                    </li>
                                                @empty
                                                    {{ __('admin/job.no_job') }}
                                                @endforelse

                                            </ul>
                                        </div>
                                    </li>
                                </ul>
                            </li>
                            <!-- End::slide -->

                            <!-- Start::slide -->
                            <!-- End::slide -->
                            <li class="slide has-sub">
                                <a href="javascript:void(0);" class="side-menu__item">
                                    <span class="side-menu__label">{{ __('admin/settings.contact') }}</span>
                                    <i class="fe fe-chevron-down side-menu__angle"></i>
                                </a>
                                <ul class="slide-menu child1 mega-slide-menu-onefr without-icon">
                                    <li class="mega-menu">
                                        <div class="">
                                            <ul>
                                                <li>
                                                    <p class="mb-3 d-flex align-items-center menu-label">
                                                        <i class="bi bi-envelope tx-primary tx-18 me-2"></i>
                                                        <span class="tx-14 tx-primary">Email</span>
                                                    </p>
                                                </li>
                                                <li class="slide">
                                                    <a href="business-email.html" class="side-menu__item">
                                                        <div class="d-lg-flex align-items-start">
                                                            <div class="me-3">
                                                                <span
                                                                    class="avatar header__dropavatar mb-2 bg-teal-transparent rounded-circle">
                                                                    <i class="bi bi-envelope me-0 tx-teal"></i>
                                                                </span>
                                                            </div>
                                                            <div class="flex-grow-1">
                                                                <h6 class="d-block mb-1">Business Email</h6>
                                                                <span class="tx-default tx-14">Simple and powerful
                                                                    webmail.</span>
                                                            </div>
                                                        </div>
                                                    </a>
                                                </li>
                                            </ul>
                                        </div>
                                        <div class="">
                                            <ul>
                                                <li>
                                                    <p class="mb-3 d-flex align-items-center menu-label">
                                                        <i class="bi bi-envelope-plus tx-primary tx-18 me-2"></i>
                                                        <span class="tx-14 tx-primary">Email &amp; Productvity</span>
                                                    </p>
                                                </li>
                                                <li class="slide">
                                                    <a href="google-workspace.html" class="side-menu__item">
                                                        <div class="d-lg-flex align-items-start">
                                                            <div class="me-3">
                                                                <span
                                                                    class="avatar header__dropavatar mb-2 rounded-circle bg-secondary-transparent">
                                                                    <i class="bi bi-google me-0 tx-secondary"></i>
                                                                </span>
                                                            </div>
                                                            <div class="flex-grow-1">
                                                                <h6 class="d-block mb-1">Google Workspace</h6>
                                                                <span class="tx-default tx-14">Cloud based email and
                                                                    productivity
                                                                    suite.</span>
                                                            </div>
                                                        </div>
                                                    </a>
                                                </li>
                                                <li class="slide">
                                                    <a href="enterprise-email.html" class="side-menu__item">
                                                        <div class="d-lg-flex align-items-start">
                                                            <div class="me-3">
                                                                <span
                                                                    class="avatar header__dropavatar mb-2 rounded-circle bg-purple-transparent">
                                                                    <i class="bi bi-inbox me-0 tx-purple"></i>
                                                                </span>
                                                            </div>
                                                            <div class="flex-grow-1">
                                                                <h6 class="d-block mb-1">Enterprise Email <span
                                                                        class="badge bg-danger blink-text">New</span>
                                                                </h6>
                                                                <span class="tx-default tx-14">Advanced and
                                                                    Corporate-class
                                                                    email.</span>
                                                            </div>
                                                        </div>
                                                    </a>
                                                </li>
                                            </ul>
                                        </div>
                                    </li>
                                </ul>
                            </li>
                            <li class="slide has-sub">
                                <a href="javascript:void(0);" class="side-menu__item">
                                    <span class="side-menu__label">{{ __('admin/general.lang') }}</span>
                                    <i class="fe fe-chevron-down side-menu__angle"></i>
                                </a>
                                <ul class="slide-menu child1 mega-slide-menu-onefr without-icon">
                                    <li class="mega-menu">
                                        <div class="">
                                            <ul>

                                                <li class="slide">
                                                    <a href="{{ route('lang', 'ar') }}" class="dropdown-item">
                                                        {{ __('admin/general.arabic') }}
                                                        <span class="float-right text-muted text-sm">
                                                            <img src="{{ URL::asset('images/flags/SA.png') }}"
                                                                alt="">

                                                        </span>
                                                    </a>
                                                </li>
                                                <li class="slide">
                                                    <a href="{{ route('lang', 'en') }}" class="dropdown-item">
                                                        {{ __('admin/general.english') }}
                                                        <span class="float-right text-muted text-sm">
                                                            <img src="{{ URL::asset('images/flags/US.png') }}"
                                                                alt="">

                                                        </span>
                                                    </a>
                                                </li>
                                            </ul>
                                        </div>

                                    </li>
                                </ul>
                            </li>



                            <!-- End::slide -->

                        </ul>
                        <div class="d-xl-flex d-lg-none d-grid gap-2 text-center ">

                            @if (auth()->user())
                                <a href="{{ route('logout.admin') }}"
                                    class="btn btn-secondary min-w-fit-content">{{ __('main.logout') }}</a>
                            @else
                                <a href="{{ route('moderator.login-page') }}"
                                    class="btn btn-outline-light login-btn min-w-fit-content">{{ __('login.login') }}</a>
                            @endif
                        </div>

                    </nav>
                    <!-- End::nav -->

                </div>
                <!-- End::main-sidebar -->

            </aside>
            <!-- End::app-sidebar -->
        </div>
    </div>
