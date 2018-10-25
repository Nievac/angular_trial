<style>
    .highlighted { 
    	background: yellow; 
    }
    .fa-sort-desc:hover{
    	color: #17a2b8;
    }
    th:hover, .fa-sort-desc:hover {
		cursor: pointer;
    }
</style>
<div class="container">
	<div class="row">
		<div class="col">
			<div ng-controller="menuCtrl" ng-cloak>
				<div class="row">
					<div class="col-md-4 my-2">						
						<select class="form-control" ng-model="show_limit" ng-change="change_limit()">
							<option value="{{ x }}" ng-repeat="(i, x) in data_range">{{ x }}</option>
						</select>
					</div>
					<div class="col-md-4 offset-md-4 my-2">						
						<input type="text" name="search" class="form-control" placeholder="Search" ng-model="search" ng-keyup="	search_keyup()">
					</div>
				</div>
				<div class="row">
					<div class="col-md-4 my-2">
						<button class="btn btn-primary" ng-click="export()">Export</button>
					</div>
				</div>
				<div class="alert alert-info">
					<p>Sort Type: {{ sortType }}</p>

					<p>Sort Reverse: {{ sortReverse }}</p>

					<p>Search Query: {{ search }}</p>
				</div>

				<table class="table table-bordered table-condensed table-striped" id="table_names">
					<thead class="table-primary">
						<tr>
							<th class="w-50" ng-click="sortedBy('fname')">
								First name 
								<span class="fa fa-sort-desc pull-right" 
									ng-click="sortedBy('fname')"
									ng-show="sortReverse==true && sortType=='fname'">	
								</span>
								<span class="fa fa-sort-asc pull-right" 
									ng-click="sortedBy('fname')"
									ng-show="sortReverse==false && sortType=='fname'">
								</span>
							</th>
							<th class="w-50" ng-click="sortedBy('lname')">
								Last name 
								<span class="fa fa-sort-desc pull-right" 
									ng-click="sortedBy('lname')"
									ng-show="sortReverse==true && sortType=='lname'">	
								</span>
								<span class="fa fa-sort-asc pull-right" 
									ng-click="sortedBy('lname')"
									ng-show="sortReverse==false && sortType=='lname'">
								</span>
							</th>
						</tr>
					</thead>
					<tbody class="table-success">
						<tr ng-repeat="(i, x) in name_data  | filter : search | orderBy:sortType:sortReverse">
							<td ng-bind-html="x.fname | highlight : search"></td>
							<td ng-bind-html="x.lname | highlight : search"></td>
						</tr>
					</tbody>
				</table>
				<button class="btn" ng-click="prev_page()" ng-disabled="page==1">< PREV</button> {{ page }} <button class="btn" ng-click="next_page()" ng-disabled = "page == max_page || max_page == 0">NEXT ></button>
			</div>
		</div>
	</div>
</div>

<script type="text/javascript">
	var app = angular.module('indexApp', []);

	app.factory('dataService', function($http) {
	    function getNames() {
	        return $http({
	            method: 'GET',
	            url: URL+'index/getData'
	        }).then(function successCallback(response) {
	            return response.data;
	        });
	    }

	    return {
	        getNames: getNames
	    };
	});

	app.run( function($rootScope, $http, dataService){
		$rootScope.data_range = [10, 20 , 50, 100];
		$rootScope.names = [''];
	})

	app.controller('menuCtrl', function($scope, $rootScope, dataService){

		$scope.page = 1;

		$scope.max_page = Math.ceil($rootScope.names.length / 10);
		
		$scope.search;
		$scope.sortType = 'fname';
		$scope.sortReverse = false;

		
		dataService.getNames().then(function(data) {
			$rootScope.names = data;
			pageHere();
	    });

		$scope.next_page = function() {
			$scope.page = $scope.page + 1;
			pageHere();
		}

		$scope.prev_page = function() {
			$scope.page = $scope.page - 1;
			pageHere();
		}

		$scope.search_keyup = function() {
			$scope.page = 1;
			pageHere();
		}
		
		$scope.change_limit = function() {
			$scope.page = 1;
			pageHere();
		}

		$scope.export = function() {
			let result = document.getElementById("table_names").outerHTML;
			fnExcelReport('try', result);
		}

		$scope.sortedBy  = function(sort_type){
			let oldsortType = $scope.sortType;
			if(oldsortType != sort_type) {
				$scope.sortReverse = false; 
			} else {
				$scope.sortReverse = !$scope.sortReverse; 
			}
			$scope.sortType = sort_type;
		}

		function pageHere(){
			let show_limit = $scope.show_limit != undefined ? $scope.show_limit : 10;
			let names = [];
			if($scope.search != '' && $scope.search != undefined) {
				for(i=0; i<$rootScope.names.length; i++) {
					if(search($rootScope.names[i].fname) || search($rootScope.names[i].lname) ) {
						names.push($rootScope.names[i]);
					}
				}

			} else {
				names = $rootScope.names;
			}

			$scope.max_page = Math.ceil(names.length / show_limit);

			$scope.name_data = [];
			$scope.init = ($scope.page * show_limit) - show_limit;
			$scope.final = $scope.max_page != $scope.page  ?  $scope.page * show_limit : $rootScope.names.length;
			
			for(x = $scope.init; x < $scope.final; x++) {
				$scope.name_data.push(names[x]);
			}
		}

		function search(str) {
			return str.toLowerCase().includes($scope.search.toLowerCase());
		}

		function fnExcelReport(filename,data){
			let content = `<style> 
								table {
							    	border-collapse: collapse;
								}

								table, th, td {
								    border: 1px solid black;
								}
							</style>
							${data}`
							;
		    var ua = window.navigator.userAgent;
		    var msie = ua.indexOf("MSIE "); 
		    if (msie > 0 || !!navigator.userAgent.match(/Trident.*rv\:11\./)) { // IE
		        txtArea1.document.open("txt/html","replace");
		        txtArea1.document.write(tab_text);
		        txtArea1.document.close();
		        txtArea1.focus(); 
		        sa=txtArea1.document.execCommand("SaveAs",true,filename+".xls");
		    } else {
		        var a = document.createElement('a');
		        var data_type = 'data:application/vnd.ms-excel';
		        a.href = data_type + ', ' + encodeURIComponent(content);
		        a.download = filename+'.xls';
		        a.click();
		    }
		}
		
	});

	app.filter('highlight', function($sce) {
    	return function(text, phrase) {
			if (phrase) 
				text = text.replace(new RegExp('('+phrase+')', 'gi'),
			'<span class="highlighted">$1</span>')
			return $sce.trustAsHtml(text)
   	 	}
  	})
   
</script>