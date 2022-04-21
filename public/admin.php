<?php session_start();
include_once('../public/templates/header.php') ; 
include_once('login_error.php') ;
?>
<body><br /><br /><br /><br /><br /><br />
<div class="panel"style="text-align:center ">

<label for="property type">Login
	<form action="admin_login_scriptt.php" method="POST">
	<label for="Username">Username
	</label>
	 <input type="text" name="username" id="username" value="" required="required"/><br />
	 <label for="password">Password
	</label>
	 <input type="password" name="password" id="password" value=""required="required"/><br />
	 <input type="submit" value="submit" name="submit" />
</form><br />

<a href="create.php">Sign up</a>
</div>
	   </label>
</body>










<?php include_once('../public/templates/footer.php') ; ?>