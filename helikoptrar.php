<!DOCTYPE html>
<html>
<head>
<meta http-equiv="content-type" content="text/html; charset=utf-8"/>
<link rel="stylesheet" href="stilmall.css" type="text/css" media='all' />
<title>SMS helikopter</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>
<?php include('nav.php'); ?>
<div class="col-6 col-m-9">
<h1>Helikoptrar</h1>
<p>Här finns vårt utbud av helikoptrar</p>

<?php
if (!empty($_GET['tillagd'])) { //används av funktionerna felpas och felusermail
	$msg=$_GET['tillagd'];
	echo $msg;
}

//include('connectob.php');

Server: smsab.database.windows.net,1433 \r\n

SQL Database: smsab\r\nUser Name: forsberg\r\n\r\n

PHP Data Objects(PDO)

$conn = new PDO ( \"sqlsrv:server = tcp:smsab.database.windows.net,1433; Database = smsab\", \"forsberg\", \"{KriSta77}\");

$conn->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );\r\n}\r\ncatch ( PDOException $e ) {\r\n

print( \"Error connecting to SQL Server.\" );\r\n

die(print_r($e));\r\n}\r\n\r

SQL Server Extension Sample Code:\r\n\r\n

$connectionInfo = array(\"UID\" => \"forsberg@smsab\", \"pwd\" => \"{KriSta77}\", \"Database\" => \"smsab\", \"LoginTimeout\" => 30, \"Encrypt\" => 1, \"TrustServerCertificate\" => 0);\r\n$serverName = \"tcp:smsab.database.windows.net,1433\";\r\n$conn = sqlsrv_connect($serverName, $connectionInfo);


Data Source=tcp:smsab.database.windows.net,1433;Initial Catalog=smsab;User ID=forsberg@smsab;Password=KriSta77


/*
//declare the SQL statement that will query the database
$query = "SELECT name, decription, pricelist, weigh, isstocked ";
$query .= "FROM helikoptrar ";

//execute the SQL query and return records
$result = mssql_query($query);

$numRows = mssql_num_rows($result);
echo "<h1>" . $numRows . " Row" . ($numRows == 1 ? "" : "s") . " Returned </h1>";

//display the results
while($row = mssql_fetch_array($result))
{
    echo "<li>" . $row["name"] . $row["decription"] . $row["pricelist"] . "</li>";
}
//close the connection
mssql_close($dbhandle);


*/




/*
$result = pg_query($db, 
"SELECT Name, Description, PriceList, Weight, IsStocked 
FROM M_Product, M_ProductPrice 
WHERE M_Product.M_Product_ID=M_ProductPrice.M_Product_ID 
AND M_ProductPrice.M_PriceList_Version_ID='CB6B235A5EB44D87B95D69584AB0552E'
AND M_Product.M_Product_Category_ID='85FD5CC9927E4C5E870439233F336281'");

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
*/
?> 
</div>
</div>
<div class="footer">
<p>Create by Boulogner Enterprise</p>
</div>
</body>
</html>
