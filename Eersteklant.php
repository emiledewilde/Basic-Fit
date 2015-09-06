<html>
<head>

<meta charset= "utf-8" />

	<title>Eerste klant</title>
	<link rel='stylesheet' type='text/css' href='BasicFit.css'>
	</head>
	<body>
	
	<?php
	require_once'DBCONFIG.php';
	
	try
	{
	$sQuery = "SELECT * FROM `klanten` ORDER BY `klanten`.`Startdatum` ASC LIMIT 0,1 ";
	$oStmt = $db->prepare($sQuery);
	$oStmt->execute();
	
		if($oStmt->rowcount()>0)
		{
			echo '<table border="2">';
			echo '<thead>';
			echo '<td>klantnummer</td>';
			echo '<td>voornaam</td>';
			echo '<td>achternaam</td>';
			echo '<td>adres</td>';
			echo '<td>postcode</td>';
			echo '<td>woonplaats</td>';
			echo '<td>geslacht</td>';
			echo '<td>abonneenummer</td>';
			echo '<td>startdatum</td>';
			echo '</thead>';
			while($aRow =$oStmt->fetch(PDO::FETCH_ASSOC))
			{
				echo '<tr>';
				echo '<td>'.$aRow['Klantnr'].'</td>';
				echo '<td>'.$aRow['Voornaam'].'</td>';
				echo '<td>'.$aRow['Achternaam'].'</td>';
				echo '<td>'.$aRow['Adres'].'</td>';
				echo '<td>'.$aRow['Postcode'].'</td>';
				echo '<td>'.$aRow['Woonplaats'].'</td>';
				echo '<td>'.$aRow['Geslacht'].'</td>';
				echo '<td>'.$aRow['Abonneenr'].'</td>';
				echo '<td>'.$aRow['Startdatum'].'</td>';
				echo '</tr>';
			}
			echo '</table>';
		}
		else
		{
		echo 'Helaas, geen gegevens bekend';	
		}	
	}
	catch(PDOException $e)
	{
		$sMsg= '<p> 
		Regelnummer: '.$e->getLine().'<br/>
		Bestand: '.$e->getFile().'<br/>
		Foutmelding: '.$e->getMessage().'
		</p>';
		trigger_error($sMsg);
	}	
$db = null;
?>
</body>
</html>	