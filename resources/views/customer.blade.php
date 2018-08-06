<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<meta name="csrf-token" content="{{ csrf_token() }}">
		<title>Customer List</title>
		<!-- Latest compiled and minified CSS -->
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous"
	</head>
	<body>
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<div class="row">
						<div id="app"></div>
						<script src="{{ asset('js/app.js') }}"></script>
					</div>
				</div>
			</div>
		</div>
	</body>
</html>