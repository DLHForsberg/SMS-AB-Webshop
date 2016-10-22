<?php
if (session_status() == PHP_SESSION_NONE) { session_start(); }
if (isset($_SESSION['userid'])) {
	session_destroy();
} else {
	echo 'Du är inte inloggad.';
}
header('Location: index.php');
?>