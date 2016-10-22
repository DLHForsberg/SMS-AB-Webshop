<!DOCTYPE html>
<html>
<head>
<meta http-equiv="content-type" content="text/html; charset=utf-8"/>

<link rel="stylesheet" href="stilmall.css" type="text/css" media='all' />
<title>SMS logga in</title>

<meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>
<?php include('nav.php'); ?>
<div class="col-6 col-m-9">

<div class="reg">
<div class="col-12 col-m-9">
<h1>Logga in</h1>

<?php

if (session_status() == PHP_SESSION_NONE) { session_start(); }
if( isset($_SESSION['ERRMSG_ARR'])){
	echo '<ul style="padding:0; color:red;">';
	foreach($_SESSION['ERRMSG_ARR'] as $msg) {
		echo '<li>',$msg,'</li>';
	}
	echo '</ul>';
	unset($_SESSION['ERRMSG_ARR']);
}

?>




<form action="login_checkuserid.php" method="post">
<fieldset>
<p>
<label for="user"></label>
<input type="text" id="userid" name="userid" placeholder="Användarnamn" maxlength="30" />
</p>
<p>
<label for="passord"></label>
<input type="password" id="pas" name="pas" placeholder="Lösenord" maxlength="20" />
</p>
<p>
<input type="submit" value="Logga in" />
</p>

<a href="forg.php"><div class="pass"> Har du glömt ditt lösenord?</div></a>
</fieldset>
</form>
</table>


</div>

</div>


<div class="reg">
<div class="col-12 col-m-9">

	<?php



if (!empty($_GET['errormessage'])) { //används av funktionerna felpas och felusermail
	$msg=$_GET['errormessage'];
	echo $msg;

}

?>

</div>
</div>
</div>
</div>

<div class="footer">
<p>Create by Boulogner Enterprise</p>
</div>

</body>
</html>
