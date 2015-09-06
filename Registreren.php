<?php
require_once'DBCONFIG.php';
if(isset($_POST["Registreer"]))
{
	if($_POST['wachtwoord1']==$_POST['wachtwoord2'])
	{
		try
		{
			$ww=password_hash($_POST['wachtwoord1'], PASSWORD_DEFAULT);
			$sQuery= "INSERT INTO klantdata (Voornaam, Achternaam, Adres, Postcode, Woonplaats, Email, wachtwoord)
			VALUES (:Voornaam, :Achternaam, :Adres, :Postcode, :Woonplaats, :Email, :wachtwoord)";
			$oStmt = $db->prepare($sQuery);
			$oStmt->bindValue(':Voornaam', $_POST['Voornaam'], PDO::PARAM_STR);
			$oStmt->bindValue(':Achternaam', $_POST['Achternaam'], PDO::PARAM_STR);
			$oStmt->bindValue(':Adres', $_POST['Adres'], PDO::PARAM_STR);
			$oStmt->bindValue(':Postcode', $_POST['Postcode'], PDO::PARAM_STR);
			$oStmt->bindValue(':Woonplaats', $_POST['Woonplaats'], PDO::PARAM_STR);
			$oStmt->bindValue(':Email', $_POST['Email'], PDO::PARAM_STR);
			$oStmt->bindValue(':wachtwoord', $ww, PDO::PARAM_STR);
			$oStmt->execute();
			echo "<p>Welkom ".$_POST['Voornaam']."</p>";
			echo "<p>Registratie is succesvol</p>";
			echo "<p>Uw klantnummer is ".$db->lastInsertId()."</p>";
		}
			catch(PDOException $e)
			{
					$sMsg='<p>
					Regelnummer:'.$e->getLine().'<br/>
					Bestand:'.$e->getFile().'<br/>
					Foutmelding:'.$e->getMessage().'
					</p>';
					trigger_error($sMsg);
			}
		}
		else
		{
			header('Refresh: 3; url=registreer.php');
			echo 'Wachtwoord1 en Wachtwoord2 zijn niet gelijk!';
		}
		

}
?>
<a href="BasicFit.html"><input type ="button" value = "Home"></a>		