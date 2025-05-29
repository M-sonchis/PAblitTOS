<?php
$serverName = "M";
$connectionOptions = array(
    "Database" => "DB_Senati",
    "Uid" => "sa",
    "PWD" => "sa"
);
$conn = sqlsrv_connect($serverName, $connectionOptions);
if ($conn === false) {
    die(print_r(sqlsrv_errors(), true));
}
?>
