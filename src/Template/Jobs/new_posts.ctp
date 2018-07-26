<div class="page-content-wrapper">
	<div class="page-content">
	<!-- BEGIN PAGE HEAD-->
	<div class="page-head">
		<!-- BEGIN PAGE TITLE -->
		<form action="#" class="form-horizontal">
            <div class="form-body">
                <div class="form-group">
                    <div class="col-md-4">
						<div class="form-group">
                            <div class="col-md-12">
                                <div class="input-icon right" >
                                    <i class="fa fa-search" style="top:-2px;"></i>
                                    <input type="text" class="form-control input-circle" placeholder="Search">
								</div>
                            </div>
                        </div>
                    </div>
					<div class="col-md-6">

                    </div>
					<div class="col-md-2">
						<div class="form-group">
	                        <select class="form-control input-circle">
	                            <option>Job Type</option>
	                            <option>Option 2</option>
	                            <option>Option 3</option>
	                            <option>Option 4</option>
	                            <option>Option 5</option>
	                        </select>
	                    </div>
                    </div>
                </div>
			</div>
        </form>
		<!-- END PAGE TITLE -->
	</div>
	<!-- END PAGE HEAD-->
	<!-- BEGIN PAGE BASE CONTENT -->
	<div class="row">
		<div class="col-md-12">
			<!-- BEGIN EXAMPLE TABLE PORTLET-->
			<div class="portlet light bordered">
				<div class="portlet-body">
					<div class="table-toolbar">
						<div class="row">
							<div class="col-md-6">

							</div>
							<div class="col-md-6">

							</div>
						</div>
					</div>
					<table class="table table-striped table-bordered table-hover table-checkable order-column" id="sample_1">
						<thead>
							<tr>
								<th> ID </th>
								<th> Date Posted </th>
								<th> Project Title </th>
								<th> Urgency </th>
								<th> Homeowner / Premium Contractor </th>
								<th> Type </th>
								<th> Budget </th>
								<th> Bid Amount </th>
							</tr>
						</thead>
						<tbody>
							<?php if(count($Jobs)>0){ ?>
								<?php foreach ($Jobs as $key => $value) { ?>
									<tr class="odd gradeX">
										<td> <?= $value['id'] ?> </td>
										<td>
											<?= $value['created'] ?>
										</td>
										<td>
											<?= $value['title'] ?>
										</td>
										<td>
											<?= $value['urgency'] ?>
										</td>
										<td>
											<?= $value['user']['name'] ?>
										</td>
										<td>
											<?= $value['type'] ?>
										</td>
										<td>
											$ <?= $value['budget'] ?>
										</td>
										<td>
											No bids
										</td>
									</tr>
								<?php } ?>
							<?php }else{ ?>
								<tr class="odd gradeX">
									<td colspan="8">
										<span class="text-danger">No record found</span>
									</td>
								</tr>
							<?php } ?>
						</tbody>
					</table>
				</div>
			</div>
			<!-- END EXAMPLE TABLE PORTLET-->
		</div>
	</div>
	<!-- END PAGE BASE CONTENT -->
</div>
</div>
