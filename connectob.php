
<?php

$myServer = "smsab.database.windows.net,1433";
$myUser = "forsberg";
$myPass = "KriSta77";
$myDB = "smsab";

//connection to the database
$dbhandle = mssql_connect($myServer, $myUser, $myPass)
or die("Couldn't connect to SQL Server on $myServer");

//select a database to work with
$selected = mssql_select_db($myDB, $dbhandle)
or die("Couldn't open database $myDB");





?>

Server: smsab.database.windows.net,1433 \r\n

SQL Database: smsab\r\nUser Name: forsberg\r\n\r\n

PHP Data Objects(PDO)

$conn = new PDO ( \"sqlsrv:server = tcp:smsab.database.windows.net,1433; Database = smsab\", \"forsberg\", \"{KriSta77}\");

$conn->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );\r\n}\r\ncatch ( PDOException $e ) {\r\n

print( \"Error connecting to SQL Server.\" );\r\n

die(print_r($e));\r\n}\r\n\r

SQL Server Extension Sample Code:\r\n\r\n

$connectionInfo = array(\"UID\" => \"forsberg@smsab\", \"pwd\" => \"{KriSta77}\", \"Database\" => \"smsab\", \"LoginTimeout\" => 30, \"Encrypt\" => 1, \"TrustServerCertificate\" => 0);\r\n$serverName = \"tcp:smsab.database.windows.net,1433\";\r\n$conn = sqlsrv_connect($serverName, $connectionInfo);
