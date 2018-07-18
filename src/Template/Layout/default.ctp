<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8" />
	<title>QuickFix Admin</title>
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta content="width=device-width, initial-scale=1" name="viewport" />
	<meta content="Preview page of Metronic Admin Theme #4 for managed datatable samples" name="description" />
	<meta content="" name="author" />
	<!-- BEGIN GLOBAL MANDATORY STYLES -->
	<link href="http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700&subset=all" rel="stylesheet" type="text/css" />
	<link href="<?php echo $this->Url->build('/', TRUE); ?>assets/global/plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
	<link href="<?php echo $this->Url->build('/', TRUE); ?>assets/global/plugins/simple-line-icons/simple-line-icons.min.css" rel="stylesheet" type="text/css" />
	<link href="<?php echo $this->Url->build('/', TRUE); ?>assets/global/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
	<link href="<?php echo $this->Url->build('/', TRUE); ?>assets/global/plugins/bootstrap-switch/css/bootstrap-switch.min.css" rel="stylesheet" type="text/css" />
	<!-- END GLOBAL MANDATORY STYLES -->
	<!-- BEGIN PAGE LEVEL PLUGINS -->
	<link href="<?php echo $this->Url->build('/', TRUE); ?>assets/global/plugins/bootstrap-fileinput/bootstrap-fileinput.css" rel="stylesheet" type="text/css" />
	<link href="<?php echo $this->Url->build('/', TRUE); ?>assets/pages/css/profile.min.css" rel="stylesheet" type="text/css" />
	<link href="<?php echo $this->Url->build('/', TRUE); ?>assets/global/plugins/datatables/datatables.min.css" rel="stylesheet" type="text/css" />
	<link href="<?php echo $this->Url->build('/', TRUE); ?>assets/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.css" rel="stylesheet" type="text/css" />
	<!-- END PAGE LEVEL PLUGINS -->
	<!-- BEGIN THEME GLOBAL STYLES -->
	<link href="<?php echo $this->Url->build('/', TRUE); ?>assets/global/css/components.min.css" rel="stylesheet" id="style_components" type="text/css" />
	<link href="<?php echo $this->Url->build('/', TRUE); ?>assets/global/css/plugins.min.css" rel="stylesheet" type="text/css" />
	<!-- END THEME GLOBAL STYLES -->
	<!-- BEGIN THEME LAYOUT STYLES -->
	<link href="<?php echo $this->Url->build('/', TRUE); ?>assets/layouts/layout4/css/layout.min.css" rel="stylesheet" type="text/css" />
	<link href="<?php echo $this->Url->build('/', TRUE); ?>assets/layouts/layout4/css/themes/default.min.css" rel="stylesheet" type="text/css" id="style_color" />
	<link href="<?php echo $this->Url->build('/', TRUE); ?>assets/layouts/layout4/css/custom.min.css" rel="stylesheet" type="text/css" />
	<!-- END THEME LAYOUT STYLES -->
	<link rel="shortcut icon" href="favicon.ico" /> </head>
	<!-- END HEAD -->

	<body class="page-container-bg-solid page-header-fixed page-sidebar-closed-hide-logo">
		<!-- BEGIN HEADER -->
		<div class="page-header navbar navbar-fixed-top">
			<!-- BEGIN HEADER INNER -->
			<div class="page-header-inner ">
				<!-- BEGIN LOGO -->
				<div class="page-logo">
					<a href="<?php echo $this->Url->build('/', TRUE); ?>jobs/newPosts">
						<img src="<?php echo $this->Url->build('/', TRUE); ?>assets/layouts/layout4/img/logo-light.png" alt="logo" class="logo-default" /> </a>
						<div class="menu-toggler sidebar-toggler">
							<!-- DOC: Remove the above "hide" to enable the sidebar toggler button on header -->
						</div>
					</div>
					<!-- END LOGO -->
					<!-- BEGIN RESPONSIVE MENU TOGGLER -->
					<a href="javascript:;" class="menu-toggler responsive-toggler" data-toggle="collapse" data-target=".navbar-collapse"> </a>
					<!-- END RESPONSIVE MENU TOGGLER -->
					<!-- BEGIN PAGE ACTIONS -->

					<!-- END PAGE ACTIONS -->
					<!-- BEGIN PAGE TOP -->
					<div class="page-top">
						<!-- BEGIN TOP NAVIGATION MENU -->
						<div class="top-menu">
							<ul class="nav navbar-nav pull-right">
								<li class="dropdown dropdown-extended dropdown-notification dropdown-dark" id="header_notification_bar">
									<a href="<?php echo $this->Url->build('/', TRUE); ?>jobs/newPosts" class="dropdown-toggle">
										<span class="badge <?= ($menu['menu_type']=="job")?"badge-success":""; ?>"> Sales </span>
									</a>
								</li>
								<li class="dropdown dropdown-extended dropdown-notification dropdown-dark" id="header_notification_bar">
									<a href="javascript:;" class="dropdown-toggle" >
										<span class="badge"> Billing </span>
									</a>
								</li>
								<li class="dropdown dropdown-extended dropdown-notification dropdown-dark" id="header_notification_bar">
									<a href="<?php echo $this->Url->build('/', TRUE); ?>users/index" class="dropdown-toggle">
										<span class="badge <?= ($menu['menu_type']=="manpower")?"badge-success":""; ?>"> Manpower </span>
									</a>
								</li>
								<li class="dropdown dropdown-extended dropdown-notification dropdown-dark" id="header_notification_bar">
									<a href="<?php echo $this->Url->build('/', TRUE); ?>chats/index" class="dropdown-toggle">
										<span class="badge <?= ($menu['menu_type']=="chats")?"badge-success":""; ?>"> Chats </span>
									</a>
								</li>
								<li class="dropdown dropdown-extended dropdown-notification dropdown-dark" id="header_notification_bar">
									<a href="javascript:;" class="dropdown-toggle">
										<span class="badge"> Overview </span>
									</a>
								</li>
								<li class="dropdown dropdown-user dropdown-dark">
									<a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
										<span class="username username-hide-on-mobile"> Nick </span>
										<!-- DOC: Do not remove below empty space(&nbsp;) as its purposely used -->
										<img alt="" class="img-circle" src="<?php echo $this->Url->build('/', TRUE); ?>assets/layouts/layout4/img/avatar9.jpg" /> </a>
										<ul class="dropdown-menu dropdown-menu-default">
											<li>
												<a href="<?php echo $this->Url->build('/', TRUE); ?>admins/view">
													<i class="icon-user"></i> My Profile </a>
												</li>
												<li class="divider"> </li>
												<li>
													<a href="<?php echo $this->Url->build('/', TRUE); ?>admins/logout">
														<i class="icon-key"></i> Log Out </a>
													</li>
												</ul>
											</li>
											<!-- END USER LOGIN DROPDOWN -->
										</ul>
									</div>
									<!-- END TOP NAVIGATION MENU -->
								</div>
								<!-- END PAGE TOP -->
							</div>
							<!-- END HEADER INNER -->
						</div>
						<!-- END HEADER -->
						<!-- BEGIN HEADER & CONTENT DIVIDER -->
						<div class="clearfix"> </div>
						<!-- END HEADER & CONTENT DIVIDER -->
						<!-- BEGIN CONTAINER -->
						<div class="page-container">
							<!-- BEGIN SIDEBAR -->
							<?php if($menu['menu_type'] == 'job'){ ?>
								<div class="page-sidebar-wrapper">
									<div class="page-sidebar navbar-collapse collapse">
										<ul class="page-sidebar-menu   " data-keep-expanded="false" data-auto-scroll="true" data-slide-speed="200">
											<li class="heading">
												<h3 class="uppercase">Menu</h3>
											</li>
											<li class="nav-item start <?= ($menu['menu']=="newposted_jobs")?"active":""; ?>">
												<a href="<?php echo $this->Url->build('/', TRUE); ?>jobs/newPosts" class="nav-link ">

													<span class="title">New Posted Jobs</span>
												</a>
											</li>
											<li class="nav-item start <?= ($menu['menu']=="jobyet_jobs")?"active":""; ?>">
												<a href="<?php echo $this->Url->build('/', TRUE); ?>jobs/jobYet" class="nav-link ">

													<span class="title">JobYet Jobs</span>
												</a>
											</li>
											<li class="nav-item start <?= ($menu['menu']=="pending_jobs")?"active":""; ?>">
												<a href="<?php echo $this->Url->build('/', TRUE); ?>jobs/pending" class="nav-link ">

													<span class="title">Pending Jobs</span>
												</a>
											</li>
											<li class="nav-item start <?= ($menu['menu']=="compaleted_jobs")?"active":""; ?>">
												<a href="<?php echo $this->Url->build('/', TRUE); ?>jobs/completed" class="nav-link ">

													<span class="title">Completed Jobs</span>
												</a>
											</li>
											<li class="nav-item start <?= ($menu['menu']=="cancelled_jobs")?"active":""; ?> ">
												<a href="<?php echo $this->Url->build('/', TRUE); ?>jobs/cancelled" class="nav-link ">

													<span class="title">Cancelled Jobs</span>
												</a>
											</li>
										</ul>
										<!-- END SIDEBAR MENU -->
									</div>
									<!-- END SIDEBAR -->
								</div>
							<?php }else if($menu['menu_type'] == 'manpower'){ ?>
								<div class="page-sidebar-wrapper">
									<div class="page-sidebar navbar-collapse collapse">
										<ul class="page-sidebar-menu   " data-keep-expanded="false" data-auto-scroll="true" data-slide-speed="200">
											<li class="heading">
												<h3 class="uppercase">Menu</h3>
											</li>
											<li class="nav-item start <?= ($menu['menu']=="homeowner")?"active":""; ?> ">
												<a href="<?php echo $this->Url->build('/', TRUE); ?>users/index" class="nav-link ">

													<span class="title">Existing Homeowners</span>
												</a>
											</li>
											<li class="nav-item start <?= ($menu['menu']=="contractors")?"active":""; ?> ">
												<a href="<?php echo $this->Url->build('/', TRUE); ?>users/contractors" class="nav-link ">

													<span class="title">Existing Contractors</span>
												</a>
											</li>
											<li class="nav-item start <?= ($menu['menu']=="premium")?"active":""; ?> ">
												<a href="<?php echo $this->Url->build('/', TRUE); ?>users/index" class="nav-link ">

													<span class="title">Existing Premium Contractors</span>
												</a>
											</li>
											<li class="nav-item start <?= ($menu['menu']=="applications")?"active":""; ?> ">
												<a href="<?php echo $this->Url->build('/', TRUE); ?>users/index" class="nav-link ">

													<span class="title">Applications</span>
												</a>
											</li>
										</ul>
										<!-- END SIDEBAR MENU -->
									</div>
									<!-- END SIDEBAR -->
								</div>
							<?php }else {

							} ?>
							<!-- END SIDEBAR -->
							<!-- BEGIN CONTENT -->
							<?= $this->fetch('content') ?>
							<!-- END CONTENT -->
						</div>
						<!-- END CONTAINER -->
						<!-- BEGIN FOOTER -->
						<div class="page-footer">
							<div class="page-footer-inner"> 2016 &copy; By Randhir Jha

							</div>
							<div class="scroll-to-top">
								<i class="icon-arrow-up"></i>
							</div>
						</div>
						<!-- END FOOTER -->
						<!-- BEGIN CORE PLUGINS -->
						<script src="<?php echo $this->Url->build('/', TRUE); ?>assets/global/plugins/jquery.min.js" type="text/javascript"></script>
						<script src="<?php echo $this->Url->build('/', TRUE); ?>assets/global/plugins/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
						<script src="<?php echo $this->Url->build('/', TRUE); ?>assets/global/plugins/js.cookie.min.js" type="text/javascript"></script>
						<script src="<?php echo $this->Url->build('/', TRUE); ?>assets/global/plugins/jquery-slimscroll/jquery.slimscroll.min.js" type="text/javascript"></script>
						<script src="<?php echo $this->Url->build('/', TRUE); ?>assets/global/plugins/jquery.blockui.min.js" type="text/javascript"></script>
						<script src="<?php echo $this->Url->build('/', TRUE); ?>assets/global/plugins/bootstrap-switch/js/bootstrap-switch.min.js" type="text/javascript"></script>
						<!-- END CORE PLUGINS -->
						<!-- BEGIN PAGE LEVEL PLUGINS -->
						<script src="<?php echo $this->Url->build('/', TRUE); ?>assets/global/plugins/bootstrap-fileinput/bootstrap-fileinput.js" type="text/javascript"></script>
						<script src="<?php echo $this->Url->build('/', TRUE); ?>assets/global/scripts/datatable.js" type="text/javascript"></script>
						<script src="<?php echo $this->Url->build('/', TRUE); ?>assets/global/plugins/datatables/datatables.min.js" type="text/javascript"></script>
						<script src="<?php echo $this->Url->build('/', TRUE); ?>assets/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.js" type="text/javascript"></script>
						<!-- END PAGE LEVEL PLUGINS -->
						<!-- BEGIN THEME GLOBAL SCRIPTS -->
						<script src="<?php echo $this->Url->build('/', TRUE); ?>assets/global/scripts/app.min.js" type="text/javascript"></script>
						<!-- END THEME GLOBAL SCRIPTS -->
						<!-- BEGIN PAGE LEVEL SCRIPTS -->
						<script src="<?php echo $this->Url->build('/', TRUE); ?>assets/pages/scripts/profile.min.js" type="text/javascript"></script>
						<script src="<?php echo $this->Url->build('/', TRUE); ?>assets/pages/scripts/table-datatables-managed.min.js" type="text/javascript"></script>
						<!-- END PAGE LEVEL SCRIPTS -->
						<!-- BEGIN THEME LAYOUT SCRIPTS -->
						<script src="<?php echo $this->Url->build('/', TRUE); ?>assets/layouts/layout4/scripts/layout.min.js" type="text/javascript"></script>
						<script src="<?php echo $this->Url->build('/', TRUE); ?>assets/layouts/layout4/scripts/demo.min.js" type="text/javascript"></script>
						<script src="<?php echo $this->Url->build('/', TRUE); ?>assets/layouts/global/scripts/quick-sidebar.min.js" type="text/javascript"></script>
						<script src="<?php echo $this->Url->build('/', TRUE); ?>assets/layouts/global/scripts/quick-nav.min.js" type="text/javascript"></script>
						<!-- END THEME LAYOUT SCRIPTS -->
					</body>

					</html>
