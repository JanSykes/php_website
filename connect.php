<?php
$servername = "localhost";
$username = "student";
$password = "website";
$dbasename = "labwork";

//creating a connection
$mysqli = new mysqli($servername,$username,$password,$dbasename);

//checking connection
if($mysqli->connect_errno){
    printf("connection failed: %s\n", $mysqli->connect_errno);
    exit();
}
?>