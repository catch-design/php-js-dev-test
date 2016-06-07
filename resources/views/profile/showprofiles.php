<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>Show profiles</title>
		<base href="/">
		<meta name="viewport" content="width=device-width, initial-scale=1">

		<link href="vendor/twbs/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
		<link href="vendor/twbs/bootstrap/dist/css/bootstrap-theme.min.css" rel="stylesheet">
		<link href="public/main.css" rel="stylesheet">
		<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js" type="text/javascript"></script>
		<script src="public/app.js" type="text/javascript"></script>
	</head>
	<body>
		<div class="container">
			<div class="row">
				<div class="intro .col-lg-12">
					<h1>Show profiles</h1>
				</div>
			</div>
			<div class="row table-responsive">
				<table id="profile-table" class="table">
					<thead>
						<tr>
							<th>#</th>
							<th>First Name</th>
							<th>Last Name</th>
							<th>Email</th>
							<th>Gender</th>
							<th>IP address</th>
							<th>Company</th>
							<th>City</th>
							<th>Title</th>
							<th>Website</th>
						</tr>
					</thead>
					<tbody id="profile-table-body">

					</tbody>
				</table>
			</div>

		</div>
	</body>
</html>
