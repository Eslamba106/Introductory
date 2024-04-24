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
                <a href="#" class="d-block">{{ auth()->guard('admin')->user()->name }}</a>
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
                    <a href="#" class="nav-link {{ request()->is('admin/moderators*') ? 'active' : '' }}">
                        <p>
                            {{ __('admin/settings.moderators') }}
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('admin.moderator.index') }}"
                                class="nav-link {{ request()->is('admin/moderators/index') ? 'active' : '' }}">
                                &nbsp;&nbsp;&nbsp;&nbsp;
                                <p>{{ __('admin/moderator.moderators') }}</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('admin.moderator.create') }}"
                                class="nav-link {{ request()->is('admin/moderators/create') ? 'active' : '' }}">
                                &nbsp;&nbsp;&nbsp;&nbsp;
                                <p>{{ __('admin/moderator.add_moderator') }}</p>
                            </a>
                        </li>
                        {{-- <li class="nav-item">
                            <a href="#"
                                class="nav-link {{ request()->is('admin/moderators/show') ? 'active' : '' }}">
                                &nbsp;&nbsp;&nbsp;&nbsp;
                                <p>{{ __('admin/moderator.show_moderator') }}</p>
                            </a>
                        </li> --}}
                        <li class="nav-item">
                            <a href="#"
                                class="nav-link {{ request()->is('admin/moderators/edit*') ? 'active' : '' }}">
                                &nbsp;&nbsp;&nbsp;&nbsp;
                                <p>{{ __('admin/moderator.edit_moderator') }}</p>
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
                            <a href="{{ route('admin.blog_artical.index') }}"
                                class="nav-link {{ request()->is('admin/news/categorie') ? 'active' : '' }}">
                                &nbsp;&nbsp;&nbsp;&nbsp;
                                <p>{{ __('admin/news.news') }}</p>
                            </a>
                        </li>
                    </ul>
                </li>
                {{-- End News And Ads --}}

                {{-- Start Knowledge Center --}}
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <p>
                            {{ __('admin/settings.knowledge') }}
                        </p>
                    </a>
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



{{-- 


    <!-- Main content -->
    <div class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-lg-6">
            <div class="card">
              <div class="card-body">
                <h5 class="card-title">Card title</h5>

                <p class="card-text">
                  Some quick example text to build on the card title and make up the bulk of the card's
                  content.
                </p>

                <a href="#" class="card-link">Card link</a>
                <a href="#" class="card-link">Another link</a>
              </div>
            </div>

            <div class="card card-primary card-outline">
              <div class="card-body">
                <h5 class="card-title">Card title</h5>

                <p class="card-text">
                  Some quick example text to build on the card title and make up the bulk of the card's
                  content.
                </p>
                <a href="#" class="card-link">Card link</a>
                <a href="#" class="card-link">Another link</a>
              </div>
            </div><!-- /.card -->
          </div>
          <!-- /.col-md-6 -->
          <div class="col-lg-6">
            <div class="card">
              <div class="card-header">
                <h5 class="m-0">Featured</h5>
              </div>
              <div class="card-body">
                <h6 class="card-title">Special title treatment</h6>

                <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
                <a href="#" class="btn btn-primary">Go somewhere</a>
              </div>
            </div>

            <div class="card card-primary card-outline">
              <div class="card-header">
                <h5 class="m-0">Featured</h5>
              </div>
              <div class="card-body">
                <h6 class="card-title">Special title treatment</h6>

                <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
                <a href="#" class="btn btn-primary">Go somewhere</a>
              </div>
            </div>
          </div>
          <!-- /.col-md-6 -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
  </div> --}}
