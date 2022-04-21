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
 $users2 =[
 "id" => $_POST['id'],
 "username" => $_POST['username'],
 "password" => $_POST['password']
 ];
 $sql = "UPDATE users2
 SET id = :id,
 username = :username,
 password = :password
 WHERE id = :id";
 $statement = $connection->prepare($sql);
 $statement->execute($users2);
 } catch(PDOException $error) {
 echo $sql . "<br>" . $error->getMessage();
 }
}
if (isset($_GET['id'])) {
 try {
 require_once '../src/DBconnect.php';
 $id = $_GET['id'];
 $sql = "SELECT * FROM users2 WHERE id = :id";
 $statement = $connection->prepare($sql);
 $statement->bindValue(':id', $id);
 $statement->execute();
 $users2 = $statement->fetch(PDO::FETCH_ASSOC);
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
 <?php echo escape($_POST['username']); ?> successfully updated.
<?php endif; ?><br /><br /><br /><br />
<h2>Edit a user</h2>
<form method="post">
 <?php foreach ($users2 as $key => $value) : ?>
 <label for="<?php echo $key; ?>"><?php echo ucfirst($key); ?></label>
 <input type="text" name="<?php echo $key; ?>" id="<?php echo $key;
?>" value="<?php echo escape($value); ?>" <?php echo ($key === 'id' ?
'readonly' : null); ?>>
 <?php endforeach; ?>
 <input type="submit" name="submit" value="Submit">
</form>

<?php require "templates/footer.php"; ?>

