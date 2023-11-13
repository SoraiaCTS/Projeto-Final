<?php
    $dbServerName = 'localhost';
    $dbUserName = 'root';
    $dbPassword = '';
    $dbName = 'projeto';

    $conn = new mysqli($dbServerName, $dbUserName, $dbPassword, $dbName);
    if($conn->connect_error) {
        echo "$conn->connect_error";
        die("Connection failed: " . $conn->connect_error);
    }
?>