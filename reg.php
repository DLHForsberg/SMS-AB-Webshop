<!DOCTYPE html>
<html>
<head>
<meta http-equiv="content-type" content="text/html; charset=utf-8"/>

<link rel="stylesheet" href="stilmall.css" type="text/css" media='all' />
<title>Registering</title>

<meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>
<?php include('nav.php'); ?>
<div class="col-6 col-m-9">

<div class="reg">
<div class="col-12 col-m-9">
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

</div>

</div>


<div class="reg">
<div class="col-12 col-m-9">

    <h1 class="indent"> Registrering </h1>


	<?php



if (!empty($_GET['errormessage'])) { //används av funktionerna felpas och felusermail
	$msg=$_GET['errormessage'];
	echo $msg;

}

?>


<form action="reg2.php" method="post">
<fieldset>

<p>Välj ditt användarnamn</p>
<label for="user"></label>
<input type="text" id="userid" name="userid" placeholder="Användarnamn" maxlength="30" required = "required" />

	<p>Lösenordet måste innehålla siffror, stora och små bokstäver. Lösenordet måste även vara längre än 8 tecken och innehålla speciella "bokstäver" ex: !@#$%^&*()\-_=+{};:,</p>
<label for="password"></label>
<input type="password" id="pas" name="pas" placeholder="Lösenord" maxlength="255" minlength="8" required = "required"  />

<p>Skriv in lösenordet igen</p>
<label for="password2"></label>
<input type="password" id="pas2" name="pas2" placeholder="Lösenord" maxlength="255" minlength="8" required = "required"  />

	<p>Förnamn</p>
<label for="namn"></label>
<input type="text" id="namn" name="namn" placeholder="Förnamn" maxlength="30" required = "required"  />

<p>Efternamn</p>
<label for="efternamn"></label>
<input type="text" id="efternamn" name="efternamn" placeholder="Efternamn" maxlength="30" required = "required" />

	<p>Gatuadress</p>
<label for="Gatuadress"></label>
<input type="text" id="Gatuadress" name="Gatuadress" placeholder="Gatuadress" maxlength="20" required = "required"  />

<p>Postadress</p>
<label for="Postadress"></label>
<input type="text" id="Postadress" name="Postadress" placeholder="Postadress" maxlength="20" required = "required"  />

	<p>Personnummer</p>
<label for="personnummer"></label>
<input type="number" id="Personnummer" name="Personnummer" placeholder="Personnummer" maxlength="12" minlength="12" required = "required" />

<p>E-mail</p>
<label for="E-mail"></label>
<input type="email" id="E-mail" name="E-mail" placeholder="Email@mail.se" maxlength="100" required = "required"  />

<p>Telefonnummer</p>
<label for="Telefonnummer"></label>
<input type="number" id="Telefonnummer" name="Telefonnummer" placeholder="Telefonnummer" maxlength="12" minlength="10" required = "required"  />

<select id="kon" name="kon" input type="gender" required = "required" >
  <option value="Man">Man</option>
  <option value="Kvinna">Kvinna</option>
</select>
<p>För att registrera dig måste du godkänna att vi lagrar de uppgifter du anger genom att kryssa i boxen nedan.</p>
<input type="checkbox" name="lagringscheck" value="godkänt"> Jag godkänner

<p>

<input type="submit" value="Registrera dig" />
</p>

</fieldset>
</form>


</div>

</div>




</div>


</div>

<div class="footer">
<p>Create by Boulogner Enterprise</p>
</div>

</body>
</html>
