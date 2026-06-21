<?php

header('Content-Type: text/html; charset=utf-8'); 



$host = "localhost";
$dbname = "ZavrsniProjekt";
$username = "root";
$password = "";

$conn = mysqli_connect($host, $username, $password, $dbname) or 
        die('Error connecting to MySQL server.'.mysqli_error());

if ($conn){
    echo "Uspostavljena veza";
}

