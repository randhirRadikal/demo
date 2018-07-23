<div class="page-content-wrapper">
	<div class="page-content">

	<!-- BEGIN PAGE BASE CONTENT -->
	<div class="row">
		<div class="col-md-12">
			<!-- BEGIN EXAMPLE TABLE PORTLET-->
			<div class="portlet light bordered">
				<div class="portlet-body">
					<div class="table-toolbar">
						<p style="margin:0;">
							ID <?= $Jobs['id'] ?> - <?= $Jobs['title'] ?>
						</p>
						<p style="margin:0;">
							Total of <strong> <?= count($Jobs['bids']) ?> bids</strong>
						</p>
					</div>
					<div class="row">
						<div class="col-sm-6">
							<table class="table table-hover table-striped table-bordered">
								<tr>
                                    <td> S. No. </td>
                                    <td> Name </td>
                                    <td> Bid Amount </td>
                                </tr>
								<?php if(count($Jobs['bids'])){
									$totalBidAmount = 0;
									$count = 0;
									foreach ($Jobs['bids'] as $key => $value) {
											$totalBidAmount += $value['amount'];
											$count += 1;
										?>
										<tr>
										   	<td><?= $key+1 ?></td>
										   	<td><?= $value['user']['name'] ?></td>
										   	<td>$<?= $value['amount'] ?></td>
										</tr>
									<?php }
									$avgBidAmount = $totalBidAmount/$count;
								} ?>
						   </table>
						</div>
					</div>
					<div class="row">
						<p>
							Average Bidding Price : <strong>$<?= $avgBidAmount ?> </strong>
						</p>
						<p>
							Homeowner Budget : <strong>$<?= $Jobs['budget']?></strong>
						</p>
					</div>
				</div>
			</div>
			<div class="portlet light bordered">
				<div class="portlet-body">
					<div class="table-toolbar">
						<div class="row">
							<span class="fa fa-star" style="color: orange;"></span>
							<span class="fa fa-star" style="color: orange;"></span>
							<span class="fa fa-star checked"></span>
							<span class="fa fa-star"></span>
							<span class="fa fa-star"></span>
						</div>
					</div>
					<div>

					</div>
				</div>
			</div>
			<!-- END EXAMPLE TABLE PORTLET-->
		</div>
	</div>
	<!-- END PAGE BASE CONTENT -->
</div>
</div>
