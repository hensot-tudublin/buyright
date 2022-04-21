<?php
session_start();
ini_set('error_reporting', E_ALL);
ini_set('display_errors', 'On');
 
 //require "../../src/functions.php"; 




 require "../../common.php";
require "../../config.php";
 try {
 $connection = new PDO($dsn, $username, $password, $options);
//require_once '../src/DBconnect.php';

 } catch(PDOException $error) {
 echo $sql . "<br>" . $error->getMessage();
 }



if(isset($_POST['add']) and $_POST['add'] == 'yes')
{
 $sql = "SELECT id,type_product,price
 FROM users_products
 WHERE id = :id ";
 $id = $_POST['id'];
 $statement = $connection->prepare($sql);
 $statement->bindParam(':id', $id, PDO::PARAM_STR);
 $statement->execute();
 $result2 = $statement->fetchAll();
 } 
 print_r($result2);
if(isset($_POST['add']) and $_POST['add'] == 'yes') {
    if (!isset($_SESSION['cart'])) {
        $_SESSION['cart']=array();
    }
    array_push($_SESSION['cart'], $_POST);
}

foreach ($_SESSION['cart'] as $cart_item) {
    $pid=$cart_item['id'];


}

?><br /><br /><br />
 <h4>cart items</h4>
<div class="panel" style="background: white">
<div class="row">

  




