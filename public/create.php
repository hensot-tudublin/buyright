<?php require "templates/header.php"; ?><br /><br />
<?php
 require "../common.php";
 require "../config.php";
  require "valid_file2.php";
if (isset($_POST['submit'])) {
 try {
 $connection = new PDO($dsn, $username, $password, $options);
require_once '../src/DBconnect.php';

 } catch(PDOException $error) {
 echo $sql . "<br>" . $error->getMessage();
 }
	
	
 
 try {
 $connection = new PDO($dsn, $username, $password, $options);
 // insert new user 
 $new_user = array(
 "username" => $_POST['username'],
 "password" => $_POST['password']

 );
$sql = sprintf("INSERT INTO %s (%s) values (%s)", "users2",
 implode(", ", array_keys($new_user)),
 ":" . implode(", :", array_keys($new_user)));
$statement = $connection->prepare($sql);
$statement->execute($new_user);
 } catch(PDOException $error) {
 echo $sql . "<br>" . $error->getMessage();
 }
}

?><br /><br />
<?php if (isset($_POST['submit']) && $statement) { ?>
 <?php echo ucfirst(escape ($_POST['username'])); ?> You have registered.
<?php } ?>
<body><br /><br /><br /><br /><br /><br />
<div class="panel"style="text-align:center ">

<label for="property type">Sign up
 <form method="post">
 <label for="username">Username</label>
 <input type="text" name="username" id="username" required><br />
 <label for="password">Password</label>
  <input type="password" name="password" id="password" required><br />
 <input type="submit" name="submit" value="Submit">
 </form><br />
 <a href="admin.php">Login</a>
 </div>
 </body>
 <?php include "templates/footer.php"; ?>