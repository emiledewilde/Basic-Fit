<html>
<head>
		<title>zoeken klant</title>
		<link rel='stylesheet' type='text/css' href='mp3.css'>
</head>
<body>

<?php
require_once'DBCONFIG.php';
$zoek=$_POST['zoek'];

try
{
	$sQuery = "SELECT Achternaam,Voornaam,Klantnummer,Adres,Postcode,Woonplaats,Email
				FROM klantdata
				WHERE Achternaam=?";
			
			$oStmt=$db->prepare($sQuery);
			$oStmt->bindValue(1,$zoek,PDO::PARAM_INT);
			$oStmt->execute();
			
			if($oStmt->rowCount()>0)
			{
				$oStmt->execute();
							echo'<table border="2">';
							echo'<thead>';
							echo'<td>Achternaam</td>';
							echo'<td>Voornaam</td>';
							echo'<td>Klantnummer</td>';
							echo'<td>Adres</td>';
							echo'<td>Postcode</td>';
							echo'<td>Woonplaats</td>';
							echo'<td>Email</td>';
							echo'</thead>';
							
				while($aRow = $oStmt->fetch(PDO::FETCH_ASSOC))
				{
					echo'<tr>';
					echo'<td>'.$aRow['Klantnummer'].'</td>';
					echo'<td>'.$aRow['Voornaam'].'</td>';
					echo'<td>'.$aRow['Achternaam'].'</td>';
					echo'<td>'.$aRow['Adres'].'</td>';
					echo'<td>'.$aRow['Postcode'].'</td>';
					echo'<td>'.$aRow['Woonplaats'].'</td>';
					echo'<td>'.$aRow['Email'].'</td>';
					echo'</tr>';
				}
				echo'</table>';
			}
			else
			{
		echo'Helaas,geen gegevens bekend';
			}
}
catch(PDOEception $e)
{
	$sMsg = '<p>
		Regelnummer:'.$e->getLine().'<br />
		Bestand:'.$e->getFile().'</br />
		Foutmeldiing:'.$e->getMessage().'
	</p>';
	
	trigger_error($sMsg);
}
$db = null;
?>
<br>
<a href="zoekklant.php">Opnieuw zoeken</a>
</body>
</html>
							
							