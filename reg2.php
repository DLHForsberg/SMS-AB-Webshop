<!DOCTYPE html>
<html>
<head>
<meta http-equiv="content-type" content="text/html; charset=utf-8"/>

<link rel="stylesheet" href="stilmall.css" type="text/css" media='all' />
<title>Du är nu medlem</title>

<meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>
<?php include('nav.php'); ?>
<div class="col-6 col-m-9">


    <h1 class="indent"> Du är nu medlem</h1>


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


<?php

include 'connect.php';

	function felpas(){ //Funktion som skickar tillbaka användaren till föregående sida. Körs bara när den kallas
		sleep(1);
		header('location: reg.php?errormessage=Lösenordet matchade inte eller uppföljde inte kraven');
		exit; }

	function felusermail(){
		sleep(1);
		header('location: reg.php?errormessage=Mailen eller användarnamnet finns redan i databasen');
		exit; }

	if (($_POST['pas'] === $_POST['pas2'])) { //Kollar att att lösenorden är lika
		$pass = $_POST['pas'];
		if(!preg_match_all('$\S*(?=\S{8,})(?=\S*[a-z])(?=\S*[A-Z])(?=\S*[\d])(?=\S*[\W])\S*$', $pass)){ //reguljära uttryck. =Ser till att lösenordet följer en viss säkerhet
			felpas();
		}
		else {
			$username = $_POST['userid']; //Kollar om användaren finns i databasen
			$searchqueryuser = $pdo->prepare("SELECT userid FROM users WHERE userid= :user");
			$searchqueryuser->bindParam(':user', $username);
			$searchqueryuser->execute();
			if($searchqueryuser->rowCount() > 0){
				felusermail(); //körs om användare finns
			} else { //Kollar om emailen finns i databasen

				$email = $_POST['E-mail'];
				$searchqueryemail = $pdo->prepare("SELECT Email FROM Kund WHERE Email= :emails");
				$searchqueryemail->bindParam(':emails', $email);
				$searchqueryemail->execute();
				if($searchqueryemail->rowCount() > 0){
					felusermail();//körs om email finns
				} else { //Lägger till användaren

					$insertqueryuser='INSERT INTO users (userid,pas) VALUES(:useridd, :pas);';
					$stmt = $pdo->prepare($insertqueryuser);
					$stmt->bindParam(':useridd', $_POST['userid'], PDO::PARAM_STR);

					$passhash = password_hash($_POST['pas'], PASSWORD_DEFAULT);
					$stmt->bindParam(':pas', $passhash, PDO::PARAM_STR);
					$stmt->execute();
				}
			}
		}
		//lägger till kunden efter att användaren har skapats.
			$stmt1 = $pdo->prepare('INSERT INTO Kund (Fornamn, Efternamn, Gatuadress, Postadress, Personnummer, Email, Telefonnummer, Kon, userid)
																			VALUES(:Fornamn, :Efternamn, :Gatuadress, :Postadress, :Personnummer, :Email, :Telefonnummer, :kon, :userid);'); //:kon,
			$stmt1->bindParam(':Fornamn', $_POST['namn'], PDO::PARAM_STR);
			$stmt1->bindParam(':Efternamn', $_POST['efternamn'], PDO::PARAM_STR);
			$stmt1->bindParam(':Gatuadress', $_POST['Gatuadress'], PDO::PARAM_STR);
			$stmt1->bindParam(':Postadress', $_POST['Postadress'], PDO::PARAM_STR);
			$stmt1->bindParam(':Personnummer', $_POST['Personnummer'], PDO::PARAM_INT);
			$stmt1->bindParam(':Email', $_POST['E-mail'], PDO::PARAM_STR);
			$stmt1->bindParam(':Telefonnummer', $_POST['Telefonnummer'], PDO::PARAM_STR);
			$stmt1->bindParam(':kon', $_POST['kon'], PDO::PARAM_STR);
			$stmt1->bindParam(':userid', $_POST['userid'], PDO::PARAM_STR);
			$stmt1->execute();



		} else {
		felpas(); //körs om lösenorden inte är lika
	}
?>






</div>


</div>

<div class="footer">
<p>Create by Boulogner Enterprise</p>
</div>

</body>
</html>
