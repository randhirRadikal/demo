<div class="page-content-wrapper">
	<div class="page-content" style="margin-left:00px">
	<!-- BEGIN PAGE BASE CONTENT -->
	<div class="row">

		<div class="col-md-12 ">
			<!-- BEGIN SAMPLE FORM PORTLET-->
			<div class="portlet light bordered">
				<div class="portlet-title">
					<div class="caption">
						<i class="icon-settings font-dark"></i>
						<span class="caption-subject font-dark sbold uppercase">Profile</span>
					</div>
					<div class="actions">

					</div>
				</div>
				<div class="portlet-body form">
					<?= $this->Flash->render() ?>
					<form class="form-horizontal"  action="<?php echo $this->Url->build('/', TRUE); ?>Admins/updateProfile" role="form" method="post" enctype="multipart/form-data">
						<div class="form-body">
							<div class="form-group" style="text-align: center">
								<div class="fileinput fileinput-new" data-provides="fileinput">
									<div class="fileinput-new thumbnail" style="width: 200px; height: 150px;">
										<?php if($Admin['profile_pic']){ ?>

											<img src="<?php echo $this->Url->build('/', TRUE); ?>img/admins/<?php echo $Admin['profile_pic'];?>" alt="" />
										<?php }else{ ?>
											<img src="<?php echo $this->Url->build('/', TRUE); ?>img/admins/no-image.png" alt="" />
										<?php } ?>
									</div>
									<div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 200px; max-height: 150px;"> </div>
									<div>
										<span class="btn default btn-file">
											<span class="fileinput-new"> Select image </span>
											<span class="fileinput-exists"> Change </span>
											<input type="file" name="profilePic" id="profilePic"> </span>
											<a href="javascript:;" class="btn default fileinput-exists" data-dismiss="fileinput"> Remove </a>
										</div>
									</div>
								</div>
								<div class="form-group">
									<label class="col-md-3 control-label">Name</label>
									<div class="col-md-9">
										<input type="text" class="form-control" value="<?php echo $Admin['name']; ?>" placeholder="Enter Name" id="name" name="name" >
										<!-- <span class="help-block text-danger"> A block of help text. </span> -->
									</div>
								</div>
								<div class="form-group">
									<label class="col-md-3 control-label">Email</label>
									<div class="col-md-9">
										<div class="input-group">
											<span class="input-group-addon">
												<i class="fa fa-envelope"></i>
											</span>
											<input type="email" class="form-control" value="<?php echo $Admin['email']; ?>" placeholder="Email Address" id="email" name="email"> </div>
										</div>
									</div>
								</div>
								<div class="form-actions">
									<div class="row">
										<div class="col-md-offset-3 col-md-9">
											<button type="submit" class="btn green">Submit</button>
										</div>
									</div>
								</div>
							</form>
						</div>
					</div>
					<div class="portlet light bordered">
						<div class="portlet-title">
							<div class="caption">
								<i class="icon-settings font-dark"></i>
								<span class="caption-subject font-dark sbold uppercase">Change Password</span>
							</div>
							<div class="actions">

							</div>
						</div>
						<div class="portlet-body form">
							<!-- <form class="form-horizontal" role="form" method="post" action="<?php echo $this->Url->build('/', TRUE); ?>Admins/changePassword"> -->
							<form class="form-horizontal" role="form" method="post">
								<div class="form-body">
									<div class="form-group">
										<label class="col-md-3 control-label">Current Password</label>
										<div class="col-md-9">
											<input type="password" class="form-control" placeholder="Enter Current Password" id="old_password" name="old_password" >
											<!-- <span class="help-block text-danger"> A block of help text. </span> -->
										</div>
									</div>
									<div class="form-group">
										<label class="col-md-3 control-label">New Password</label>
										<div class="col-md-9">
											<input type="password" class="form-control" placeholder="Enter New Password" id="password1" name="password1" >
											<!-- <span class="help-block text-danger"> A block of help text. </span> -->
										</div>
									</div>
									<div class="form-group">
										<label class="col-md-3 control-label">Confirm Password</label>
										<div class="col-md-9">
											<input type="password" class="form-control" placeholder="Enter Confirm Password" id="password2" name="password2" >
											<!-- <span class="help-block text-danger"> A block of help text. </span> -->
										</div>
									</div>
								</div>
								<div class="form-actions">
									<div class="row">
										<div class="col-md-offset-3 col-md-9">
											<button type="submit" class="btn green">Submit</button>
										</div>
									</div>
								</div>
							</form>
						</div>
					</div>
					<!-- END SAMPLE FORM PORTLET-->

				</div>
			</div>
			<!-- END PAGE BASE CONTENT -->
		</div>
</div>
