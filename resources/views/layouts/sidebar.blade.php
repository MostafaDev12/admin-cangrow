<!-- ========== App Menu ========== -->
<div class="app-menu navbar-menu">
    <!-- LOGO -->
    <div class="navbar-brand-box">
        <!-- Dark Logo-->
        <a href="{{ route('admin.dashboard') }}" class="logo logo-dark">
            <span class="logo-sm">
                <img src="{{ URL::asset('build/images/logo-sm.png') }}" alt="" height="22">
            </span>
            <span class="logo-lg">
                <img src="{{ $gs->logo_en }}" alt="" height="60">
            </span>
        </a>

        {{-- {{ URL::asset('build/images/cangrow.png') }} --}}
        <!-- Light Logo-->
        <a href="{{ route('admin.dashboard') }}" class="logo logo-light">
            <span class="logo-sm">
                <img src="{{ URL::asset('build/images/logo-sm.png') }}" alt="" height="22">
            </span>
            <span class="logo-lg">
                <img src="{{ $gs->logo_en }}" alt="" height="60">
            </span>
        </a>
        <button type="button" class="btn btn-sm p-0 fs-20 header-item float-end btn-vertical-sm-hover"
            id="vertical-hover">
            <i class="ri-record-circle-line"></i>
        </button>
    </div>

    <div id="scrollbar">
        <div class="container-fluid">

            <div id="two-column-menu">
            </div>
            <ul class="navbar-nav" id="navbar-nav">
                <li class="menu-title"><span>@lang('translation.menu')</span></li>
                <li class="nav-item">
                    <a class="nav-link  " href="{{ route('admin.dashboard') }}" aria-controls="sidebarDashboards">
                        <i class="las la-tachometer-alt"></i> <span>@lang('translation.dashboards')</span>
                    </a>
                </li> <!-- end Dashboard Menu -->

                {{-- Pages (dynamic CMS) — gated on 'super' since no dedicated 'pages' permission key exists yet --}}
                @if (Auth::guard('admin')->user()->sectionCheck('super'))
                    <li class="nav-item">
                        <a class="nav-link  " href="{{ route('admin-pages-index') }}" aria-controls="sidebarPages">
                            <i class="las la-file-alt"></i> <span>Pages</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link  " href="{{ route('admin-site-globals-edit') }}" aria-controls="sidebarSiteGlobals">
                            <i class="las la-globe"></i> <span>Site Settings</span>
                        </a>
                    </li>
                @endif

                <li class="menu-title"><i class="ri-more-fill"></i> <span>@lang('translation.pages')</span></li>

                

              

              
 

               
               


                {{-- @if (Auth::guard('admin')->user()->sectionCheck('blogs'))
                    <li class="nav-item">
                        <a class="nav-link  " href="{{ route('admin-blogs-index') }}" aria-controls="sidebarblogs">
                            <i class="las la-tachometer-alt"></i> <span>@lang('translation.blogs')</span>
                        </a>
                    </li>
                @endif --}}
   
                
                               
                @if (Auth::guard('admin')->user()->sectionCheck('general_settings'))
                    <li class="nav-item">
                        <a class="nav-link menu-link" href="#general" data-bs-toggle="collapse" role="button"
                            aria-expanded="false" aria-controls="general">
                            <i class="las la-cog"></i> <span data-key="t-General_Settings"> @lang('translation.settings')</span>
                        </a>
                        <div class="collapse menu-dropdown" id="general">
                            <ul class="nav nav-sm flex-column">

                                <li class="nav-item">
                                    <a href="{{ route('admin-gs-logo') }}" class="nav-link" data-key="t-Logo">
                                        @lang('translation.logo')
                                    </a>
                                </li>
                              
                                <li class="nav-item">
                                    <a href="{{ route('admin-gs-contents') }}" class="nav-link"
                                        data-key="t-Website_Contents"> @lang('translation.content') </a>
                                </li>

                             

                                <li class="nav-item">
                                    <a href="{{ route('admin-gs-contact_messages') }}" class="nav-link"
                                        data-key="t-contact_messages"> @lang('translation.contact_messages') </a>
                                </li>

                                {{-- <li class="nav-item">
                                    <a href="{{ route('admin-gs-subscriptions') }}" class="nav-link"
                                        data-key="t-Manage_Roles"> @lang('translation.subscriptions') </a>
                                </li> 
--}}
                                @if (Auth::guard('admin')->user()->sectionCheck('social_settings'))
                                    <li class="nav-item">
                                        <a href="{{ route('admin-social-index') }}" class="nav-link"
                                            data-key="t-Manage_Roles"> @lang('translation.social_settings') </a>
                                    </li>
                                @endif

                                {{-- @if (Auth::guard('admin')->user()->sectionCheck('super'))
                                    <li class="nav-item">
                                        <a href="{{ route('admin-role-index') }}" class="nav-link"
                                            data-key="t-Manage_Roles"> @lang('translation.role_mangment') </a>
                                    </li>
                                @endif



                                @if (Auth::guard('admin')->user()->sectionCheck('manage_staffs'))
                                    <li class="nav-item">
                                        <a href="{{ route('admin-staff-index') }}" class="nav-link"
                                            data-key="t-Manage_Stauff"> @lang('translation.staff_mangment') </a>
                                    </li>
                                @endif --}}
                                @if (Auth::guard('admin')->user()->sectionCheck('language'))
                                    <li class="nav-item">
                                        <a href="{{ route('admin-flang-index') }}" class="nav-link"
                                            data-key="t-Manage_Roles"> @lang('translation.language') </a>
                                    </li>
                                @endif

                            </ul>
                        </div>
                    </li> <!-- end Dashboard Menu -->
                @endif
                @if (Auth::guard('admin')->user()->sectionCheck('super'))
                    <li class="nav-item">
                        <a class="nav-link menu-link" href="{{ route('admin-cache-clear') }}">
                            <i class="las la-flask"></i> <span data-key="t-Clear_Cache"> @lang('translation.cache_clear') </span>
                        </a>
                    </li>
                @endif
            </ul>
        </div>
        <!-- Sidebar -->
    </div>
    <div class="sidebar-background"></div>
</div>
<!-- Left Sidebar End -->
<!-- Vertical Overlay-->
<div class="vertical-overlay"></div>
