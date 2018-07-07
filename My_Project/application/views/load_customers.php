<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Customers List</title>
	
	<style type="text/css">

	::selection { background-color: #E13300; color: white; }
	::-moz-selection { background-color: #E13300; color: white; }

	body {
		background-color: #fff;
		margin: 40px;
		font: 13px/20px normal Helvetica, Arial, sans-serif;
		color: #4F5155;
	}

	a {
		color: #003399;
		background-color: transparent;
		font-weight: normal;
	}

	h1 {
		color: #444;
		background-color: transparent;
		border-bottom: 1px solid #D0D0D0;
		font-size: 19px;
		font-weight: normal;
		margin: 0 0 14px 0;
		padding: 14px 15px 10px 15px;
	}

	code {
		font-family: Consolas, Monaco, Courier New, Courier, monospace;
		font-size: 12px;
		background-color: #f9f9f9;
		border: 1px solid #D0D0D0;
		color: #002166;
		display: block;
		margin: 14px 0 14px 0;
		padding: 12px 10px 12px 10px;
	}

	#body {
		margin: 0 15px 0 15px;
	}

	p.footer {
		text-align: right;
		font-size: 11px;
		border-top: 1px solid #D0D0D0;
		line-height: 32px;
		padding: 0 10px 0 10px;
		margin: 20px 0 0 0;
	}

	#container {
		margin: 10px;
		border: 1px solid #D0D0D0;
		box-shadow: 0 0 8px #D0D0D0;
	}
	</style>
</head>
<body>

<div id="container">
	<h1>Load Customers</h1>
	<table class="myTable" border="1px" align="center" style="width:100px;"  >
        <tbody id="applyTable">
			<tr><th>Id</th><th>First Name</th><th>Last Name</th><th>Email</th><th>Gender</th><th>Ip Address</th><th>Company</th><th>City</th><th>Title</th><th>Website</th></tr>
        </tbody>
	<?php
		if($rows){
			$emparray = array();
			foreach($rows as $row){
				$emparray[] = $row;
			}
			$json = json_encode($emparray);
		}
		$arr = array();
		if($json){
			$arr = json_decode($json);
		}
		if($arr){
			foreach($arr as $value){
				echo "<tr><td> ".$value->id." </td><td> ".$value->first_name." </td><td> ".$value->last_name." </td><td> ".$value->email." </td><td> ".$value->gender." </td><td> ".$value->ip_address." </td><td> ".$value->company." </td><td> ".$value->city." </td><td> ".$value->title." </td><td> ".$value->website." </td></tr>";
			}
		}
	?>	
	</table>
	
</div>

</body>
</html>