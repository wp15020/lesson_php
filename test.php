<?php
$dsn = 'mysql:host=localhost;dbname=test_connect';
$username = 'username';
$password = '';
$options = array(
    PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8',
); 

$dbh = new PDO($dsn, $username, $password, $options);

?>