<?php
$server = "localhost";
$database = "db_perpus";
$username = "root";
$password = "";

$db = mysqli_connect($server, $username, $password, $database);

function read($query)
{
    global $db;
    $result = mysqli_query($db, $query);
    $rows = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $rows[] = $row;
    }
    return $rows;
}
function query($query)
{
    global $db;
    return mysqli_query($db, $query);
}
