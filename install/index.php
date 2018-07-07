<?php
include($_SERVER['DOCUMENT_ROOT'] . '/catchnz_test/install/config.php');  

//checking if database installed and redirecting
$config = new config();
if($config->isInstalled){
    header('Location: ../index.php');
}
?>

<html>

<head>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm"
    crossorigin="anonymous">

</head>

<body>
  <div style="margin-top:20px;">
    <div style="margin: auto;width: 60%;padding: 10px;">
      <h2 style="text-align: center; margin-bottom: 30px;">Enter Database Details</h2>
      <form>
        <div class="form-group row">
          <label for="inputHost" class="col-sm-2 col-form-label">DB Host</label>
          <div class="col-sm-10">
            <input type="text" class="form-control" id="inputHost" required placeholder="DB Host">
          </div>
        </div>
        <div class="form-group row">
          <label for="inputUsername" class="col-sm-2 col-form-label">DB Username</label>
          <div class="col-sm-10">
            <input type="text" class="form-control" id="inputUsername" required placeholder="Username">
          </div>
        </div>
        <div class="form-group row">
          <label for="inputPassword" class="col-sm-2 col-form-label">Password</label>
          <div class="col-sm-10">
            <input type="password" class="form-control" required id="inputPassword" placeholder="Password">
          </div>
        </div>
        <div class="form-group row">
          <label for="inputDBname" class="col-sm-2 col-form-label">DB Name</label>
          <div class="col-sm-10">
            <input type="text" class="form-control" required id="inputDBname" placeholder="DB Name">
          </div>
        </div>
        <div class="form-group row">
          <div class="col-sm-10"></div>
            <button id="btnSubmit" type="button" class="btn btn-primary" style="margin: auto">Submit</button>
          </div>
        </div>
      </form>
    </div>
  </div>
  <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q"
    crossorigin="anonymous"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl"
    crossorigin="anonymous"></script>
  <script src="form_submit.js"></script>
</body>

</html>