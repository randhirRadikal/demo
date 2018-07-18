<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <title>Metronic Admin Theme #6 | Responsive Bootstrap Tables</title>
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta content="width=device-width, initial-scale=1" name="viewport" />
        <meta content="Preview page of Metronic Admin Theme #6 for responsive bootstrap table demos" name="description" />
        <meta content="" name="author" />
        <!-- BEGIN LAYOUT FIRST STYLES -->
        <link href="//fonts.googleapis.com/css?family=Oswald:400,300,700" rel="stylesheet" type="text/css" />
        <!-- END LAYOUT FIRST STYLES -->
        <!-- BEGIN GLOBAL MANDATORY STYLES -->
        <link href="http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700&subset=all" rel="stylesheet" type="text/css" />
        <link href="<?php echo $this->Url->build('/', TRUE); ?>assets/global/plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo $this->Url->build('/', TRUE); ?>assets/global/plugins/simple-line-icons/simple-line-icons.min.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo $this->Url->build('/', TRUE); ?>assets/global/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo $this->Url->build('/', TRUE); ?>assets/global/plugins/bootstrap-switch/css/bootstrap-switch.min.css" rel="stylesheet" type="text/css" />
        <!-- END GLOBAL MANDATORY STYLES -->
        <!-- BEGIN THEME GLOBAL STYLES -->
        <link href="<?php echo $this->Url->build('/', TRUE); ?>assets/global/css/components.min.css" rel="stylesheet" id="style_components" type="text/css" />
        <link href="<?php echo $this->Url->build('/', TRUE); ?>assets/global/css/plugins.min.css" rel="stylesheet" type="text/css" />
        <!-- END THEME GLOBAL STYLES -->
        <!-- BEGIN THEME LAYOUT STYLES -->
        <link href="<?php echo $this->Url->build('/', TRUE); ?>assets/layouts/layout6/css/layout.min.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo $this->Url->build('/', TRUE); ?>assets/layouts/layout6/css/custom.min.css" rel="stylesheet" type="text/css" />
        <!-- END THEME LAYOUT STYLES -->
        <link rel="shortcut icon" href="favicon.ico" /> </head>
    <!-- END HEAD -->

    <body class="">
        <!-- BEGIN HEADER -->
        <header class="page-header">
            <nav class="navbar" role="navigation">
                <div class="container-fluid">
                    <div class="havbar-header">
                        <!-- BEGIN LOGO -->
                        <a id="index" class="navbar-brand" href="<?php echo $this->Url->build('/', TRUE); ?>">
                            <img src="<?php echo $this->Url->build('/', TRUE); ?>assets/layouts/layout6/img/logo.png" alt="Logo"> </a>
                        <!-- END LOGO -->
                        <!-- BEGIN TOPBAR ACTIONS -->
                        <div class="topbar-actions">
                            <!-- BEGIN USER PROFILE -->
                            <div class="btn-group-img btn-group">
                                <button type="button" class="btn btn-sm dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
                                    <img src="<?php echo $this->Url->build('/', TRUE); ?>assets/layouts/layout5/img/avatar1.jpg" alt=""> </button>
                                <ul class="dropdown-menu-v2" role="menu">
                                    <li>
                                        <a href="page_user_profile_1.html">
                                            <i class="icon-user"></i> My Profile
                                            <span class="badge badge-danger">1</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="app_calendar.html">
                                            <i class="icon-calendar"></i> My Calendar </a>
                                    </li>
                                    <li>
                                        <a href="app_inbox.html">
                                            <i class="icon-envelope-open"></i> My Inbox
                                            <span class="badge badge-danger"> 3 </span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="app_todo_2.html">
                                            <i class="icon-rocket"></i> My Tasks
                                            <span class="badge badge-success"> 7 </span>
                                        </a>
                                    </li>
                                    <li class="divider"> </li>
                                    <li>
                                        <a href="page_user_lock_1.html">
                                            <i class="icon-lock"></i> Lock Screen </a>
                                    </li>
                                    <li>
                                        <a href="page_user_login_1.html">
                                            <i class="icon-key"></i> Log Out </a>
                                    </li>
                                </ul>
                            </div>
                            <!-- END USER PROFILE -->
                        </div>
                        <!-- END TOPBAR ACTIONS -->
                    </div>
                </div>
                <!--/container-->
            </nav>
        </header>
        <!-- END HEADER -->
        <!-- BEGIN CONTAINER -->
        <div class="container-fluid">
            <div class="page-content page-content-popup">
                <div class="page-sidebar-wrapper">
                    <!-- BEGIN SIDEBAR -->
                    <div class="page-sidebar navbar-collapse collapse">
                        <!-- BEGIN SIDEBAR MENU -->
                        <ul class="page-sidebar-menu  page-header-fixed " data-keep-expanded="false" data-auto-scroll="true" data-slide-speed="200">
                            <li class="nav-item <?= ($menu['menu']=="newposted_jobs")?"active":""; ?>">
                                <a href="<?php echo $this->Url->build('/', TRUE); ?>jobs/newPosts" class="nav-link ">
                                    <span class="title">New Posted Jobs</span>
                                </a>
                            </li>
							<li class="nav-item <?= ($menu['menu']=="jonyet_jobs")?"active":""; ?>">
                                <a href="<?php echo $this->Url->build('/', TRUE); ?>jobs/jobYet" class="nav-link ">
                                    <span class="title">JobYet Awarded</span>
                                </a>
                            </li>
							<li class="nav-item <?= ($menu['menu']=="pending_jobs")?"active":""; ?>">
								<a href="<?php echo $this->Url->build('/', TRUE); ?>jobs/pending" class="nav-link ">
									<span class="title">Pending Jobs</span>
								</a>
							</li>
							<li class="nav-item <?= ($menu['menu']=="compaleted_jobs")?"active":""; ?>">
                                <a href="<?php echo $this->Url->build('/', TRUE); ?>jobs/compaleted" class="nav-link ">
                                    <span class="title">Completed Jobs</span>
                                </a>
                            </li>
							<li class="nav-item <?= ($menu['menu']=="cancelled_jobs")?"active":""; ?>">
                                <a href="<?php echo $this->Url->build('/', TRUE); ?>jobs/cancelled" class="nav-link ">
                                    <span class="title">Cancelled Jobs</span>
                                </a>
                            </li>
                        </ul>
                        <!-- END SIDEBAR MENU -->
                    </div>
                    <!-- END SIDEBAR -->
                </div>
                <div class="page-fixed-main-content">
                    <?= $this->fetch('content') ?>
                </div>
                <!-- BEGIN FOOTER -->
                <p class="copyright-v2"> 2016 &copy; Metronic Theme By
                    <a target="_blank" href="http://keenthemes.com">Keenthemes</a> &nbsp;|&nbsp;
                    <a href="http://themeforest.net/item/metronic-responsive-admin-dashboard-template/4021469?ref=keenthemes" title="Purchase Metronic just for 27$ and get lifetime updates for free" target="_blank">Purchase Metronic!</a>
                </p>
                <a href="#index" class="go2top">
                    <i class="icon-arrow-up"></i>
                </a>
                <!-- END FOOTER -->
            </div>
        </div>
        <!-- END CONTAINER -->
        <!-- BEGIN CORE PLUGINS -->
        <script src="<?php echo $this->Url->build('/', TRUE); ?>assets/global/plugins/jquery.min.js" type="text/javascript"></script>
        <script src="<?php echo $this->Url->build('/', TRUE); ?>assets/global/plugins/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
        <script src="<?php echo $this->Url->build('/', TRUE); ?>assets/global/plugins/js.cookie.min.js" type="text/javascript"></script>
        <script src="<?php echo $this->Url->build('/', TRUE); ?>assets/global/plugins/jquery-slimscroll/jquery.slimscroll.min.js" type="text/javascript"></script>
        <script src="<?php echo $this->Url->build('/', TRUE); ?>assets/global/plugins/jquery.blockui.min.js" type="text/javascript"></script>
        <script src="<?php echo $this->Url->build('/', TRUE); ?>assets/global/plugins/bootstrap-switch/js/bootstrap-switch.min.js" type="text/javascript"></script>
        <!-- END CORE PLUGINS -->
        <!-- BEGIN THEME GLOBAL SCRIPTS -->
        <script src="<?php echo $this->Url->build('/', TRUE); ?>assets/global/scripts/app.min.js" type="text/javascript"></script>
        <!-- END THEME GLOBAL SCRIPTS -->
        <!-- BEGIN THEME LAYOUT SCRIPTS -->
        <script src="<?php echo $this->Url->build('/', TRUE); ?>assets/layouts/layout6/scripts/layout.min.js" type="text/javascript"></script>
        <script src="<?php echo $this->Url->build('/', TRUE); ?>assets/layouts/global/scripts/quick-sidebar.min.js" type="text/javascript"></script>
        <script src="<?php echo $this->Url->build('/', TRUE); ?>assets/layouts/global/scripts/quick-nav.min.js" type="text/javascript"></script>
        <!-- END THEME LAYOUT SCRIPTS -->
    </body>

</html>
