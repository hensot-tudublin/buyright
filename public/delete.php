<?php
require "../common.php";
if (isset($_GET["id"])) {
 try {
 require_once '../src/DBconnect.php';
 $id = $_GET["id"];
 $sql = "DELETE FROM users2 WHERE id = :id";
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
 $sql = "SELECT * FROM users2";
 $statement = $connection->prepare($sql);
 $statement->execute();
 $result = $statement->fetchAll();
} catch(PDOException $error) {
 echo $sql . "<br>" . $error->getMessage();
}
?>
<?php require "templates/header.php"; ?><br /><br />
<h2>Delete or update users</h2>

<table>
 <thead>
 <tr>
 <th>#</th>
 <th>Username</th>
 <th>Password</th>
 <th>Date</th>
 <th>Delete</th>
 </tr>
 </thead>
 <tbody>
 <?php foreach ($result as $row) : ?>
 <tr>
 <td><?php echo escape($row["id"]); ?></td>
 <td><?php echo escape($row["username"]); ?></td>
 <td><?php echo escape($row["password"]); ?></td>
 <td><?php echo escape($row["date"]); ?> </td>
 <td><a href="delete.php?id=<?php echo escape($row["id"]);
?>"><button class="btn btn-primary btn-sm">Delete</button></a></td>
 <td><a href="update-user.php?id=<?php echo escape($row["id"]);
?>"><button class="btn btn-primary btn-sm">Edit</button></a></td>

 </tr>
 <?php endforeach; ?>
 </tbody>
</table>
<a href="index.php"><button class="btn btn-primary btn-sm">Back to home</button></a>
<?php require "templates/footer.php"; ?>