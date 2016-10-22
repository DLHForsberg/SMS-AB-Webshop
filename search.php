<!DOCTYPE html>
<html>
<head>
<meta http-equiv="content-type" content="text/html; charset=utf-8"/>

<link rel="stylesheet" href="stilmall.css" type="text/css" media='all' />
<title>SMS AB</title>

<meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>
<?php include('nav.php'); ?>
<div class="col-6 col-m-9">
<h1>Sökresultat</h1>

<?php
$db = pg_connect('host=83.183.100.215 dbname=openbravo user=tad password=tad');

if (!$db) {
  echo "An error occurred.\n";
  exit;
}


/*if(isset($_POST['produkt']))
{*/
$produkt = $_POST['produkt'];



$result = pg_query($db, 
"SELECT Name, Description, PriceList, Weight, IsStocked 
FROM M_Product, M_ProductPrice 
WHERE M_Product.M_Product_ID=M_ProductPrice.M_Product_ID 
AND M_ProductPrice.M_PriceList_Version_ID='CB6B235A5EB44D87B95D69584AB0552E'
AND M_Product.Name ILIKE '%$produkt%'");



if (!$result) {
  echo "An error occurred.\n";
  exit;
}
while ($row = pg_fetch_row($result)) {


echo "<div class='col-11 col-m-12'>";
echo "<form action='kundkorg.php'  method='post' class='align-left'>";
echo "<input type='hidden' name='artikelnr' value='12345'>";
echo "<table>";
echo "<tr>";
echo "<th colspan='2'><input type='hidden' name='prodnamn' value='$row[0]'>$row[0]</th>";
echo "</tr>";
echo "<tr>";
echo "<td><img src='http://wwwlab.iit.his.se/b14danan/images/$row[0].png' width='150'></td>";
echo "<td><input type='submit' class='laggtill' style='width:7em' value='Köp' /></td>";
echo "</tr>";
echo "<tr>";
echo "<td colspan='2'><input type='hidden' name='pris' value='$row[2]'>Pris: $row[2] kr</td>";
echo "</tr>";
echo "<tr>";
echo "<td colspan='2'>Vikt: $row[3] kg</td>";
echo "</tr>";
echo "<tr>";
echo "<td colspan='2'>Finns i lager: $row[4]</td>";
echo "</tr>";
echo "<tr>";
echo "<td colspan='2'>Beskrivning:<br>$row[1]</td>";
echo "</tr>";
echo "<br />\n";
echo "</table>";
echo "</form>";
echo "</div>";
}

?>


</div>

<div class="col-3 col-m-12">
<div class="aside">
<h2>Nyheter</h2>
<p>Passa på att kika på den nya starka serien från Vigor och deras senaste modell Vigor RC</p>
<h2>Rabatter</h2>
<p>Kommande, var uppdaterad!</p>
</div>
</div>

</div>

<div class="footer">
<p>Create by Boulogner Enterprise</p>
</div>

</body>
</html>
