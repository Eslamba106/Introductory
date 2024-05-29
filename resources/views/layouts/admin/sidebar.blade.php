<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{ route('admin.dashboard') }}" class="brand-link">
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

                {{-- settings --}}
                <li class="nav-item has-treeview menu-open">
                    <a href="#" class="nav-link {{ request()->is('admin/settings*') ? 'active' : '' }}">
                        <p>
                            {{ __('admin/settings.settings') }}
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        {{-- Start General Settings --}}
                        <li class="nav-item">
                            <a href="#" class="nav-link {{ request()->is('admin/settings/general*') ? 'active' : '' }}">
                                {{-- <i class="far fa-circle nav-icon"></i> --}}
                                <p>&nbsp;&nbsp;&nbsp;&nbsp;{{ __('admin/settings.website_settings') }}</p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li>
                                    <a href="{{ route('admin.settings') }}"
                                        class="nav-link {{ request()->is('admin/settings/general/index*') ? 'active' : '' }}">
                                        <p> &nbsp;&nbsp;&nbsp;&nbsp;--&nbsp;{{ __('admin/settings.website_settings') }}
                                        </p>
                                    </a>
                                </li>
                                <li>
                                    <a href="{{ route('admin.settings.edit') }}"
                                        class="nav-link {{ request()->is('admin/settings/general/edit*') ? 'active' : '' }}">


                                        <p> &nbsp;&nbsp;&nbsp;&nbsp;--&nbsp;{{ __('admin/settings.edit') }} </p>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        {{-- End General Settings --}}

                        {{-- Start List Settings --}}
                        <li class="nav-item">

                            <a href="#"
                                class="nav-link {{ request()->is('admin/settings/list_settings*') ? 'active' : '' }}">
                                &nbsp;&nbsp;&nbsp;&nbsp;
                                {{-- #{{ route('list_settings') }} --}}
                                <p>{{ __('admin/settings.list_settings') }}</p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li>
                                    <a href="{{ route('admin.list_settings') }}"
                                        class="nav-link {{ request()->is('admin/settings/list_settings*') ? 'active' : '' }}">
                                        <p> &nbsp;&nbsp;&nbsp;&nbsp;--&nbsp;{{ __('admin/settings.list_settings') }}
                                        </p>
                                    </a>
                                </li>
                                <li>
                                    <a href="{{ route('admin.list_settings.edit') }}"
                                        class="nav-link {{ request()->is('admin/settings/edit*') ? 'active' : '' }}">


                                        <p> &nbsp;&nbsp;&nbsp;&nbsp;--&nbsp;{{ __('admin/settings.edit') }} </p>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item">

                            <a href="#"
                                class="nav-link {{ request()->is('admin/settings/nav*') ? 'active' : '' }}">
                                &nbsp;&nbsp;&nbsp;&nbsp;
                                {{-- #{{ route('list_settings') }} --}}
                                <p>{{ __('admin/settings.main_nav') }}</p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li>
                                    <a href="{{ route('admin.nav') }}"
                                        class="nav-link {{ request()->is('admin/settings/nav*') ? 'active' : '' }}">
                                        <p> &nbsp;&nbsp;&nbsp;&nbsp;--&nbsp;{{ __('admin/settings.list_settings') }}
                                        </p>
                                    </a>
                                </li>
                                <li>
                                    <a href="#"
                                        class="nav-link {{ request()->is('admin/settings/nav/edit*') ? 'active' : '' }}">


                                        <p> &nbsp;&nbsp;&nbsp;&nbsp;--&nbsp;{{ __('admin/settings.edit') }} </p>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item">

                            <a href="#"
                                class="nav-link {{ request()->is('admin/settings/nav*') ? 'active' : '' }}">
                                &nbsp;&nbsp;&nbsp;&nbsp;
                                {{-- #{{ route('list_settings') }} --}}
                                <p>{{ __('admin/settings.part_nav') }}</p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li>
                                    <a href="{{ route('admin.nav') }}"
                                        class="nav-link {{ request()->is('admin/settings/list_settings*') ? 'active' : '' }}">
                                        <p> &nbsp;&nbsp;&nbsp;&nbsp;--&nbsp;{{ __('admin/settings.list_settings') }}
                                        </p>
                                    </a>
                                </li>
                                <li>
                                    <a href="#"
                                        class="nav-link {{ request()->is('admin/settings/edit*') ? 'active' : '' }}">


                                        <p> &nbsp;&nbsp;&nbsp;&nbsp;--&nbsp;{{ __('admin/settings.edit') }} </p>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        {{-- <li class="nav-item">

                            <a href="#"
                                class="nav-link {{ request()->is('admin/settings/list_settings*') ? 'active' : '' }}">
                                &nbsp;&nbsp;&nbsp;&nbsp;
                                {{-- #{{ route('list_settings') }} 
                                <p>{{ __('admin/settings.part_nav') }}</p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li>
                                    <a href="{{ route('admin.list_settings') }}"
                                        class="nav-link {{ request()->is('admin/settings/list_settings*') ? 'active' : '' }}">
                                        <p> &nbsp;&nbsp;&nbsp;&nbsp;--&nbsp;{{ __('admin/settings.list_settings') }}
                                        </p>
                                    </a>
                                </li>
                                <li>
                                    <a href="{{ route('admin.list_settings.edit') }}"
                                        class="nav-link {{ request()->is('admin/settings/edit*') ? 'active' : '' }}">


                                        <p> &nbsp;&nbsp;&nbsp;&nbsp;--&nbsp;{{ __('admin/settings.edit') }} </p>
                                    </a>
                                </li>
                            </ul>
                        </li> --}}
                        {{-- End List Settings --}}


                    </ul>
                </li>


                {{-- Start Pages --}}
                <li class="nav-item">
                    <a href="#" class="nav-link {{ request()->is('admin/pages*') ? 'active' : '' }}">
                        <p>
                            {{ __('admin/pages.pages') }}
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('admin.page.index') }}"
                                class="nav-link {{ request()->is('admin/pages/index') ? 'active' : '' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>{{ __('admin/pages.pages') }}</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('admin.create-page') }}"
                                class="nav-link {{ request()->is('admin/pages/create') ? 'active' : '' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>{{ __('admin/pages.page_create') }}</p>
                            </a>
                        </li>
                        <li class="nav-item">
                          <a href="" class="nav-link {{ (request()->is('admin/pages/edit')) ? 'active' : '' }}">
                            <i class="far fa-circle nav-icon"></i>
                            <p>{{ __('admin/pages.page_edit') }}</p>
                          </a>
                      </li>
                        <li class="nav-item">
                            <a href="#"
                                class="nav-link {{ request()->is('admin/pages/show/*') ? 'active' : '' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>{{ __('admin/pages.page_show') }}</p>
                            </a>
                        </li>

                    </ul>
                </li>
                {{-- End Pages --}}

                
                {{-- Start Moderatory --}}
                <li class="nav-item">
                    <a href="#" class="nav-link {{ request()->is('admin/moderator*') ? 'active' : '' }}">
                        <p>
                            {{ __('admin/settings.moderators') }}
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('moderator.index') }}"
                                class="nav-link {{ request()->is('admin/moderator/') ? 'active' : '' }}">
                                &nbsp;&nbsp;&nbsp;&nbsp;
                                <p>{{ __('admin/moderator.moderators') }}</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('moderator.create') }}"
                                class="nav-link {{ request()->is('admin/moderator/create') ? 'active' : '' }}">
                                &nbsp;&nbsp;&nbsp;&nbsp;
                                <p>{{ __('admin/moderator.add_moderator') }}</p>
                            </a>
                        </li>
      
                        <li class="nav-item">
                            <a href="#"
                                class="nav-link {{ request()->is('admin/moderator/edit*') ? 'active' : '' }}">
                                &nbsp;&nbsp;&nbsp;&nbsp;
                                <p>{{ __('admin/moderator.edit_moderator') }}</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('roles.index') }}"
                                class="nav-link {{ request()->is('admin/roles*') ? 'active' : '' }}">
                                &nbsp;&nbsp;&nbsp;&nbsp;
                                <p>{{ __('admin/moderator.roles') }}</p>
                            </a>
                        </li>

                    </ul>
                </li>
                {{-- End Moderatory --}}

                {{-- Start Blog --}}
                <li class="nav-item">
                    <a href="" class="nav-link {{ request()->is('admin/blog*') ? 'active' : '' }} ">
                        <p>
                            {{ __('admin/settings.blog') }}
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('admin.blog_department.index') }}"
                                class="nav-link {{ request()->is('admin/blog/department/index') ? 'active' : '' }}">
                                &nbsp;&nbsp;&nbsp;&nbsp;
                                <p>{{ __('admin/blog.departments') }}</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('admin.blog_artical.index') }}"
                                class="nav-link {{ request()->is('admin/blog/artical/index') ? 'active' : '' }}">
                                &nbsp;&nbsp;&nbsp;&nbsp;
                                <p>{{ __('admin/blog.articals') }}</p>
                            </a>
                        </li>
                    </ul>
                </li>
                {{-- End Blog --}}

                {{-- Start News And Ads --}}
                <li class="nav-item">
                    <a href="#" class="nav-link {{ request()->is('admin/news*') ? 'active' : '' }}">
                        <p>
                            {{ __('admin/news.news_ads') }}
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('admin.news_categories.index') }}"
                                class="nav-link {{ request()->is('admin/news/categories*') ? 'active' : '' }}">
                                &nbsp;&nbsp;&nbsp;&nbsp;
                                <p>{{ __('admin/news.category') }}</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('admin.news_ads.index') }}"
                                class="nav-link {{ request()->is('admin/news/news_ads*') ? 'active' : '' }}">
                                &nbsp;&nbsp;&nbsp;&nbsp;
                                <p>{{ __('admin/news.news') }}</p>
                            </a>
                        </li>
                    </ul>
                </li>
                {{-- End News And Ads --}}

                {{-- Start Knowledge Center --}}
                <li class="nav-item">
                    <a href="#" class="nav-link {{ request()->is('admin/knowledge*') ? 'active' : '' }}">
                        <p>
                            {{ __('admin/settings.knowledge') }}
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('admin.knowledge_categories.index') }}"
                                class="nav-link {{ request()->is('admin/knowledge/categories*') ? 'active' : '' }}">
                                &nbsp;&nbsp;&nbsp;&nbsp;
                                <p>{{ __('admin/news.category') }}</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('admin.knowledge_center.index') }}"
                                class="nav-link {{ request()->is('admin/knowledge/center*') ? 'active' : '' }}">
                                &nbsp;&nbsp;&nbsp;&nbsp;
                                <p>{{ __('admin/settings.knowledge') }}</p>
                            </a>
                        </li>
                    </ul>
                </li>
                {{-- End Knowledge Center --}}

                {{-- Start Employment Applications --}}
                <li class="nav-item">
                    <a href="#" class="nav-link  {{ request()->is('admin/job*') ? 'active' : '' }}">
                        <p>
                            {{ __('admin/settings.employment') }}
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('admin.job') }}"
                                class="nav-link {{ request()->is('admin/job') ? 'active' : '' }}">
                                &nbsp;&nbsp;&nbsp;&nbsp;
                                <p>{{ __('admin/job.jobs') }}</p>
                            </a>
                        </li>
                    </ul>
                </li>
                {{-- End Employment Applications --}}

                {{-- Start Contact Us --}}
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <p>
                            {{ __('admin/settings.contact') }}
                        </p>
                    </a>
                </li>
                {{-- End Contact Us --}}
            </ul>

        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>


