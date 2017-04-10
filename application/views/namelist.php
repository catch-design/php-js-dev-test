<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Name List">
    <meta name="author" content="Hurin">
	<title>Name List</title>
	<link href="<?=base_url('css/bootstrap.min.css');?>" rel="stylesheet">
	<link href="<?=base_url('css/dashboard.css');?>" rel="stylesheet">
	<script src="<?=base_url('js/ie-emulation-modes-warning.js');?>"></script>

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body>
	<nav class="navbar navbar-inverse navbar-fixed-top">
      <div class="container-fluid">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="#">XXX</a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
          <ul class="nav navbar-nav navbar-left">
            <li><a href="<?=base_url();?>">Dashboard</a></li>
          </ul>
        </div>
      </div>
    </nav>

    <div class="container-fluid">
      <div class="row">
        <div class="col-sm-3 col-md-2 sidebar">
          <ul class="nav nav-sidebar">
            <li class="active"><a href="<?=base_url();?>">Name List <span class="sr-only">(current)</span></a></li>
          </ul>
        </div>
        <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
          <h1 class="page-header">Name List</h1>
          <div class="order">
	          <label>Order by </label>
	          <select class="form-control" id="orderby">
		          <option value="id">ID</option>
		          <option value="first_name">First Name</option>
		          <option value="last_name">Last Name</option>
		          <option value="email">Email</option>
		          <option value="gender">Gender</option>
		          <option value="company">Company</option>
		          <option value="city">City</option>
		          <option value="title">Title</option>
	          </select>
          </div>
          <br><br><br><br>
          <div class="table-responsive">
            <table class="table table-striped">
              <thead>
                <tr>
                  <th>ID</th>
                  <th>First Name</th>
                  <th>Last Name</th>
                  <th>Email</th>
                  <th>Gender</th>
                  <th>IP Address</th>
                  <th>Company</th>
                  <th>City</th>
                  <th>Title</th>
                  <th>Website</th>
                </tr>
              </thead>
              <tbody id="list">
              	<?
              	foreach($list as $item){
              	?>
              	<tr>
              		<td><?=$item['id'];?></td>
              		<td><?=$item['first_name'];?></td>
              		<td><?=$item['last_name'];?></td>
              		<td><?=$item['email'];?></td>
              		<td><?=$item['gender'];?></td>
              		<td><?=$item['ip_address'];?></td>
              		<td><?=$item['company'];?></td>
              		<td><?=$item['city'];?></td>
              		<td><?=$item['title'];?></td>
              		<td><a href="<?=$item['website'];?>" target="_blank">Link</a></td>
              	</tr>
              	<?	
              	}
              	?>
              </tbody>
            </table>
            <center>
            	<label class="text-primary" id="alert">No more users !</label>
            </center>
            <br><br>
            <center>
            	<button class="btn btn-primary" id="more">Load More</button>
            </center>
          </div>
        </div>
      </div>
    </div>

	<script src="<?=base_url('js/jquery-3.1.1.min.js');?>"></script>
	<script src="<?=base_url('js/bootstrap.min.js');?>"></script>
	<script src="<?=base_url('js/custom.js');?>"></script>
</body>
</html>