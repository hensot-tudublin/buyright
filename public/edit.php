<?php
/**
 * List all users with a link to edit
 */
try {
 require "../common.php";
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
<h2>Update users</h2>
<table>
 <thead>
 <tr>
 <th>#</th>
 <th>Username</th>
 <th>Password</th>
  <th>Edit</th>
 
 </tr>
 </thead>
 <tbody>
 <?php foreach ($result as $row) : ?>
 <tr>
 <td><?php echo escape($row["id"]); ?></td>
 <td><?php echo escape($row["username"]); ?></td>
 <td><?php echo escape($row["password"]); ?></td>
 <td><a href="update-single.php?id=<?php echo escape($row["id"]);
?>">Edit</a></td>
<br />
<td><a href="delete.php?id=<?php echo escape($row["id"]); ?> "> Delete </a>
</td>
 </tr>
 <?php endforeach; ?>
 </tbody>
</table>
<a href="index.php">Back to home</a>
<?php require "templates/footer.php"; ?>