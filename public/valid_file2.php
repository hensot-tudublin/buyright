 <?php




	
function filter_user_input($input){
	
	$input = trim($input);
	$input = stripslashes($input);
	$input = htmlspecialchars($input);
	
	return $input;
	
	$username = filter_user_input($_POST['username']);
$password = filter_user_input($_POST['password']);
}
?>