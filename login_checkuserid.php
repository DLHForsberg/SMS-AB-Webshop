<?php
	if (session_status() == PHP_SESSION_NONE) { session_start(); }
	$errmsg_arr = array();


include 'connect.php';

	$userid = $_POST['userid'];
	$pas= $_POST['pas'];

	if($userid == '') {
		$errmsg_arr[] = 'Du måste ange ditt användarnamn';

	}
	else if($pas == '') {
		$errmsg_arr[] = 'Du måste ange ditt lösenord';

}
$result = $pdo->prepare("SELECT * FROM users WHERE userid= :userid");
$result->bindParam(':userid', $userid);
$result->execute();
$result2 = $result->fetch(PDO::FETCH_ASSOC);


if($result->rowCount() > 0) { //körs bara om det finns ett användarnamn
	if (password_verify($_POST['pas'], $result2['pas'])) {
		$_SESSION['userid'] = $_POST['userid'];
		header("location: minasidor.php");
	}else {
		$errmsg_arr[] = 'Användarnamn eller lösenord är fel';
}}
else {
	$errmsg_arr[] = 'Användarnamn eller lösenord är fel';


}
if($errmsg_arr) {
	$_SESSION['ERRMSG_ARR'] = $errmsg_arr;
	session_write_close();
	header("location: loggain.php");
	exit();
}

?>
