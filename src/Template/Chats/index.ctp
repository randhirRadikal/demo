
<script>
	var urlData = "<?php echo $this->Url->build('/', TRUE); ?>";
</script>
<script src="<?php echo $this->Url->build('/', TRUE); ?>assets/global/plugins/angularjs/angular.min.js" type="text/javascript"></script>
<div ng-app="myApp" ng-controller="Chats" ng-cloak>
	<div class="page-sidebar-wrapper">
		<div class="page-sidebar navbar-collapse collapse" >
			<ul class="page-sidebar-menu" data-keep-expanded="false" data-auto-scroll="true" data-slide-speed="250">
				<li class="nav-item start" ng-repeat="job in jobsList" ng-if="jobsList.length >0">
					<a href="javascript:;" class="nav-link " ng-click="getMessageList($index,job.id)">
						<div class="row text-center">
							<div class="row">
								ID {{job.id}} - {{job.title}}
							</div>
							<div  class="row">
								{{job.address}}, {{job.city}}, {{job.state}} # {{job.created|date}}
							</div>
							<div class="row">
								<img src="<?php echo $this->Url->build('/', TRUE); ?>img/jobs/demo.jpg" style="width:140px; height:140px;"/>
							</div>
						</div>
					</a>
				</li>
				<li class="heading text-center" ng-if="jobIsLoadding">
					<i class="fa fa-spinner fa-spin" style="font-size:24px"></i>
				</li>
			</ul>
			<!-- END SIDEBAR MENU -->
		</div>
		<!-- END SIDEBAR -->
	</div>
	<div class="page-content-wrapper">
		<div class="page-content" >
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
				<div class="col-md-12" >
					<!-- BEGIN EXAMPLE TABLE PORTLET-->
					<div class="portlet light bordered">
						<div class="portlet-body">
							<div class="table-toolbar">
								<div class="row" ng-repeat="message in messageLists" ng-if="messageLists.length > 0">
									<div class="col-md-12" ng-if="message.sender_id === jobsList[jobIndex].user_id">
										<span style="background-color:#f0e6ff; padding:5px; overflow:hidden;">
											<span style="boder-radius:3px;">{{message.message}}</span>
										</span>
									</div>
									<div class="col-md-12 text-right" ng-if="message.sender_id != jobsList[jobIndex].user_id">
										<span style="background-color:#f0e6ff; padding:5px; overflow:hidden;">
											<span style="boder-radius:3px;">{{message.message}}</span>
										</span>
									</div>
								</div>
								<div class="row" ng-if="!messageIsLoadding && messageLists.length===0">
									<div class="col-md-12 text-center">
										No data found
									</div>
								</div>
								<div class="row text-center" ng-if="messageIsLoadding">
									<i class="fa fa-spinner fa-spin" style="font-size:24px"></i>
								</div>
								<div class="row text-center" ng-if="!jobId">
									<div class="col-md-12 text-center">
										Please Select Jobs
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
	$scope.jobsList=[];
	$scope.jobId = false;
	$scope.jobIsLoadding = true;
	$scope.messageIsLoadding = false;
	$scope.jobIndex = false;
    var getJobList = function () {
		$http.get(urlData+'Chats/jobs.json').then(function (response) {
		    $scope.jobsList = response.data.result;
			$scope.jobIsLoadding = false;
		});
    };

	getJobList();

	var fetchMessageList = function(){
		$scope.messageIsLoadding = true;
		$http.post(urlData+'Chats/messages.json',{job_id:$scope.jobId}).then(function (response) {
		    $scope.messageLists = response.data.result;
			$scope.messageIsLoadding = false;
		});
	}

	$scope.getMessageList = function(index,jobId){
		$scope.jobId = jobId;
		$scope.jobIndex = index;
		fetchMessageList();
	}


});
</script>
