<?php
	pr($Users);
?>
<div class="page-content-wrapper">
	<div class="page-content" style="margin-left:00px">
		<!-- BEGIN PAGE BASE CONTENT -->
		<div class="row">
			<div class="col-md-12" >
				<div class="portlet light bordered">
					<div class="portlet-body">
						<div class="table-toolbar">
							<h3>Overview</h3>
							<div class="row">
								<div class="col-sm-4 text-center">
									<h1><strong>20</strong></h1>
									<p>Number of newly registered contractors in the past.</p>
								</div>
								<div class="col-sm-4 text-center">
									<h1><strong>32</strong></h1>
									<p>Number of newly registered contractors in the past.</p>
								</div>
								<div class="col-sm-4 text-center">
									<h1><strong>12</strong></h1>
									<p>Number of newly registered contractors in the past.</p>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="portlet light bordered">
					<div class="portlet-body">
						<div class="table-toolbar">
							<h3>Type of projects</h3>
							<div class="row">
								<div class="col-sm-1">
								</div>
								<div class="col-sm-2 text-center">
									<div id="replacement-circle"></div>
									Replacement
								</div>
								<div class="col-sm-2 text-center">
									<div id="plumbing-circle"></div>
									Plumbing
								</div>
								<div class="col-sm-2 text-center">
									<div id="electrical-circle"></div>
									Electrical
								</div>
								<div class="col-sm-2 text-center">
									<div id="maintenance-circle"></div>
									Maintenance
								</div>
								<div class="col-sm-2 text-center">
									<div id="other-circle"></div>
									Others
								</div>
								<div class="col-sm-1">
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- END PAGE BASE CONTENT -->
	</div>
</div>
<script>
$( document ).ready(function() { // 6,32 5,38 2,34
	$("#replacement-circle").circliful({
		animationStep: 5,
        foregroundBorderWidth: 15,
        backgroundBorderWidth: 15,
        percent: 50
	});

	$("#plumbing-circle").circliful({
		animationStep: 5,
        foregroundBorderWidth: 15,
        backgroundBorderWidth: 15,
        percent: 20
	});

	$("#electrical-circle").circliful({
		animationStep: 5,
        foregroundBorderWidth: 15,
        backgroundBorderWidth: 15,
        percent: 18
	});

	$("#maintenance-circle").circliful({
		animationStep: 5,
        foregroundBorderWidth: 15,
        backgroundBorderWidth: 15,
        percent: 8
	});

	$("#other-circle").circliful({
		animationStep: 5,
        foregroundBorderWidth: 15,
        backgroundBorderWidth: 15,
        percent: 4
	});
	/*
		animation: 6,
		animationStep: 5,
		foregroundBorderWidth: 15,
		backgroundBorderWidth: 15,
		percent: 38,
		textSize: 28,
		textStyle: 'font-size: 12px;',
		textColor: '#002699',
		multiPercentage: 1,
		percentages: [10, 20, 30]
	*/
});
</script>
