<?php
    session_start();
	include 'kinlogcontrole.php';
?>
<html>
<head>
<title>Wachtwoord wijzigen</title>
<link rel='stylesheet' type='text/css' href='fit.css'>
</head>
<body>
<header>
<h1>Wachtwoord wijzigen</h1>
</header>
<BR><BR>
		<form method="post" action="wwwijzigen.php">
		<table border =2>
				<tr><td>Wachtwoord</td><td><input type="password" name="wachtwoord1" value="" required></td></tr>
				<tr><td>Herhaal wachtwoord</td><td><input type="password" name="wachtwoord2" value="" required></td></tr>
				<tr><td colspan ="2"><input type="submit" name="wachtwoordwijzigen" value="Wijzig"></td></tr>
				</table>
				</form>
<BR><BR><BR><BR>		<a href="klantmenu.php"><input type="button" value = "Terug naar menu"></a>
</body>
</html>		