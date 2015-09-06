<?php
SESSION_START();
require_once'DBCONFIG.php';
if(isset($_POST["wachtwoordwijzigen"]))
{
	if($_POST['wachtwoord1']==$_POST['wachtwoord2'])
	{
		try
		{
			$ww = password_hash($_POST['wachtwoord1'], PASSWORD_DEFAULT);
			$sQuery= "UPDATE klantdata SET Wachtwoord = :Wachtwoord WHERE Klantnummer = :Klantnummer";
			$oStmt = $db->prepare($sQuery);
			$oStmt->bindValue(':Klantnummer', $_SESSION['Klantnummer'], PDO::PARAM_INT);
			$oStmt->bindValue(':Wachtwoord', $ww, PDO::PARAM_STR);
			$oStmt->execute();
			echo "<p>wijziging is succesvol</p>";
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
			header('Refresh: 3; url=BasicFit.html');
			echo 'Wachtwoord1 en Wachtwoord2 zijn niet gelijk!';
		}
		

}
?>
<a href="klantmenu.php"><input type ="button" value = "Terug naar menu"></a>		