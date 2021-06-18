<?php
/**
 * using mysqli_connect for database connection
 */
 
$databaseHost = 'localhost';
$databaseName = 'MyDb';
$databaseUsername = 'admin';
$databasePassword = 'admin';
 
$link = mysqli_connect($databaseHost, $databaseUsername, $databasePassword, $databaseName); 
 
?>