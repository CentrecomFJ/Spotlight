<div class="sidebar">
    <nav class="sidebar-nav">

        <ul class="nav">
            @can('disciplinary_access')
            <li class="nav-item">
                <a href="{{ route("admin.disciplinary.index") }}" class="nav-link">
                    <i class="nav-icon fas fa-fw fa-ban">
                    </i>
                    {{ trans('cruds.disciplinaryManagement.title') }}
                </a>
            </li>
            @endcan

            @can('appraisal_access')
            <li class="nav-item">
                <a href="{{ route("admin.appraisal.index") }}" class="nav-link">
                    <i class="nav-icon fas fa-fw fa-medal">
                    </i>
                    {{ trans('cruds.appraisalManagement.title') }}
                </a>
            </li>
            @endcan

            @can('user_management_access')
            <li class="nav-item nav-dropdown">
                <a class="nav-link  nav-dropdown-toggle" href="#">
                    <i class="fa-fw fas fa-users nav-icon">

                    </i>
                    {{ trans('cruds.userManagement.title') }}
                </a>
                <ul class="nav-dropdown-items">
                    @can('permission_access')
                    <li class="nav-item">
                        <a href="{{ route("admin.permissions.index") }}" class="nav-link {{ request()->is('admin/permissions') || request()->is('admin/permissions/*') ? 'active' : '' }}">
                            <i class="fa-fw fas fa-unlock-alt nav-icon">

                            </i>
                            {{ trans('cruds.permission.title') }}
                        </a>
                    </li>
                    @endcan
                    @can('role_access')
                    <li class="nav-item">
                        <a href="{{ route("admin.roles.index") }}" class="nav-link {{ request()->is('admin/roles') || request()->is('admin/roles/*') ? 'active' : '' }}">
                            <i class="fa-fw fas fa-briefcase nav-icon">

                            </i>
                            {{ trans('cruds.role.title') }}
                        </a>
                    </li>
                    @endcan
                    @can('user_access')
                    <li class="nav-item">
                        <a href="{{ route("admin.users.index") }}" class="nav-link {{ request()->is('admin/users') || request()->is('admin/users/*') ? 'active' : '' }}">
                            <i class="fa-fw fas fa-user nav-icon">

                            </i>
                            {{ trans('cruds.user.title') }}
                        </a>
                    </li>
                    @endcan
                </ul>
            </li>
            @endcan'

           
            
            <!-- <li class="nav-item nav-dropdown">
                <a class="nav-link  nav-dropdown-toggle" href="#">
                    <i class="fa-fw fas fa-file-image nav-icon">

                    </i>
                     {{ trans('global.media') }}
                </a>
                <ul class="nav-dropdown-items">
                    <li class="nav-item">
                        <a href="{{ route('admin.media-upload-listing') }}" class="nav-link">
                            <i class="fa-fw fas fa-qrcode nav-icon">
                            
                            </i>
                            {{ trans('global.media_listing') }}
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('admin.media-upload-listing-v2') }}" class="nav-link">
                            <i class="fa-fw fas fa-briefcase nav-icon">

                            </i>
                            {{ trans('global.tabular_media_listing') }}
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('admin.media-upload-view') }}" class="nav-link">
                            <i class="fa-fw fas fa-user nav-icon">

                            </i>
                            {{ trans('global.media_upload') }}
                        </a>
                    </li>

                    <li class="nav-item">
                        <a href="{{ route('admin.media-upload-drag-drop-view') }}" class="nav-link">
                            <i class="fa-fw fas fa-user nav-icon">

                            </i>
                            {{ trans('global.multiple_file_uploader') }}
                        </a>
                    </li>
                </ul>
            </li> -->

            <!-- @can('category_access')
            <li class="nav-item">
                <a href="{{ route("admin.categories.index") }}" class="nav-link {{ request()->is('admin/categories') || request()->is('admin/categories/*') ? 'active' : '' }}">
                    <i class="fa-fw fas fa-tags nav-icon">

                    </i>
                    {{ trans('cruds.category.title') }}
                </a>
            </li>
            @endcan
            @can('tag_access')
            <li class="nav-item">
                <a href="{{ route("admin.tags.index") }}" class="nav-link {{ request()->is('admin/tags') || request()->is('admin/tags/*') ? 'active' : '' }}">
                    <i class="fa-fw fas fa-tags nav-icon">

                    </i>
                    {{ trans('cruds.tag.title') }}
                </a>
            </li>
            @endcan
            @can('article_access')
            <li class="nav-item">
                <a href="{{ route("admin.articles.index") }}" class="nav-link {{ request()->is('admin/articles') || request()->is('admin/articles/*') ? 'active' : '' }}">
                    <i class="fa-fw far fa-newspaper nav-icon">

                    </i>
                    {{ trans('cruds.article.title') }}
                </a>
            </li>
            @endcan -->
            <!-- @can('faq_management_access')
                <li class="nav-item nav-dropdown">
                    <a class="nav-link  nav-dropdown-toggle" href="#">
                        <i class="fa-fw fas fa-question nav-icon">

                        </i>
                        {{ trans('cruds.faqManagement.title') }}
                    </a>
                    <ul class="nav-dropdown-items">
                        @can('faq_category_access')
                            <li class="nav-item">
                                <a href="{{ route("admin.faq-categories.index") }}" class="nav-link {{ request()->is('admin/faq-categories') || request()->is('admin/faq-categories/*') ? 'active' : '' }}">
                                    <i class="fa-fw fas fa-briefcase nav-icon">

                                    </i>
                                    {{ trans('cruds.faqCategory.title') }}
                                </a>
                            </li>
                        @endcan
                        @can('faq_question_access')
                            <li class="nav-item">
                                <a href="{{ route("admin.faq-questions.index") }}" class="nav-link {{ request()->is('admin/faq-questions') || request()->is('admin/faq-questions/*') ? 'active' : '' }}">
                                    <i class="fa-fw fas fa-question nav-icon">

                                    </i>
                                    {{ trans('cruds.faqQuestion.title') }}
                                </a>
                            </li>
                        @endcan
                    </ul>
                </li>
            @endcan -->
            <!-- <li class="nav-item">
                <a href="{{ route("admin.import-export.fileImportExport") }}" class="nav-link">
                    <i class="nav-icon fas fa-fw fa-upload">
                    </i>
                    {{ trans('global.import_export') }}
                </a>
            </li> -->

            <li class="nav-item">
                <a href="#" class="nav-link" onclick="event.preventDefault(); document.getElementById('logoutform').submit();">
                    <i class="nav-icon fas fa-fw fa-sign-out-alt">

                    </i>
                    {{ trans('global.logout') }}
                </a>
            </li>
        </ul>

    </nav>
    <button class="sidebar-minimizer brand-minimizer" type="button"></button>
</div>