
<?php require "templates/header.php"; ?><br /><br />
<h2>Delete or Update products</h2>
<table>
 <thead>
 <tr>
 <th>#</th>
 <th>Type of product</th><br />
 <th>Price</th>
 <th>Date posted</th>

 </tr>
 </thead>
 <tbody>
 <?php
require "../common.php";
if (isset($_GET["id"])) {
 try {
 require_once '../src/DBconnect.php';
 $id = $_GET["id"];
 $sql = "DELETE FROM users_products WHERE id = :id";
 $statement = $connection->prepare($sql);
 $statement->bindValue(':id', $id);
 $statement->execute();
 $success = "User successfully deleted";
  } catch(PDOException $error) {
 echo $sql . "<br>" . $error->getMessage();
 }
}
try {
 require_once '../src/DBconnect.php';
 $sql = "SELECT * FROM users_products";
 $statement = $connection->prepare($sql);
 $statement->execute();
 $result = $statement->fetchAll();
} catch(PDOException $error) {
 echo $sql . "<br>" . $error->getMessage();
}
?>
 <?php foreach ($result as $row) : ?>
 <tr>
 <td><?php echo escape($row["id"]); ?></td>
 <td><?php echo escape($row["type_product"]); ?></td>
 <td><?php echo escape($row["price"]); ?></td>
 <td><?php echo escape($row["date"]); ?></td>
 <td><a href="delete_product.php?id=<?php echo escape($row["id"]);
?>"><button class="btn btn-primary btn-sm">Delete</button></a></td><br />
 <td><a href="update_product.php?id=<?php echo escape($row["id"]);
?>"><button class="btn btn-primary btn-sm">Edit</button></a></td>

 </tr>
 <?php endforeach; ?>
 </tbody>
</table>



<?php require "templates/footer.php"; ?>
