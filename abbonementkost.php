<html>
<head>
	<title>abonnementen</title>
	<link rel='stylesheet' type='text/css' href='fit.css'>
	</head>
	<body>
	
	<?php
	require_once'DBCONFIG.php';
	
	try
	{
	$sQuery = "SELECT * FROM abonnementen";
	$oStmt = $db->prepare($sQuery);
	$oStmt->execute();
	
		if($oStmt->rowcount()>0)
		{
			echo '<table border="2">';
			echo '<thead>';
			echo '<td>abonneenummer</td>';
			echo '<td>abonneenaam</td>';
			echo '<td>abonnee kosten</td>';
			echo '</thead>';
			while($aRow =$oStmt->fetch(PDO::FETCH_ASSOC))
			{
				echo '<tr>';
				echo '<td>'.$aRow['Abonneenr'].'</td>';
				echo '<td>'.$aRow['Abonneenaam'].'</td>';
				echo '<td>'.$aRow['Kostenpm'].'</td>';
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
<BR><BR><BR><BR>	<a href="Basicfit.html"><input type ="button" value = "Home""></a>
</body>
</html>	