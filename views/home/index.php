<?php
	
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<title>Tindahan ni Aling Bebe</title>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" href="<?= URL ?>public/bootstrap-4/css/bootstrap.min.css">
		<script src="<?= URL ?>public/bootstrap-4/js/jquery.min.js"></script>
		<script src="<?= URL ?>public/bootstrap-4/js/bootstrap.min.js"></script>
		<script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.6.9/angular.min.js"></script>
	</head>
	<style>
	
	*{
		/* font-family: Cooper; */
	}

	</style>
	<body class="bg-info">
		<div class="container" ng-app="angularApp" ng-controller="ctrl-modal-body">
			<div class="modal fade" id="loginModal">
				<div class="modal-dialog">
					<div class="modal-content bg-default">
						<div class="modal-header">
							<h4 class="modal-title">Login</h4>
							<button type="button" class="close" data-dismiss="modal">&times;</button>
						</div>
						<div class="modal-body" >
							<form id="login-form" ng-submit="loginSubmit()" enctype="multipart/form-data">
								<div class="form-group">
									<label for="email">Email address:</label>
									<input type="email" class="form-control" id="email" placeholder="Input email" ng-model="user.email" ng-change="emailChange()">
									<p ng-bind="user.email"></p>
								</div>
								<div class="form-group">
									<label for="pwd">Password:</label>
									<input type="password" class="form-control" id="pwd" placeholder="Input password" ng-model="user.password">
								</div>
								<div class="form-group">
									<label for="file">File:</label>
									<input type="file" class="form-control" id="file" ng-model="user.file">
								</div>
								<button type="submit" class="btn btn-primary">Submit</button>
							</form>
						</div>
						<!-- <div class="modal-footer">
							<button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
						</div> -->
					</div>
				</div>
			</div>
		</div>
	</body>
	<script>
		$(function(){
			$('#loginModal').modal({
				backdrop: 'static',
				keyboard: false
			});

		});
			var app = angular.module("angularApp", []);
			
			app.controller("ctrl-modal-body", function($scope, $http) {
				$scope.user = {};
				$scope.emailChange = function(){
					
				}

				$scope.loginSubmit = function() {
					console.log($scope.user);
					let form_data = new FormData();
					angular.forEach($scope.user, function(file){
						form_data.append('file', file);
					});
					var config = {
						transformRequest: angular.identity,
						headers: {      
							'Content-Type': undefined,
							'Process-Data': false
						}
					};
					$http.post('<?=URL?>login', JSON.stringify($scope.user), config)
					.then(function mySuccess(response) {        
						alert(response.data);
						// $scope.message = data;
					});
					// res.error(function(data, status, headers, config) {
					// 	alert(data);
					// 	alert( "failure message: " + JSON.stringify({data: data}));
					// });	
				}
				
			})


	</script>
</html>