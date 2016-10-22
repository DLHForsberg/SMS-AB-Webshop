<html>
<head>
		<link rel="shortcut icon" href="bild/favicon.ico" type="image/x-icon">
		<link rel="icon" href="bild/favicon.ico" type="image/x-icon">
</head>
</html>

<div class="col-12 col-m-1 menu">
<div class="up">


		<nav class="nav_up">

		<?php

		if (session_status() == PHP_SESSION_NONE) { session_start(); }
		if (isset($_SESSION['userid'])) {
			echo'
				<a href="loggaut.php">Logga ut</a>
				<a href="kundkorg.php"> Kundkorg</a>
				<a href="minasidor.php">Mina sidor</a>
			';
		} else {
			echo'
				<a href="loggain.php">Logga in</a>
				<a href="reg.php">Registrera</a>
				<a href="kundkorg.php"> Kundkorg</a>
			';
		}

		?>


</nav></div></div>
<div class="header">
<a href="index.php"><img src="bild/SMS-logo.png" alt="Bild" title="SMS-logotyp" >
</a>
<form action="search.php"  method="post">
			  <span><input type="text"  name="produkt" placeholder="Search..."></span>

			  </form>
</div>

<div class="row">
<div class="col-3 col-m-3 menu">
<ul>
<li class="item"><a href="index.php" class="menylank">Hem</a></li>
<li>Modeller
<ul>
<li class="item"><a href="helikoptrar.php" class="menylank">Helikoptrar</a></li>
<!--<li class="item"><a href="batar.php">B?tar</a></li>
<li  class="item"><a href="bilar.php">Bilar</a></li> -->
</li>
</ul>
<li>Accessoarer & Reservdelar
<ul>
<li class="item"><a href="accesoarer.php" class="menylank">Accessoarer</a></li>
<li class="item"><a href="reservdelar.php" class="menylank">Reservdelar</a></li>
</li>
</ul>
<li class="item"><a href="about.php" class="menylank">Om oss</a></li>
<li class="item"><a href="contact.php" class="menylank">Kontakta oss</a></li>
</ul>
</div>
