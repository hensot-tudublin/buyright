<?php
ini_set('error_reporting', E_ALL);
ini_set('display_errors', 'On');

require "config.php";
try {
 $connection = new PDO("mysql:host=$host", $username, $password,
$options);
 $sql = file_get_contents("data/init.sql");
 $connection->exec($sql);
 echo "Database and table users created successfully.";
} catch(PDOException $error) {
 echo $sql . "<br>" . $error->getMessage();
}
?>





