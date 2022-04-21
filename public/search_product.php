<?php
SESSION_START();
if (isset($_POST['submit'])) {
 try {
	require "templates/header.php"; 
 require "../src/functions.php"; 
 require "../common.php";
 require_once '../src/DBconnect.php';
 require "valid_file2.php";
 $sql = "SELECT *
 FROM users_products
 WHERE type_product = :type_product ";
 $type_product = $_POST['type_product'];
 $statement = $connection->prepare($sql);
 $statement->bindParam(':type_product', $type_product, PDO::PARAM_STR);
 $statement->execute();
 $result = $statement->fetchAll();
 } catch(PDOException $error) {
 echo $sql . "<br>" . $error->getMessage();
 }


if (isset($_POST['submit'])) {
 if ($result && $statement->rowCount() > 0) {
	 if(isset($_GET['image_path'])){
$image_path= $_GET['image_path'];
}else { 
$image_path="";
}
if(isset($_GET['image_path2'])){
$image_path2= $_GET['image_path2'];
}else { 
$image_path2="";
} 
	 if(isset($_GET['type_product'])){
$type_product= $_GET['type_product'];
}else { 
$type_product="";
}
if(isset($_GET['price'])){
$price= $_GET['price'];
}else { 
$price="";
}
if(isset($_GET['location'])){
$location= $_GET['location'];
}else { 
$location="";
}


if(isset($_GET['decription'])){
$decription= $_GET['decription'];
}else { 
$decription="";
}






?>
<br /><br /><br />

 <h4>Search Results</h4>
<div class="panel"id="seta">
<div class="row">
  <?php foreach ($result as $row) { ?>
 <ul style="list-style-type:none;margin-left:220px;">
 <li style="float:left"><img height="350" width="350" src="<?php echo escape($row["image_path"]); ?>"></li>
 <li style="float:left"><img height="350" width="350" src="<?php echo escape($row["image_path2"]); ?>"></li>
<li style="color:black;font-weight:30px;margin-left:800px;"><?php echo ' Product Name- ' ;?><?php echo escape($row["type_product"]); ?></li>
<li style="color:black;font-weight:30px;margin-left:800px;"><?php echo ' Description- ' ;?>
<?php echo escape($row["decription"]); ?></li>
<li style="color:black;font-weight:30px;margin-left:800px;"><?php echo ' Price-&euro; ' ;?>
<?php echo escape($row["price"]) ?></li>

 <form method="post" action="../public/templates/cart.php" style="display: inline">
<input type='hidden' name='id' value='".$row['id']."'>
<input type='hidden' name='add' value='yes'>
<input type='submit' name='add_cart' value='Add to Cart'>
 </form>

 </ul>
 </div>
 </div>
 
 <?php } 
 
 }
}
}


?>
 <br /><br /><br /><br />
 <div class="panel"style="text-align:center;">
 <h4>Search Products</h4>
<form action="search_product.php" method="post">
 <label for="type_product">type of product</label><br />
 <input type="text" id="type_product" name="type_product"><br />
 <input type="submit" name="submit" value="View Results">
</form><br />
</div>
</body>
<?php include_once('../public/templates/footer.php') ; ?>











