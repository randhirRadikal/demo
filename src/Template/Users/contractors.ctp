<div class="page-content-wrapper">
	<div class="page-content">
	<!-- BEGIN PAGE HEAD-->
	<div class="page-head">
		<!-- BEGIN PAGE TITLE -->
		<div class="page-title uppercase">
			<h1>Existing Contractors
				<small></small>
			</h1>
		</div>
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
								<th> Contractor </th>
								<th> Time Registration </th>
								<!-- <th> Jobs Posted </th> -->
								<th> Jobs Completed </th>
								<th> Jobs Cancelled </th>
								<th> Activity </th>
								<th></th>
							</tr>
						</thead>
						<tbody>
							<?php if(count($Users)>0){ ?>
								<?php foreach ($Users as $key => $value) { ?>
									<tr class="odd gradeX">
										<td> <?= $value['name'] ?> </td>
										<td>
											<?= $value['created'] ?>
										</td>
										<!-- <td>
											<?= $value['jobs_posted'] ?>
										</td> -->
										<td>
											<?= $value['jobs_cancelled'] ?>
										</td>
										<td>
											<?= $value['jobs_completed'] ?>
										</td>
										<td>
											<?= $value['status'] ?>
										</td>
										<td>

										</td>

									</tr>
								<?php } ?>
							<?php }else{ ?>
								<tr class="odd gradeX">
									<td colspan="6">
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
