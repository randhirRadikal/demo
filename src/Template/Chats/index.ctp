
<script src="<?php echo $this->Url->build('/', TRUE); ?>assets/global/plugins/angularjs/angular.min.js" type="text/javascript"></script>
<div ng-app="myApp" ng-controller="Chats">
	<div class="page-sidebar-wrapper">
		<div class="page-sidebar navbar-collapse collapse" style="width:300px">
			<ul class="page-sidebar-menu" data-keep-expanded="false" data-auto-scroll="true" data-slide-speed="250">
				<li class="heading">

				</li>
			</ul>
			<!-- END SIDEBAR MENU -->
		</div>
		<!-- END SIDEBAR -->
	</div>
	<div class="page-content-wrapper">
		<div class="page-content" style="margin-left:300px">
			<!-- BEGIN PAGE HEAD-->
			<div class="page-head">
				<!-- BEGIN PAGE TITLE -->
				<div class="page-title uppercase">
					<h1>Chats
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

						</div>
					</div>
					<!-- END EXAMPLE TABLE PORTLET-->
				</div>
			</div>
			<!-- END PAGE BASE CONTENT -->
		</div>
	</div>
</div>

<script>


var app = angular.module('myApp', []);
app.controller('Chats', function($scope, $location, $http) {
	console.log($location.absUrl());
    var getJobList = function () {
		$http.get('http://localhost/QuickFix/Chats/jobs.json').then(function (response) {
		    $scope.jobsList = response.data;
		});
		console.log("Randhir");
    };

	getJobList();


});
</script>
