 <!-- ========== Left Sidebar Start ========== -->
            <div class="left-side-menu">
                <div class="media user-profile mt-2 mb-2">
                    <img src="{{ asset('Shreyu/assets/images/users/avatar-7.jpg')}}" class="avatar-sm rounded-circle mr-2" alt="Shreyu" >
                    <img src="{{ asset('Shreyu/assets/images/users/avatar-7.jpg')}}" class="avatar-xs rounded-circle mr-2" alt="Shreyu" >

                    <div class="media-body">
                        <h6 class="pro-user-name mt-0 mb-0">Shreyu N</h6>
                        <span class="pro-user-desc">Administrator</span>
                    </div>
                    <div class="dropdown align-self-center profile-dropdown-menu">
                        <a class="dropdown-toggle mr-0" data-toggle="dropdown" href="#" role="button" aria-haspopup="false"
                            aria-expanded="false">
                            <span data-feather="chevron-down"></span>
                        </a>
                        <div class="dropdown-menu profile-dropdown">
                            <a href="pages-profile.html" class="dropdown-item notify-item">
                                <i data-feather="user" class="icon-dual icon-xs mr-2"></i>
                                <span>My Account</span>
                            </a>

                            <a href="javascript:void(0);" class="dropdown-item notify-item">
                                <i data-feather="settings" class="icon-dual icon-xs mr-2"></i>
                                <span>Settings</span>
                            </a>

                            <a href="javascript:void(0);" class="dropdown-item notify-item">
                                <i data-feather="help-circle" class="icon-dual icon-xs mr-2"></i>
                                <span>Support</span>
                            </a>

                            <a href="pages-lock-screen.html" class="dropdown-item notify-item">
                                <i data-feather="lock" class="icon-dual icon-xs mr-2"></i>
                                <span>Lock Screen</span>
                            </a>

                            <div class="dropdown-divider"></div>

                            <a href="javascript:void(0);" class="dropdown-item notify-item">
                                <i data-feather="log-out" class="icon-dual icon-xs mr-2"></i>
                                <span>Logout</span>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="sidebar-content">
                    <!--- Sidemenu -->
                    <div id="sidebar-menu" class="slimscroll-menu">
                        <ul class="metismenu" id="menu-bar">
                            <li class="menu-title">Navigation</li>

                            <li>
                                <a href="dashboard.html">
                                    <i data-feather="home"></i>
                                    <span class="badge badge-success float-right">1</span>
                                    <span> Dashboard </span>
                                </a>
                            </li>
    
                            <li>
                                <a href="javascript: void(0);">
                                    <i data-feather="box"></i>
                                    <span> Apps </span>
                                    <span class="menu-arrow"></span>
                                </a>
                                <ul class="nav-second-level" aria-expanded="false">
                                    <li>
                                        <a href="apps-calendar.html">Calendar</a>
                                    </li>
                                    <li>
                                        <a href="javascript: void(0);" aria-expanded="false">Email
                                            <span class="menu-arrow"></span>
                                        </a>
                                        <ul class="nav-third-level" aria-expanded="false">
                                            <li>
                                                <a href="email-inbox.html">Inbox</a>
                                            </li>
                                            <li>
                                                <a href="email-read.html">Read</a>
                                            </li>
                                            <li>
                                                <a href="email-compose.html">Compose</a>
                                            </li>
                                        </ul>
                                    </li>
                                    <li>
                                        <a href="javascript: void(0);" aria-expanded="false">Project
                                            <span class="menu-arrow"></span>
                                        </a>
                                        <ul class="nav-third-level" aria-expanded="false">
                                            <li>
                                                <a href="project-list.html">List</a>
                                            </li>
                                            <li>
                                                <a href="project-detail.html">Detail</a>
                                            </li>
                                        </ul>
                                    </li>

                                    <li>
                                        <a href="javascript: void(0);" aria-expanded="false">Tasks
                                            <span class="menu-arrow"></span>
                                        </a>
                                        <ul class="nav-third-level" aria-expanded="false">
                                            <li>
                                                <a href="task-list.html">List</a>
                                            </li>
                                            <li>
                                                <a href="task-board.html">Kanban Board</a>
                                            </li>
                                        </ul>
                                    </li>
                                </ul>
                            </li>

                            <li>
                                <a href="javascript: void(0);">
                                    <i data-feather="file-text"></i>
                                    <span> Pages </span>
                                    <span class="menu-arrow"></span>
                                </a>
                                <ul class="nav-second-level" aria-expanded="false">
                                    <li>
                                        <a href="pages-starter.html">Starter</a>
                                    </li>
                                    <li>
                                        <a href="pages-profile.html">Profile</a>
                                    </li>
                                    <li>
                                        <a href="pages-activity.html">Activity</a>
                                    </li>
                                    <li>
                                        <a href="pages-invoice.html">Invoice</a>
                                    </li>
                                    <li>
                                        <a href="pages-pricing.html">Pricing</a>
                                    </li>
                                    <li>
                                        <a href="pages-maintenance.html">Maintenance</a>
                                    </li>
                                    <li>
                                        <a href="pages-login.html">Login</a>
                                    </li>
                                    <li>
                                        <a href="pages-register.html">Register</a>
                                    </li>
                                    <li>
                                        <a href="pages-recoverpw.html">Recover Password</a>
                                    </li>
                                    <li>
                                        <a href="pages-confirm-mail.html">Confirm</a>
                                    </li>
                                    <li>
                                        <a href="pages-404.html">Error 404</a>
                                    </li>
                                    <li>
                                        <a href="pages-500.html">Error 500</a>
                                    </li>
                                </ul>
                            </li>

                            <li>
                                <a href="javascript: void(0);">
                                    <i data-feather="layout"></i>
                                    <span> Layouts </span>
                                    <span class="menu-arrow"></span>
                                </a>
                                <ul class="nav-second-level" aria-expanded="false">
                                    <li>
                                        <a href="layouts-horizontal.html">Horizontal Nav</a>
                                    </li>
                                    <li>
                                        <a href="layouts-rtl.html">RTL</a>
                                    </li>
                                    <li>
                                        <a href="layouts-dark.html">Dark</a>
                                    </li>
                                    <li>
                                        <a href="layouts-scrollable.html">Scrollable</a>
                                    </li>
                                    <li>
                                        <a href="layouts-boxed.html">Boxed</a>
                                    </li>
                                    <li>
                                        <a href="layouts-preloader.html">With Pre-loader</a>
                                    </li>
                                    <li>
                                        <a href="layouts-dark-sidebar.html">Dark Side Nav</a>
                                    </li>
                                    <li>
                                        <a href="layouts-condensed.html">Condensed Nav</a>
                                    </li>
                                </ul>
                            </li>

                            <li class="menu-title">More</li>

                            <li>
                                <a href="javascript: void(0);">
                                    <i data-feather="package"></i>
                                    <span> Components </span>
                                    <span class="menu-arrow"></span>
                                </a>
                                <ul class="nav-second-level" aria-expanded="false">
                                    <li>
                                        <a href="components-bootstrap.html">Bootstrap UI</a>
                                    </li>
                                    <li>
                                        <a href="javascript: void(0);" aria-expanded="false">Icons
                                            <span class="menu-arrow"></span>
                                        </a>
                                        <ul class="nav-third-level" aria-expanded="false">
                                            <li>
                                                <a href="icons-feather.html">Feather Icons</a>
                                            </li>
                                            <li>
                                                <a href="icons-unicons.html">Unicons Icons</a>
                                            </li>
                                        </ul>
                                    </li>
                                    <li>
                                        <a href="widgets.html">Widgets</a>
                                    </li>
                                </ul>
                            </li>

                            <li>
                                <a href="javascript: void(0);" aria-expanded="false">
                                    <i data-feather="file-text"></i>
                                    <span> Forms </span>
                                    <span class="menu-arrow"></span>
                                </a>
                                <ul class="nav-second-level" aria-expanded="false">
                                    <li>
                                        <a href="forms-basic.html">Basic Elements</a>
                                    </li>
                                    <li>
                                        <a href="forms-advanced.html">Advanced</a>
                                    </li>
                                    <li>
                                        <a href="forms-validation.html">Validation</a>
                                    </li>
                                    <li>
                                        <a href="forms-wizard.html">Wizard</a>
                                    </li>
                                    <li>
                                        <a href="forms-editor.html">Editor</a>
                                    </li>
                                    <li>
                                        <a href="forms-file-uploads.html">File Uploads</a>
                                    </li>
                                </ul>
                            </li>

                            <li>
                                <a href="charts-apex.html" aria-expanded="false">
                                    <i data-feather="pie-chart"></i>
                                    <span> Charts </span>
                                </a>
                            </li>

                            <li>
                                <a href="javascript: void(0);" aria-expanded="false">
                                    <i data-feather="grid"></i>
                                    <span> Tables </span>
                                    <span class="menu-arrow"></span>
                                </a>
                                <ul class="nav-second-level" aria-expanded="false">
                                    <li>
                                        <a href="tables-basic.html">Basic</a>
                                    </li>
                                    <li>
                                        <a href="tables-datatables.html">Advanced</a>
                                    </li>
                                </ul>
                            </li>

                            <li>
                                <a href="docs.html">
                                    <i data-feather="book"></i>
                                    <span> Documentation </span>
                                </a>
                            </li>
                        </ul>
                    </div>
                    <!-- End Sidebar -->

                    <div class="clearfix"></div>
                </div>
                <!-- Sidebar -left -->

            </div>
            <!-- Left Sidebar End -->