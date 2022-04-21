
<?php
SESSION_START();
ini_set('error_reporting', E_ALL);
ini_set('display_errors', 'On');
 require "templates/header.php"; 
 require "../common.php";
 require "../config.php";
 require "valid_file.php";
require "validate_file.php";
if (isset($_POST['submit'])) {
 try {
 $connection = new PDO($dsn, $username, $password, $options);
require_once '../src/DBconnect.php';

 } catch(PDOException $error) {
 echo $sql . "<br>" . $error->getMessage();
 }
	
	
 
 try {
 $connection = new PDO($dsn, $username, $password, $options);

if (isset($_POST['submit'])) {
 if (isset($_POST['type_product'])){
$type_product = $_POST['type_product'];
}else { 
$type_product="";
}
 if (isset($_POST['decription'])){
$decription = $_POST['decription'];
}else { 
$decription="";
}

 if (isset($_POST['price'])){
$price = $_POST['price'];
}else { 
$price="";
}
 if (isset($_POST['location'])){
$location = $_POST['location'];
}else { 
$location="";
}






if (isset($_POST['file'])){
$file = $_POST['file'];
}else { 
$file="";
}


 $target_path = "uploads/";     // Declaring Path for uploaded images.
     $filetmp  = $_FILES["file_img"]["tmp_name"];
    $filename = $_FILES["file_img"]["name"];
    $filetype = $_FILES["file_img"]["type"];
	$filesize = $_FILES["file_img"]["size"];
	$kaboom=explode(".",$filename);
	$fileExt=$kaboom[1];
    $target_path = "uploads/".$filename;
    move_uploaded_file($filetmp,$target_path);
	
	$target_path2 = "uploads/";
     $filetmp2  = $_FILES["file_img2"]["tmp_name"];
    $filename2 = $_FILES["file_img2"]["name"];
    $filetype2 = $_FILES["file_img2"]["type"];
	$filesize2 = $_FILES["file_img2"]["size"];
	$kaboom2=explode(".",$filename2);
	$fileExt2=$kaboom[1];
    $target_path2 = "uploads/".$filename2;
    move_uploaded_file($filetmp2,$target_path2);
	
	
	
 
 $sql = "INSERT INTO users_products(";
$sql .= " type_product,decription,price,location,
image_path,image_path2";
$sql .= ") VALUES (";
$sql .= " '{$type_product}','{$decription}','{$price}','{$location}',
'{$target_path}','{$target_path2}'";
$sql .= ")";
 
}
 
$statement = $connection->prepare($sql);
$statement->execute();
 } catch(PDOException $error) {
 echo $sql . "<br>" . $error->getMessage();
 }
}



?><br /><br />
<?php if (isset($_POST['submit']) && $statement) { ?>
 <?php echo escape(ucfirst($_POST['type_product'])); ?> successfully added.
<?php } ?>
<div class="panel"style="text-align:center;">
    <h3>You are logged in  <?php echo ucfirst($_SESSION['username']);?> 
	</h3>
    <p class="lead"> 
	<form action="logout.php" method="POST"
	name="Logout_Form" class="form-signin">
        <button name="submit" value="submit" class="button" 
		type="submit">Log out</button>
    </form>
</p><br /><br />
<h3>Post Product</h3>
<form method="post" enctype="multipart/form-data">
 
 <label for="type_product">Product name</label><br/>
 <input type="text" name="type_product" id="type_product" required><br/>
 <label for="description">Description</label><br/>
 <input type="text" name="decription" id="decription" required><br/>
 <label for="price">Price</label><br/>
 <input type="price" name="price" id="price" required><br/>
 <label for="location">Location</label><br/>
 <input type="text" name="location" id="location"><br/><br/>
 <label for="Image1">Image</label><br />
<label><input type="file" name="file_img"id="file" ></label><br />
<label for="Image2">Image2</label><br />
<label><input  type="file" name="file_img2"  id="file"></label><br />
<input type="submit" name="submit" value="Submit">
 </form><br />
 <a href="index.php">Back to home</a>
 </div>
 <?php include "templates/footer.php"; ?>