<aside class="main-sidebar sidebar-dark-primary elevation-4" style="background-color: #0502a8;">
    <!-- Brand Logo -->
    <a href="#" class="brand-link" style="background-color: #0502a8;">
        <img src="{{ asset('images/spotlight-logo.svg') }}" alt="REX-MIS Logo" class="brand-image elevation-3">
        {{-- <span class="brand-text font-weight-light">MAAP-MIS</span> --}}
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="{{ asset('assets/dist/img/avatar.png') }}" class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
                <a href="" class="d-block">{{ Auth::user()->name }}</a>
            </div>
        </div>

        <!-- SidebarSearch Form -->
        <!-- <div class="form-inline">
            <div class="input-group" data-widget="sidebar-search">
                <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
                <div class="input-group-append">
                    <button class="btn btn-sidebar">
                        <i class="fas fa-search fa-fw"></i>
                    </button>
                </div>
            </div>
        </div> -->

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class with font-awesome or any other icon font library -->

                <li class="nav-item">
                    <a href="{{ route('admin.admin.home') }}" class="nav-link">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            Dashboard
                        </p>
                    </a>
                </li>


                {{-- <li class="nav-item">
                    <a href="{{ route('admin.emailtracker.index') }}" class="nav-link">
                        <i class="nav-icon fas fa-envelope"></i>
                        <p>
                            Email Tracker
                        </p>
                    </a>
                </li> --}}


                <li class="nav-item">
                    <a href="{{ route('kb.knowledge.home') }}" class="nav-link">
                        <i class="nav-icon fas fa-database"></i>
                        <p>
                            Knowledge Base
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('kb.faq.index') }}" class="nav-link">
                        <i class="nav-icon fas fa-question"></i>
                        <p>
                            FAQs
                        </p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{ route('admin.spotlightcalltracker.index') }}" class="nav-link">
                        <i class="nav-icon fas fa-phone"></i>
                        <p>
                            Call Tracker
                        </p>
                    </a>
                </li>

                {{--
                <li class="nav-item">
                    <a href="{{ route('admin.taserrorlog.index') }}" class="nav-link">
                <i class="nav-icon fas fa-tools"></i>
                <p>
                    Error Logger
                </p>
                </a>
                </li>

                <li class="nav-item">
                    <a href="{{ route('admin.emailtracker.index') }}" class="nav-link">
                        <i class="nav-icon fas fa-envelope"></i>
                        <p>
                            Email Tracker
                        </p>
                    </a>
                </li>



                <li class="nav-item">
                    <a href="{{ route('admin.amserrorlog.index') }}" class="nav-link">
                        <i class="nav-icon fas fa-exclamation"></i>
                        <p>
                            Error Logger
                        </p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{ route('admin.escalationtracker.index') }}" class="nav-link">
                        <i class="nav-icon fas fa-arrow-up"></i>
                        <p>
                            Escalation Tracker
                        </p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{ route('admin.marketingtracker.index') }}" class="nav-link">
                        <i class="nav-icon fas fa-arrow-right"></i>
                        <p>
                            Market Tracker
                        </p>
                    </a>
                </li> --}}

                {{-- <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-balance-scale"></i>
                        <p>
                            Quiz
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('admin.fj-quizz-attempt-selector') }}" class="nav-link">
                <i class="nav-icon fas fa-list-alt"></i>
                <p>
                    Listing
                </p>
                </a>
                </li>
            </ul>
            </li> --}}

            @can('call_entries_access')
            <!-- <li class="nav-item">
                    <a href="{{  route('admin.rextracker.index') }}" class="nav-link">
                        <i class="nav-icon fas fa-bullseye"></i>
                        <p>
                            Rex Tracker
                        </p>
                    </a>
                </li> -->
            @endcan
            <li class="nav-item">
				<a href="{{ route('admin.show-typing-test') }}" class="nav-link">
					<i class="nav-icon fas fa-keyboard"></i>
					<p>
						Typing Test
					</p>
				</a>
			</li>
            @can('reports_access')
            {{-- <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-file-image"></i>
                        <p>
                            Reports
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('admin.report.listalloodie') }}" class="nav-link">
                                <i class="nav-icon fas fa-list-alt"></i>
                                <p>
                                    Listing by Date range
                                </p>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="{{ route('admin.report.enquiries') }}" class="nav-link">
                                <i class="nav-icon fas fa-pencil-alt"></i>
                                <p>
                                    Enquiries
                                </p>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="{{ route('admin.report.complaints') }}" class="nav-link">
                                <i class="nav-icon fas fa-file"></i>
                                <p>
                                    Complaints
                                </p>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="{{ route('admin.report.escalations') }}" class="nav-link">
                                <i class="nav-icon fas fa-sign"></i>
                                <p>
                                    Escalations
                                </p>
                            </a>
                        </li>

                         <li class="nav-item">
                            <a href="{{ route('admin.report.qacallentries') }}" class="nav-link">
                                <i class="nav-icon fas fa-stethoscope"></i>
                                <p>
                                    QA - Call Entries
                                </p>
                            </a>
                        </li>
                    </ul>
                </li>

				<li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-info"></i>
                        <p>
                            Q&A
                        </p>
                    </a>S
                </li> --}}
                @endcan
{{--            @endcan--}}
                @can('survey_access')
                        <li class="nav-item">
                            <a href="" class="nav-link">
                                <i class="nav-icon fas fa-paperclip"></i>
                                <p>
                             Agent Survey
                                </p>
                            </a>
                        </li>




{{--                <!--       @can('survey_access')--}}
             <li class="nav-item">
                    <a href="{{ route('admin.customsurvey.create') }}" class="nav-link">
                        <i class="nav-icon fas fa-paperclip"></i>
                        <p>
                            Survey
                        </p>
                    </a>
                </li>
                @endcan


            @can('survey_access')
            <li class="nav-header">MEDIA</li>
            <li class="nav-item">
                <a href="#" class="nav-link">
                    <i class="nav-icon fas fa-file-image"></i>
                    <p>
                        {{ trans('global.media') }}
                        <i class="right fas fa-angle-left"></i>
                    </p>
                </a>
                <ul class="nav nav-treeview">
                    <li class="nav-item">
                        <a href="{{ route('admin.media-upload-listing') }}" class="nav-link  {{ request()->is('admin/permissions') || request()->is('admin/permissions/*') ? 'active' : '' }}">
                            <i class="far fa-circle nav-icon"></i>
                            <p> {{ trans('global.media_listing') }}</p>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a href="{{ route('admin.media-upload-listing-v2') }}" class="nav-link  {{ request()->is('admin/roles') || request()->is('admin/roles/*') ? 'active' : '' }}">
                            <i class="far fa-circle nav-icon"></i>
                            <p>{{ trans('global.tabular_media_listing') }}</p>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a href="{{ route('admin.media-upload-view') }}" class="nav-link  {{ request()->is('admin/users') || request()->is('admin/users/*') ? 'active' : '' }}">
                            <i class="far fa-circle nav-icon"></i>
                            <p>{{ trans('global.media_upload') }}</p>
                        </a>
                    </li>
                    <!--
                        <li class="nav-item">
                            <a href="{{ route('admin.media-upload-drag-drop-view') }}" class="nav-link  {{ request()->is('admin/users') || request()->is('admin/users/*') ? 'active' : '' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>{{ trans('global.multiple_file_uploader') }}</p>
                            </a>
                        </li>
                        -->
                </ul>
            </li>
            @endcan

            @can('kb_management_access')
            <li class="nav-header">ADMINISTRATION</li>
            <li class="nav-item">
                <a class="nav-link" href="#">
                    <i class="nav-icon fas fa-cogs nav-icon"></i>
                    <p>KB Management</p>
                    <i class="right fas fa-angle-left"></i>
                </a>
                <ul class="nav nav-treeview">
                    @can('category_access')
                    <li class="nav-item">
                        <a href="{{ route('admin.categories.index') }}" class="nav-link">
                            <i class="nav-icon fas fa-tags"></i>
                            <p>
                                {{ trans('cruds.category.title') }}
                            </p>
                        </a>
                    </li>
                    @endcan
                    @can('tag_access')
                    <li class="nav-item">
                        <a href="{{ route("admin.tags.index") }}" class="nav-link">
                            <i class="nav-icon fas fa-tags"></i>
                            <p>
                                {{ trans('cruds.tag.title') }}
                            </p>
                        </a>
                    </li>
                    @endcan
                    @can('article_access')
                    <li class="nav-item">
                        <a href="{{ route("admin.articles.index") }}" class="nav-link">
                            <i class="nav-icon fas fa-newspaper"></i>
                            <p>
                                {{ trans('cruds.article.title') }}
                            </p>
                        </a>
                    </li>
                    @endcan
                </ul>
            </li>
            @endcan


            @can('faq_management_access')
            <li class="nav-item">
                <a class="nav-link" href="#">
                    <i class="nav-icon fas fa-cog nav-icon"></i>
                    <p>{{ trans('cruds.faqManagement.title') }}</p>
                    <i class="right fas fa-angle-left"></i>
                </a>
                <ul class="nav nav-treeview">
                    @can('faq_category_access')
                    <li class="nav-item">
                        <a href="{{ route("admin.faq-categories.index") }}" class="nav-link {{ request()->is('admin/faq-categories') || request()->is('admin/faq-categories/*') ? 'active' : '' }}">
                            <i class="far fa-circle nav-icon">

                            </i>
                            {{ trans('cruds.faqCategory.title') }}
                        </a>
                    </li>
                    @endcan
                    @can('faq_question_access')
                    <li class="nav-item">
                        <a href="{{ route("admin.faq-questions.index") }}" class="nav-link {{ request()->is('admin/faq-questions') || request()->is('admin/faq-questions/*') ? 'active' : '' }}">
                            <i class="far fa-circle nav-icon">

                            </i>
                            {{ trans('cruds.faqQuestion.title') }}
                        </a>
                    </li>
                    @endcan
                </ul>
            </li>
            @endcan

            @can('quizmanagement_access')
            <li class="nav-item">
                <a href="#" class="nav-link">
                    <i class="nav-icon fas fa-graduation-cap"></i>
                    <p>
                        Quiz Management
                        <i class="right fas fa-angle-left"></i>
                    </p>
                </a>
                <ul class="nav nav-treeview">
                    <li class="nav-item">
                        <a href="{{ route('admin.quizz.loader') }}" class="nav-link">
                            <i class="nav-icon fas fa-list-alt"></i>
                            <p>
                                Load Quiz
                            </p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('admin.show-leader-board') }}" class="nav-link">
                            <i class="nav-icon fas fa-list-alt"></i>
                            <p>
                                Leaderboard
                            </p>
                        </a>
                    </li>
                </ul>
            </li>
            @endcan

            @can('user_management_access')

            <li class="nav-header">SYSTEM ADMIN</li>
            <li class="nav-item">
                <a href="#" class="nav-link">
                    <i class="nav-icon fas fa-users"></i>
                    <p>
                        {{ trans('cruds.userManagement.title') }}
                        <i class="right fas fa-angle-left"></i>
                    </p>
                </a>
                <ul class="nav nav-treeview">

                    @can('permission_access')
                    <li class="nav-item">
                        <a href="{{ route('admin.permissions.index') }}" class="nav-link  {{ request()->is('admin/permissions') || request()->is('admin/permissions/*') ? 'active' : '' }}">
                            <i class="far fa-circle nav-icon"></i>
                            <p>{{ trans('cruds.permission.title') }}</p>
                        </a>
                    </li>
                    @endcan

                    @can('role_access')
                    <li class="nav-item">
                        <a href="{{ route('admin.roles.index') }}" class="nav-link  {{ request()->is('admin/roles') || request()->is('admin/roles/*') ? 'active' : '' }}">
                            <i class="far fa-circle nav-icon"></i>
                            <p>{{ trans('cruds.role.title') }}</p>
                        </a>
                    </li>
                    @endcan

                    @can('user_access')
                    <li class="nav-item">
                        <a href="{{ route("admin.users.index") }}" class="nav-link  {{ request()->is('admin/users') || request()->is('admin/users/*') ? 'active' : '' }}">
                            <i class="far fa-circle nav-icon"></i>
                            <p>{{ trans('cruds.user.title') }}</p>
                        </a>
                    </li>
                    @endcan

                </ul>
            </li>
            @endcan

            <li class="nav-item">
                <a href="#" class="nav-link" onclick="event.preventDefault(); document.getElementById('logoutform').submit();">
                    <i class="nav-icon fas fa-sign-out-alt"></i>
                    <p>
                        {{ trans('global.logout') }}
                    </p>
                </a>
            </li>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
