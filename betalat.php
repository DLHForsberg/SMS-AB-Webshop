<!DOCTYPE html>
<html>
<head>
<meta http-equiv="content-type" content="text/html; charset=utf-8"/>

<link rel="stylesheet" href="stilmall.css" type="text/css" media='all' />
<title>Betalat</title>

<meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
    .invoice-box{
        max-width:800px;
        margin:auto;
        padding:30px;
        border:1px solid #eee;
        box-shadow:0 0 10px rgba(0, 0, 0, .15);
        font-size:16px;
        line-height:24px;
        font-family:'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif;
        color:#555;
    }
    
    .invoice-box table{
        width:100%;
        line-height:inherit;
        text-align:left;
    }
    
    .invoice-box table td{
        padding:5px;
        vertical-align:top;
    }
    
    .invoice-box table tr td:nth-child(2){
        text-align:right;
    }
    
    .invoice-box table tr.top table td{
        padding-bottom:20px;
    }
    
    .invoice-box table tr.top table td.title{
        font-size:45px;
        line-height:45px;
        color:#333;
    }
    
    .invoice-box table tr.information table td{
        padding-bottom:40px;
    }
    
    .invoice-box table tr.heading td{
        background:#eee;
        border-bottom:1px solid #ddd;
        font-weight:bold;
    }
    
    .invoice-box table tr.details td{
        padding-bottom:20px;
    }
    
    .invoice-box table tr.item td{
        border-bottom:1px solid #eee;
    }
    
    .invoice-box table tr.item.last td{
        border-bottom:none;
    }
    
    .invoice-box table tr.total td:nth-child(2){
        border-top:2px solid #eee;
        font-weight:bold;
    }
    
    @media only screen and (max-width: 600px) {
        .invoice-box table tr.top table td{
            width:100%;
            display:block;
            text-align:center;
        }
        
        .invoice-box table tr.information table td{
            width:100%;
            display:block;
            text-align:center;
        }
    }
    </style>
</head>
<body>
<?php include('nav.php'); ?>

<div class="col-6 col-m-9">
<h1>Betalning klar</h1>
<p> </p>
<div class='col-11 col-m-12'>

<?php

include 'connect.php';


$user=$_SESSION['userid'];


$pdo->query("INSERT INTO Kop (userid, artikelnr, prodnamn, pris, datum) SELECT userid, artikelnr, prodnamn, pris, datum FROM kundkorg WHERE kundkorg.userid='$user'");
$pdo->query("DELETE FROM kundkorg WHERE kundkorg.userid='$user'");



?>
<div class='col-11 col-m-12'>
<p></p>
    <div class="invoice-box">
        <table cellpadding="0" cellspacing="0">
            <tr class="top">
                <td colspan="2">
                    <table>
                        <tr>
                            <td class="title">
                                <img src="sms.png" style="width:100%; max-width:300px;">
                            </td>
                            
                            <td>
                                Kvittonr: 017<br>
                                Skapad: <?php echo date('Y-m-d'); ?><br>
                                Förfallodatum: <?php echo date('Y-m-d', strtotime('+30 days')); ?></br>
                                Betalas till BG: 0000-0000<br>
                                Ange kvittonr som referens
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>
            
            <tr class="information">
                <td colspan="2">
                    <table>
                        <tr>
                            <td>
                                SMS AB<br>
                                Tunnelgatan 3<br>
                                52136, Falköping
                            </td>
<?php foreach($pdo->query("SELECT Fornamn, Efternamn, Gatuadress, Postadress FROM betalning WHERE userid='$user'") as $row) ?>                        
                            <td>
             <?php echo $row['Fornamn'] ?> <?php echo $row['Efternamn'] ?><br>
             <?php echo $row['Gatuadress'] ?><br>
            <?php echo $row['Postadress'] ?>
                            </td>
<?php  ?>      
                        </tr>
                    </table>
                </td>
            </tr>
            <tr class="heading">
                <td>
                    Vara
                </td>
                
                <td>
                    Pris
                </td>
            </tr>
<?php foreach($pdo->query("SELECT Prodnamn, pris FROM betalning WHERE userid='$user'") as $row){ ?>
           
            <tr class="item">
                <td>
             <?php echo $row['Prodnamn'] ?>
                </td>
                
                <td>
              <?php echo $row['pris'] ?>
                </td>
            </tr>
            
<?php } ?>      
        </table>
    </div>

</div>
</div>
</div>
<!-- 
<div class="footer">
<p>Create by Boulogner Enterprise</p>
</div>
 -->
<?php

foreach($pdo->query("SELECT * FROM Kund WHERE userid='$user'") as $rod) 

$to = 	$rod['Email'];
$subject = "Faktura";


$message = "<html>";
$message .= "<head>";
$message .= "</head>";
$message .= "<body>";
$message .= "<table border= ''cellpadding='0' cellspacing='0'>";
$message .= "<tr>";
$message .= "<td colspan='2'>";
$message .= "<table>";
$message .= "<tr>";
$message .= "<td>";
$message .= "<h2 style='width:100%; color='#cc66cc'>+SMS</h2>";
$message .= "</td>";                   
$message .= "<td>Kvittonr: 017<br>Skapad: ".date('Y-m-d')."<br>Förfallodatum: " .date('Y-m-d', strtotime('+30 days'))."<br>Betalas till BG 0000-0000<br>Ange kvittonr vid betalning</td>";
$message .= "</tr>";
$message .= "</table>";
$message .= "</td>";
$message .= "</tr>";      
$message .= "<tr>";
$message .= "<td colspan='2'>";
$message .= "<table>";
$message .= "<tr>";
$message .= "<td>SMS AB<br>Tunnelgatan 3<br>52136, Falköping</td>";
foreach($pdo->query("SELECT Fornamn, Efternamn, Gatuadress, Postadress FROM betalning WHERE userid='$user'") as $row)                        
$message .= "<td>".$row['Fornamn']." ".$row['Efternamn']."<br>".$row['Gatuadress']."<br>".$row['Postadress']."</td>";
$message .= "</tr>";
$message .= "</table>";
$message .= "</td>";
$message .= "</tr>";
$message .= "<tr>";
$message .= "<td>Vara</td>";           
$message .= "<td>Pris</td>";
$message .= "</tr>";
foreach($pdo->query("SELECT Prodnamn, pris FROM betalning WHERE userid='$user'") as $row){   
$message .= "<tr>";
$message .= "<td>".$row['Prodnamn']."</td>";            
$message .= "<td>".$row['pris']."</td>";
$message .= "</tr>";      
}     
$message .= "</table>";
$message .= "</body>";
$message .= "</html>";







// Always set content-type when sending HTML email
$headers = "MIME-Version: 1.0" . "\r\n";
$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";


// More headers
$headers .= 'From: <forsberg.da@gmail.com>' . "\r\n";

mail($to,$subject,$message,$headers);
?>
</body>
</html>
