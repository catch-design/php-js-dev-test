<?php

/*
 * This will just extract a list of all customers and return it as json
 */

$method = $_SERVER["REQUEST_METHOD"];
if ($method != 'GET') {
    http_response_code(400);
    die("Only GET is permitted.");
}

$dbname = getenv("POSTGRES_DB");
$password = getenv("DATABASE_PASSWORD");
$user = getenv("POSTGRES_USER");
$dbconn = pg_connect("host=db dbname=$dbname user=$user password=$password");

$result = pg_query($dbconn, "SELECT * FROM customer");


header('Content-Type: application/json');
http_response_code(200);
echo json_encode(pg_fetch_all($result));

?>
