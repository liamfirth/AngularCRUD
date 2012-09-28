<!doctype html>
<html lang="en" data-ng-app="angularcrud">
<head>
	<meta charset="UTF-8">
	<title>{{ ucwords($table) }} - AngularCRUD</title>
</head>
<body>
	
	<div id="main" data-ng-view></div>
	
	<script src="{{$bundle_path}}/js/angular.min.js"></script>
	<script src="{{$bundle_path}}/js/app.js"></script>
	
</body>
</html>