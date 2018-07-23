<div class="page-content-wrapper">
	<div class="page-content">
	<!-- BEGIN PAGE HEAD-->
	<div class="page-head">
		<!-- BEGIN PAGE TITLE -->
		<div class="page-title uppercase">
			<h1> Jobs Yet Awarded
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
								<?php foreach ($Jobs as $key => $value) {
										$minBidAmount = 0;
										$maxBidAmount = 0;
										$totalBidAmount = 0;
										$totalBid = 0;
										if(count($value['bids'])){
											foreach ($value['bids'] as $k => $val) {
												$totalBid +=1;
												$totalBidAmount += $val['amount'];
												if($maxBidAmount < $val['amount']){
													$maxBidAmount = $val['amount'];
												}
												if($minBidAmount){
													if($minBidAmount > $val['amount']){
														$minBidAmount = $val['amount'];
													}
												}else{
													$minBidAmount = $val['amount'];
												}
											}
										}
									?>
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
											<a href="<?php echo $this->Url->build('/', TRUE); ?>/jobs/bidsDetails/<?= $value['id'] ?>">
												<p style="margin: 0px;">
													Min : $<?= $minBidAmount ?>
												</p>
												<p style="margin: 0px;">
													Avg : $<?= $totalBidAmount ?>
												</p>
												<p style="margin: 0px;">
													Max : $<?= $maxBidAmount/$totalBid ?>
												</p>
												<p  style="margin: 0px; margin-top:5px">
													Total of <?= $totalBid ?> bids
												</p>
											</a>
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
