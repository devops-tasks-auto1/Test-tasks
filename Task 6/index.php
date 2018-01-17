<?php

$db_host = "localhost";
$db_user = "root";
$db_password = "toor";
$db_database = "test_database";
$token_host = "localhost";
$token_port = "46001";

// TokenService application
// To run it, use 'service token-service start'
//$curl = curl_init();
//curl_setopt($curl, CURLOPT_URL, "http://$token_host:$token_port/get-token");
//curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
//$token = curl_exec($curl);
//curl_close($curl);

// You can skip token validation if you tried hard but you're unable to make it work...
//if ($token != "token-1234567890") {
//    exit("Invalid token!");
//}

$redis = new Redis();
$redis->connect('127.0.0.1', 6379);
$config = $redis->hGetAll('config');
//var_dump($config);

$mysqli = new mysqli("$db_host", "$db_user", "$db_password", "$db_database");

if ($mysqli->connect_errno) {
    exit();
}

echo "<h1>Welcome to the Meaningless Car Statistics (TM) report!<br>";

$query  = "SELECT brands.brand AS brand, cars.registration_country AS country, cars.registration_year AS year, cars.color AS color, models.engine_type AS engine, avg(cars.price) AS price";
$query .= " FROM cars LEFT JOIN models ON cars.model = models.id";
$query .= " LEFT JOIN brands ON models.brand = brands.id";
$query .= " WHERE color = 'red'";
$query .= " AND registration_year > '2013'";
$query .= " AND registration_country = 'de'";
$query .= " AND engine_type = 'electric'";
$query .= " GROUP BY registration_year, cars.brand";

if ($result = $mysqli->query($query)) {
    echo "<table><tr><td>BRAND</td><td>YEAR</td><td>COLOR</td><td>ENGINE</td><td>AVG PRICE</td></tr>";
    while ($row = $result->fetch_assoc()) {
        printf("<tr><td>%s</td><td>%s</td><td>%s</td><td>%s</td><td>%s</td></tr>", $row["brand"], $row["year"], $row["color"], $row["engine"], $row["price"]);
    }
    $result->free();
//    $query->free();
    echo "</table>";
}
