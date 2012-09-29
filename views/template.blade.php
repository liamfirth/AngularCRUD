<!doctype html>
<html lang="en" data-ng-app="angularcrud">
<head>
	<meta charset="UTF-8">
	<title>{{ ucwords($table) }} - AngularCRUD</title>
	<link rel="stylesheet" type="text/css" href="{{$bundle_path}}/css/angularcrud.css">
</head>
<body>
	
	<div id="main" data-ng-view></div>
	
	<script src="{{$bundle_path}}/js/utilities/head.min.js"></script>
	<script>
		head.js(
			'{{$bundle_path}}/js/angular.min.js',
			'{{$bundle_path}}/js/common.js',
			'{{$bundle_path}}/js/directives.js',
			'{{$bundle_path}}/js/filters.js',
			'{{$bundle_path}}/js/controllers/listController.js',
			'{{$bundle_path}}/js/controllers/updateController.js',
			'{{$bundle_path}}/js/controllers/createController.js',
			'{{$bundle_path}}/js/controllers/viewController.js',
			'{{$bundle_path}}/js/controllers/deleteController.js',
			'{{$bundle_path}}/js/routes.js'
		)
	</script>
	
</body>
</html>