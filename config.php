<?php
$db_host = "us-cdbr-east-06.cleardb.net";
$db_user = "b62ce395a27053";
$db_pass = "37d4c6f2";
$db_name = "heroku_386939a82a1b90d";

$connect = mysqli_connect($db_host, $db_user, $db_pass,  $db_name) or die("database connection error");
