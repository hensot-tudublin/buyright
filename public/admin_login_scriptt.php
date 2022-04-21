
<?php
SESSION_START();
 require "../common.php";
 require "../config.php";
  require "valid_file.php";
if (isset($_POST['submit'])) {
 try {
 $connection = new PDO($dsn, $username, $password, $options);
require_once '../src/DBconnect.php';

if (isset($_POST['username'])){
$username = $_POST['username'];
}else { 
$username="";
}
if(isset($_POST['password'])){
$password = $_POST['password'];
}else { 
$password="";
}	
	

 // insert new user 

 $sql = "SELECT * FROM users2
 WHERE username = :username AND password =:password";
 $username = $_POST['username'];
  $username = $_POST['username'];
 $statement = $connection->prepare($sql);
 $statement->bindParam(':username', $username, PDO::PARAM_STR);
 $statement->bindParam(':password', $password, PDO::PARAM_STR);
 $statement->execute();
 $result = $statement->fetchAll();
 } catch(PDOException $error) {
 echo $sql . "<br>" . $error->getMessage();
 }
}
	if($result){
    echo 'Success';
    $_SESSION['username'] = $username;//setting session username
    $_SESSION['Active'] = true; 
    header("location:store_product.php"); //redirect to login page
    exit;  
}
else
    echo 'Incorrect Username or Password';
header("location:admin.php"); 
exit;

?><br /><br />


 <a href="index.php">Back to home</a>
 <?php include "templates/footer.php"; ?>