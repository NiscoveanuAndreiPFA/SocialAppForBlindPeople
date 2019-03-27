<?php
$serverHost = 'localhost';
$databaseName = 'your_database_name';
$databaseUsername = 'your_database_name';
$databasePassword = 'your_user_password';
$db = mysqli_connect($serverHost, $databaseUsername, $databasePassword, $databaseName);

define('PATH', 'https://your-domain-here/');
?>