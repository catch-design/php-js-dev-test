<?php

/*
 * Front page returns customer data in an ugly table.
 */

// Get the list of customers
$curl = curl_init();
$customer_url = "http://".getenv("CUSTOMERAPI_PORT_80_TCP_ADDR").":".
    getenv("CUSTOMERAPI_PORT_80_TCP_PORT")."/customers.php";

curl_setopt($curl, CURLOPT_URL, $customer_url);
curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);


$customers = json_decode(curl_exec($curl), true);
curl_close($curl);


// Present the list to the user
echo "<h1>List of Customers</h1>";

echo "<table border=\"1\">";
echo "<thead><tr>";
foreach(array_keys($customers[0]) as $column) {
    echo "<th>".$column."</th>";
}
echo "</tr></thead>";

echo "<tbody>";
foreach($customers as $customer) {
    echo "<tr>";
    foreach($customer as $colum_name => $field) {
        if ($colum_name == "website") {
            echo "<td><a href=\"".$field."\">Website</a></td>";
        } else {
            echo "<td>".$field."</td>";
        }
    }
    echo "</tr>";
}
echo "</tbody>";

echo "</table>";
?>
