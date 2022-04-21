<?php
/**
 * Use an HTML form to edit an entry in the
 * users table.
 *
 */
require "../common.php";
if (isset($_POST['submit'])) {
 try {
 require_once '../src/DBconnect.php';
 $users_products  =[
  "id" => $_GET['id'],
 "type_product" => $_POST['type_product'],
 "decription" => $_POST['decription'],
 "price" => $_POST['price']
 ];
 $sql = "UPDATE users_products 
 SET id = :id,
 type_product = :type_product,
 decription = :decription,
 price = :price
 WHERE id = :id";
 $statement = $connection->prepare($sql);
 $statement->execute($users_products);
 } catch(PDOException $error) {
 echo $sql . "<br>" . $error->getMessage();
 }
}
if (isset($_GET['id'])) {
 try {
 require_once '../src/DBconnect.php';
 $id = $_GET['id'];
 $sql = "SELECT type_product,decription,price FROM users_products  WHERE id = :id";
 $statement = $connection->prepare($sql);
 $statement->bindValue(':id', $id);
 $statement->execute();
 $users_products = $statement->fetch(PDO::FETCH_ASSOC);
 } catch(PDOException $error) {
 echo $sql . "<br>" . $error->getMessage();
 }
} else {
 echo "Something went wrong!";
 exit;
}
?>
<?php require "templates/header.php"; ?><br /><br /><br />
<?php if (isset($_POST['submit']) && $statement) : ?>
 <?php echo escape($_POST['type_product']); ?> successfully updated.
<?php endif; ?><br /><br /><br /><br />

<h2>Edit a product</h2>
<form method="post">
 <?php foreach ($users_products as $key => $value) : ?>
 <label for="<?php echo $key; ?>"><?php echo ucfirst($key); ?></label>
 <input type="text" name="<?php echo $key; ?>" id="<?php echo $key;
?>" value="<?php echo escape($value); ?>" <?php echo ($key === 'id' ?
'readonly' : null); ?>>
 <?php endforeach; ?>
 <input type="submit" name="submit" value="Submit">
</form>

<?php require "templates/footer.php"; ?>



