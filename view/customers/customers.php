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
    <button id = "displayCust"  class = "btn form-control" type = "button">
      Show Customers
    </button>

      <table id = "custTable" class = "table">
        <tr>
          <th>First Name</th>
          <th>Surname</th>
          <th>Email</th>
          <th>Gender</th>
          <th>IP Address</th>
          <th>Company</th>
          <th>City</th>
          <th>Title</th>
          <th>Website</th>
        </tr>
      </table>

  </div>
</div>
