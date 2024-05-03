<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{ route('moderator.dashboard') }}" class="brand-link">
        {{-- <img src="dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
            style="opacity: .8"> --}}
        @if (session()->has('locale') && session()->get('locale') == 'ar')
            <span class="brand-text font-weight-light">{{ $general_settings->webname_ar ?? 'موقعي' }}</span>
        @else
            <span class="brand-text font-weight-light">{{ $general_settings->webname_en ?? 'MyWebsite' }}</span>
        @endif
        {{-- <span class="brand-text font-weight-light">{{ __('admin/general.webname') }}</span> --}}
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="info">
                <a href="#" class="d-block">{{ auth()->user()->name }}</a>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->


                
      

                {{-- Start Blog --}}
                <li class="nav-item">
                    <a href="" class="nav-link {{ request()->is('user/blog*') ? 'active' : '' }} ">
                        <p>
                            {{ __('admin/settings.blog') }}
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('user.blog_department.index') }}"
                                class="nav-link {{ request()->is('user/blog/department/index') ? 'active' : '' }}">
                                &nbsp;&nbsp;&nbsp;&nbsp;
                                <p>{{ __('admin/blog.departments') }}</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('user.blog_artical.index') }}"
                                class="nav-link {{ request()->is('user/blog/artical/index') ? 'active' : '' }}">
                                &nbsp;&nbsp;&nbsp;&nbsp;
                                <p>{{ __('admin/blog.articals') }}</p>
                            </a>
                        </li>
                    </ul>
                </li>
                {{-- End Blog --}}

                {{-- Start News And Ads --}}
                <li class="nav-item">
                    <a href="#" class="nav-link {{ request()->is('user/news*') ? 'active' : '' }}">
                        <p>
                            {{ __('admin/news.news_ads') }}
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('user.news_categories.index') }}"
                                class="nav-link {{ request()->is('user/news/categories*') ? 'active' : '' }}">
                                &nbsp;&nbsp;&nbsp;&nbsp;
                                <p>{{ __('admin/news.category') }}</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('user.news_ads.index') }}"
                                class="nav-link {{ request()->is('user/news/news_ads*') ? 'active' : '' }}">
                                &nbsp;&nbsp;&nbsp;&nbsp;
                                <p>{{ __('admin/news.news') }}</p>
                            </a>
                        </li>
                    </ul>
                </li>
                {{-- End News And Ads --}}

                {{-- Start Knowledge Center --}}
                <li class="nav-item">
                    <a href="#" class="nav-link {{ request()->is('user/knowledge*') ? 'active' : '' }}">
                        <p>
                            {{ __('admin/settings.knowledge') }}
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('user.knowledge_categories.index') }}"
                                class="nav-link {{ request()->is('user/knowledge/categories*') ? 'active' : '' }}">
                                &nbsp;&nbsp;&nbsp;&nbsp;
                                <p>{{ __('admin/news.category') }}</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('user.knowledge_center.index') }}"
                                class="nav-link {{ request()->is('user/knowledge/center*') ? 'active' : '' }}">
                                &nbsp;&nbsp;&nbsp;&nbsp;
                                <p>{{ __('admin/settings.knowledge') }}</p>
                            </a>
                        </li>
                    </ul>
                </li>
                {{-- End Knowledge Center --}}

                {{-- Start Employment Applications --}}
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <p>
                            {{ __('admin/settings.employment') }}
                        </p>
                    </a>
                </li>
                {{-- End Employment Applications --}}

 
            </ul>

        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>



