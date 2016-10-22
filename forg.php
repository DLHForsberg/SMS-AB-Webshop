


<!DOCTYPE html>
<html>
<head>
<meta http-equiv="content-type" content="text/html; charset=utf-8"/>

<link rel="stylesheet" href="stilmall.css" type="text/css" media='all' />
<title>Glömt Lösenord</title>

<meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>
<?php include('nav.php'); ?>


<style> 
        .inputbox {display:block;}
				 input[type="text"]:valid, input[type="email"]:valid, /* det blir grön när man skriver rätt */
				 
			     input:focus{background-color: #CCCCFF;} /* det blir #CCCCFF färge  när man håller att skriva */
				
				
               input:focus{ 
			               border-style:dashed;  
						  
           			     }
						 
			
</style>

<div class="col-4 col-m-9">

<form>
<h1>Hitta ditt konto</h1>
	
	
	<ul>
	
   <li> First name:
    <input type="text" class="inputbox" name="firstname & lastname" required>
	<p> Användarnamn" </p></li>
    
	
	<li> Epost:
    <input type="email" class="inputbox" name="Epost" required>
    <p> Epost 
	"namn@something.com" </p></li>
	 
	 
     <li><input type="submit" value="Skicka" /></li>
	 
	 </ul>
	 </form>


</div>


</div>

<div class="footer">
<p>Create by Boulogner Enterprise</p>
</div>

</body>
</html>

