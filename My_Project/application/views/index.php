<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Customers List</title>
</head>
<body>
<?php echo form_open('Customers/getcustomers'); ?> 
		<input type="submit" name="submit" value="Pull Request" />
<?php echo form_close(); ?>
</body>
</html>