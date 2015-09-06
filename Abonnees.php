<html>
<head>
	<title>Abonnees</title>
	<link rel='stylesheet' type='text/css' href='BasicFit.css'>
	</head>
	<body>
	
	<?php
	require_once'DBCONFIG.php';
	
	try
	{
	$sQuery = "SELECT Abonneenaam, COUNT(*)'AantalAbonnees' FROM klanten 
	INNER JOIN abonnementen
	ON klanten.Abonneenr=abonnementen.Abonneenr
	GROUP BY Abonneenaam";
	$oStmt = $db->prepare($sQuery);
	$oStmt->execute();
	
		if($oStmt->rowcount()>0)
		{
			echo '<table border="2">';
			echo '<thead>';
			echo '<td>abonneenaam</td>';
			echo '<td>aantal abonnees</td>';
			echo '</thead>';
			while($aRow =$oStmt->fetch(PDO::FETCH_ASSOC))
			{
				echo '<tr>';
				echo '<td>'.$aRow['Abonneenaam'].'</td>';
				echo '<td>'.$aRow['AantalAbonnees'].'</td>';
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