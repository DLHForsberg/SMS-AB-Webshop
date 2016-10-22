<?php
if (session_status() == PHP_SESSION_NONE) { session_start(); }
if (!isset($_SESSION['userid'])) {
header('Location: loggain.php');
}

class Settings
{
	public static $servername = "mysql:dbname=isuprojekt;host=localhost";
	public static $username = "root";
	public static $password = "Hagberg123!";

}

class Connect
{
	private $dbh = null;
	public function Connect(){
		try {
			$this->dbh = new PDO(Settings::$servername, Settings::$username, Settings::$password,
					array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8",
							PDO::ATTR_EMULATE_PREPARES => false
					));
		} catch (PDOException $e) {
			echo 'Connection failed: ' . $e->getMessage();
		}
	}
	public function PDO(){
		return $this->dbh;
	}
}

function readUserData($userId) {
	$statement = (new Connect())->PDO()->prepare (
			"SELECT * FROM Kund
				WHERE userid = :K_userId
				LIMIT 1")
				;
				$statement->execute ( array (
						':K_userId' => $userId
				) )
				;
				$result = $statement->fetch ();
				return $result;
}

function updateUserData($userId){
	$statement = (new Connect())->PDO()->prepare (
			"UPDATE Kund
		SET Fornamn=:Fornamn, Efternamn = :Efternamn, Gatuadress = :Gatuadress, Postadress = :Postadress, Email = :Email, Telefonnummer = :Telefonummer
		WHERE userid = :K_userId")
		;
		$statement->execute ( array (
				':K_userId' => $userId,
				':Fornamn' => $_POST['element_4_1'],
				':Efternamn' => $_POST['element_4_2'],
				':Gatuadress' => $_POST['element_5_0'],
				':Postadress' => $_POST['element_5_1'],
				':Email' => $_POST['element_2'],
				':Telefonummer' => $_POST['element_1']
		) );
		$result = $statement->fetch ();
}

function updatePasswordData($userId){
	
	if(($_POST['element_4_1'] == $_POST['element_4_2']) && preg_match_all('$\S*(?=\S{8,})(?=\S*[a-z])(?=\S*[A-Z])(?=\S*[\d])(?=\S*[\W])\S*$', $_POST['element_4_1'])){ //reguljära uttryck. =Ser till att lösenordet följer en viss säkerhet
		$statement = (new Connect())->PDO()->prepare (
				"UPDATE users
		SET pas = :pwd
		WHERE userid = :K_userId")
				;
				$statement->execute ( array (
						':K_userId' => $userId,
						':pwd' => password_hash($_POST['element_4_1'], PASSWORD_DEFAULT)
				) );
		$result = $statement->fetch ();
		return 'Ändringar sparade';
	} else {
		return 'Lösenordet matchar inte eller uppfyller inte säkerhetskraven.';
	}

}


?>
<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-type" content="text/html; charset=utf-8" />
<link rel="stylesheet" href="stilmall.css" type="text/css" media='all' />
<title>SMS Mina Sidor</title>

<meta name="viewport" content="width=device-width, initial-scale=1.0">

<style type="text/css">
/**** Form Section ****/
.appnitro
{
	font-family:Lucida Grande, Tahoma, Arial, Verdana, sans-serif;
	font-size:small;
}


form ul
{
	font-size:100%;
	list-style-type:none;
	margin:0;
	padding:0;
}

form li
{
	display:block;
	margin:0;
	padding:4px 5px 2px 9px;
	position:relative;
}

form li:after
{
	clear:both;
	content:".";
	display:block;
	height:0;
	visibility:hidden;
}

.buttons:after
{
	clear:both;
	content:".";
	display:block;
	height:0;
	visibility:hidden;
}

.buttons
{
	clear:both;
	display:block;
	margin-top:10px;
}

* html form li
{
	height:1%;
}
* html form li div
{
	display:inline-block;
}

form
{
width: auto !important;
}

form li div
{
	color:#444;
	margin:0 4px 0 0;
	padding:0 0 8px;
}

form li span
{
	color:#444;
	float:left;
	margin:0 4px 0 0;
	padding:0 0 8px;
}



form li div label
{
	clear:both;
	color:#444;
	display:block;
	font-size:9px;
	line-height:9px;
	margin:0;
	padding-top:3px;
}

form li span label
{
	clear:both;
	color:#444;
	display:block;
	font-size:9px;
	line-height:9px;
	margin:0;
	padding-top:3px;
}

.form_description
{
	border-bottom:1px dotted #ccc;
	clear:both;
	display:inline-block;
	margin:0 0 1em;
}

.form_description[class]
{
	display:block;
}

.form_description h2
{
	clear:left;
	font-size:160%;
	font-weight:400;
	margin:0 0 3px;
}

.form_description p
{
	font-size:95%;
	line-height:130%;
	margin:0 0 12px;
}

form hr
{
	display:none;
}

form li.section_break
{
	border-top:1px dotted #ccc;
	margin-top:9px;
	padding-bottom:0;
	padding-left:9px;
	padding-top:13px;
	width:97% !important;
}

form ul li.first
{
	border-top:none !important;
	margin-top:0 !important;
	padding-top:0 !important;
}



/**** Buttons ****/
input.button_text
{
	overflow:visible;
	padding:0 7px;
	width:auto;
}

.buttons input
{
	font-size:120%;
	margin-right:5px;
}

/**** Inputs and Labels ****/
label.description
{
	border:none;
	color:#222;
	display:block;
	font-size:95%;
	font-weight:700;
	line-height:150%;
	padding:0 0 1px;
}

input.text
{
	background:#fff url(../../../images/shadow.gif) repeat-x top;
	border-bottom:1px solid #ddd;
	border-left:1px solid #c3c3c3;
	border-right:1px solid #c3c3c3;
	border-top:1px solid #7c7c7c;
	color:#333;
	font-size:100%;
	margin:0;
	padding:2px 0;
}

select.select[class]
{
	margin:0;
	padding:1px 0;
}

*:first-child+html select.select[class]
{
	margin:1px 0;
}

.safari select.select
{
	font-size:120% !important;
	margin-bottom:1px;
}

input.small
{
	width:25%;
}

select.small
{
	width:25%;
}

input.medium
{
	width:50%;
}

select.medium
{
	width:50%;
}

input.large
{
	width:99%;
}

select.large
{
	width:100%;
}

textarea.small
{
	height:5.5em;
}

textarea.medium
{
	height:10em;
}

textarea.large
{
	height:20em;
}


@media (max-width:960px) {
	.pageField{
		width: 100%;
	}
 
} 

@media (min-width:960px) {
	.pageField{
		width: 50%;
		float: left;
	}
}

</style>



</head>
<body>
<?php include('nav.php'); ?>

<div id="innehall" class="col-6 col-m-6">

    <h1 class="indent"> Mina sidor</h1>
	<div class="pageField">
		<div class="form_description appnitro">
			<h2>Historik</h2>
			<p>Mina beställningar</p>
		</div>	



<?php
	
	
		include 'connect.php';

echo "<table>";	
			echo "<tr>";
			echo "<th> Produkt </th>";
			echo "<th> Pris </th>";
			echo "<th> Datum </th>";
			echo "</tr>";		
		foreach($pdo->query('SELECT prodnamn, pris, datum FROM Kop ORDER BY datum;') as $row){
			echo "<tr>";
			echo "<td>".$row['prodnamn']."</td>";
			echo "<td>".$row['pris']."</td>";
			echo "<td>".$row['datum']."</td>";
			echo "</tr>";	
		}
		echo "</table>";
		?>

		<p style="font-style: italic;"></p>
	</div>
	
	<div class="pageField">	
	
		<?php 
		echo '
		<form id="form_1077042" class="appnitro"  method="post" action="">
		<div class="form_description">
			<h2>Uppgifter</h2>
			<p>Du kan ändra dina uppgifter.</p>
		</div>';

		if(isset($_POST['submit'])){
			if($_POST['submit'] == "Uppdatera"){
				updateUserData($_SESSION['userid']); //�ndra uppgifter
				echo '<h3 style="font-style: italic; color:green;">ändringarna är sparade.</h3>';
			} else {
				echo '<h3 style="font-style: italic; color:green;">' . updatePasswordData($_SESSION['userid']) .'</h3>';
			}
			
			
		}

		$userData = readUserData($_SESSION['userid']); 
		
		echo'
		<li id="li_4" >
		<label class="description" for="element_4">Användarnamn </label>
		<span>
			<input id="element_4_0" name= "element_4_0" class="element text" maxlength="255" size="8" value="' . $userData["userid"].'" disabled/>
			<label>Kan inte bytas</label>
		</span>
		</li>					
		<li id="li_4" >
		<label class="description" for="element_4">Namn </label>
		<span>
			<input id="element_4_1" name= "element_4_1" class="element text" maxlength="255" size="8" value="' . $userData["Fornamn"].'"/>
			<label>Förnamn</label>
		</span>
		</li>
		<li id="li_4" >
		<span>
			<input id="element_4_2" name= "element_4_2" class="element text" maxlength="255" size="14" value="'.$userData["Efternamn"].'"/>
			<label>Efternamn</label>
		</span> 
		</li>		
		
		<li id="li_5" >
		<label class="description" for="element_5">Adress </label>
		
		<div>
			<input id="element_5_0" name="element_5_0" class="element text" value="'.$userData["Gatuadress"].'" type="text">
			<label for="element_5_0">Gatuadress</label>
		</div>	
		
		<div class="left">
			<input  name="element_5_1" class="element text" maxlength="20" value="'.$userData["Postadress"].'" type="text">
			<label for="element_5_5">Postadress</label>
		</div>

		</li>		<li id="li_2" >
		<label class="description" for="element_2">E-mail </label>
		<div>
			<input id="element_2" name="element_2" class="element text" type="text" maxlength="255" value="'.$userData["Email"].'"/> 
		</div> 
		</li>		<li id="li_1" >
		<label class="description" for="element_1">Telefonnummer </label>
		<div>
			<input id="element_1" name="element_1" class="element text" type="text" maxlength="255" value="'.$userData["Telefonnummer"].'"/> 
		</div> 
		</li>
			
		<li class="buttons">
			    <input type="hidden" name="form_id" value="1077042" />
			    
				<input id="saveForm" class="button_text" type="submit" name="submit" value="Uppdatera" />
		</li>
			</ul>
		</form>	
		';
		?>
		
	 <form id="form_1077041" class="appnitro"  method="post" action="">
    	<ul>
    	<li id="li_4" >
		<label class="description" for="element_4">Byt lösenord </label>
		<span>
			<input type="password" id="element_4_1" name= "element_4_1" class="element text" maxlength="255" size="8" value=""/>
			<label>Nytt lösenord</label>
		</span>
		</li>
		<li id="li_4" >
		<span>
			<input type="password" id="element_4_2" name= "element_4_2" class="element text" maxlength="255" size="14" value=""/>
			<label>Upprepa lösenord</label>
		</span> 
		</li>
		<li class="buttons">
    	<input id="passwordForm" class="button_text" type="submit" name="submit" value="Byt mitt lösenord" />
    	</li>
    	</ul>
    	
    </form>	
		
	</div>


		
</div>


</div>

<div class="footer">
<p>Create by Boulogner Enterprise</p>
</div>

</body>
</html>
