<!DOCTYPE html>
<html>
<head>
<meta http-equiv="content-type" content="text/html; charset=utf-8"/>

<link rel="stylesheet" href="stilmall.css" type="text/css" media='all' />
<title>SMS Kundkorg</title>

<meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>
<?php include('nav.php'); ?>

<div class="col-6 col-m-9">
<h1>Kundkorg</h1>
<p> </p>
<div class='col-11 col-m-12'>

<?php
include 'connect.php';
$KUNDKORG = array();
session_start();
/*
if (!isset($_SESSION['userid'])) {*/
/*	
if(!$_SESSION['userid'])
header('Location: ');*/

if(empty($_SESSION['userid'])) {
  header('Location:loggain.php'); 
}


if(isset($_POST['prodnamn'])){
		$querystring='INSERT INTO kundkorg (userid, artikelnr, prodnamn, pris, datum) VALUES(:userid,:artikelnr,:prodnamn,:pris, now());';
		$stmt = $pdo->prepare($querystring);
		$stmt->bindParam(':userid', $_SESSION['userid']);
		$stmt->bindParam(':artikelnr', $_POST['artikelnr']);
		$stmt->bindParam(':prodnamn', $_POST['prodnamn']);
		$stmt->bindParam(':pris', $_POST['pris']);
		$stmt->execute();
		}

if(isset($_GET['korgid'])){
		$querystring='DELETE FROM kundkorg WHERE korgid = :korgid;';
		$stmt = $pdo->prepare ($querystring);
		$stmt->bindParam('korgid',$_GET['korgid']);
		$stmt->execute();
	}

$user=$_SESSION['userid'];
foreach($pdo->query('CALL totalsumman();') as $rows)
	echo "<table class='kundkorg-pris'>";
		echo "<tr>";
		echo "<th align='left'>Produkter:</th>";
		echo "<th align='left'>Antal:</th>";
		echo "<th align='left'>Pris:</th>";
		echo "</tr>";
		echo "<tr>";
	foreach($pdo->query("SELECT korgid, prodnamn, count(prodnamn), sum(pris) FROM kundkorg WHERE kundkorg.userid='$user' group by kundkorg.prodnamn") as $row){
		echo "<tr>";
		echo "<td>".$row['prodnamn']."</td>";
		echo "<td>".$row['count(prodnamn)']."</td>";
		echo "<td style=\"text-align:right;\">".$row['sum(pris)']." kr</td>";
		echo "<th><a href='kundkorg.php?korgid=".$row['korgid']." style=''>X</a></th>";
		echo "</tr>";
	}
		echo "<tr>";
		echo "<th colspan='3' style=\"text-align:right;\">Totalt: ".$rows['SUM(pris)']." kr</th>";

		echo "</tr>";



	
	echo "</table>";

?>
</div>
<div class='col-11 col-m-12'>
<h1>Betalningsalternativ</h1>

<p>För att betala med faktura behöver du bara trycka på knappen fakturabetalning eller fylla i dina kortuppgifter längre ner för att sedan trycka på betala.</p>

<a href="betalat.php" class="betalning">Fakturabetalning</a>


<br>
</div>
<div class='col-11 col-m-12'>

<form action="reg2.php" method="post" class='kundalignleft'>
<fieldset>

<p>Skriv in ditt namn</p>
<label for="user"></label>
<input type="text" id="userid" name="userid" placeholder="För och Efternamn" maxlength="30" required = "required" />

<p>Ange ditt kortnummer</p>
<label for="number"></label>
<input type="number" id="pas" name="pas" placeholder="Kortnummer" maxlength="20" minlength="8" required = "required" pattern="[0-9]{16}"  />

<p>Ange giltighetsdatum</p>
<select id="kon" name="kon" input type="" required = "required" >
  <option value="01">01</option>
  <option value="02">02</option>
  <option value="03">03</option>
  <option value="04">04</option>
  <option value="05">05</option>
  <option value="06">06</option>
  <option value="07">07</option>
  <option value="08">08</option>
  <option value="09">09</option>
  <option value="10">10</option>
  <option value="11">11</option>
  <option value="12">12</option>
</select>
<select id="manad" name="manad" input type="" required = "required" >
  <option value="15">2015</option>
  <option value="16">2016</option>
  <option value="17">2017</option>
  <option value="18">2018</option>
  <option value="19">2019</option>
  <option value="20">2020</option>
</select>
<p>Ange CVV-kod</p>
<label for="cvvkod"></label>
<input type="number" id="" name="" placeholder="CVV" maxlength="3" required type = "numbers" />
<?php
echo "<input type='hidden' name='userid' value='$user'>";
?>
<p>
<a href="betalat.php" class="betalning" method="post" value="Betala">Betala</a>

<?php

/*echo "<a href='betalat.php?userid='$user' class='betalning' method='post' value='$user''>Betala</a>";*/
?>
</p>

</fieldset>
</form>


</div>

</div>


</div>

<div class="footer">
<p>Create by Boulogner Enterprise</p>
</div>

</body>
</html>
