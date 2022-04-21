 
 <?php

if(empty($_POST['price'])){

$ErrorMsg = "Price cannot be empty!";
}else{
	
$price = filter_user_input($_POST['price']);

}
if(empty($_POST['decription'])){

$ErrorMsg = "Description cannot be empty!";
}else{
	
$decription = filter_user_input($_POST['decription']);

}
if(empty($_POST['location'])){

$ErrorMsg = "Location cannot be empty!";
}else{
	
$location = filter_user_input($_POST['location']);

}



	
function filter_user_input($input){
	
	$input = trim($input);
	$input = stripslashes($input);
	$input = htmlspecialchars($input);
	
	return $input;
	
	$username = filter_user_input($_POST['username']);
$password = filter_user_input($_POST['password']);
$type_product = filter_user_input($_POST['type_product']);
$price = filter_user_input($_POST['price']);
$decription = filter_user_input($_POST['decription']);
$location = filter_user_input($_POST['location']);
$file_img = filter_user_input($_FILE['file_img']);
$file_img2 = filter_user_input($_FILE['file_img2']);
}
?>

<?php
$filetype=Array(1 => 'jpg', 2 => 'jpeg', 3 => 'png', 4 => 'gif'); //store all the image extension types in array

$filename = ""; //get image name here
$ext = explode(".",$filename); //explode and tack dot to value for filename 

if(!(in_array($ext[1],$filetype))) //check image extension not in the array $type
{
    "Image should be jpg";
}else
if(!(in_array($ext[2],$filetype))) //check image extension not in the array $type
{
    "Image should be jpeg";
}else	
if(!(in_array($ext[3],$filetype))) //check image extension not in the array $type
{
    "Image should be png";
}else
if(!(in_array($ext[4],$filetype))) //check image extension not in the array $type
{
    "Image should be gif";
}


?>









