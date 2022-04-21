<?php

function error_input(){
	
	if (empty($_POST['username']) || empty($_POST['password'])) {
$error = "Username or Password is invalid";
return  $error;
}
	
}