
<?php
SESSION_START();
 require "templates/header.php"; 
 require "../common.php";
 require "../config.php";
 require "valid_file.php";
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


 $target_path = "uploads/";     // Declaring a folder Path for uploaded images.
     $filetmp  = $_FILES["file_img"]["tmp_name"];//store the posted file temporary name
    $filename = $_FILES["file_img"]["name"];//store a the posted file  name
    $filetype = $_FILES["file_img"]["type"];//store a the posted file type
	$filesize = $_FILES["file_img"]["size"];//store a the posted file size
	$ext=explode(".",$filename);//tack a dot to the extension
	$fileExt=$ext[1];//add the first offshoot in the array
    $target_path = "uploads/".$filename;//Path for uploaded image that will go into database.
    move_uploaded_file($filetmp,$target_path);//move the uploaded image into a temporary folder
	
	$target_path2 = "uploads/";// Declaring same folder Path for 2nd uploaded images.
     $filetmp  = $_FILES["file_img2"]["tmp_name"];//store  the 2nd image posted temporary filename
    $filename = $_FILES["file_img2"]["name"];//store  the 2nd image posted filename
    $filetype = $_FILES["file_img2"]["type"];
	$filesize = $_FILES["file_img2"]["size"];
	$ext=explode(".",$filename);
	$fileExt=$ext[1];
    $target_path2 = "uploads/".$filename;//Path for 2nd uploaded image that will go into database.
    move_uploaded_file($filetmp,$target_path2);
	
	
	
 
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
  <a href="delete.php"><button class="btn btn-primary btn-sm">Delete/Edit user<button></a>
  <a href="delete_product.php"><button class="btn btn-primary btn-sm">Delete/Edit product<button></a>
  
 <a href="index.php"><button class="btn btn-primary btn-sm">Back to home</button></a>
 </div>
 <?php include "templates/footer.php"; ?>