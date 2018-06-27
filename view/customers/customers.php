<?php
include($_SERVER['DOCUMENT_ROOT']."/controller/customers/populateCustomers.php");

?>

<div class = "row title">
  <div>
    <h2>Customers</h2>
    <p>Hit the button to see what customers we currently have.</p>
  </div>
</div>
<div class = "row">
  <div class = "col form-group bodyLeft">
    <button id = "displayCust"  class = "btn form-control" type = "submit">
      Show Customers
    </button>
  </div>
</div>
