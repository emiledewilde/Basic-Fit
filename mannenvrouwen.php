<html>
<head>
	<title>Mannen vrouwen</title>
	<link rel='stylesheet' type='text/css' href='BasicFit.css'>
	</head>
	<body>
	
	<?php
	require_once'DBCONFIG.php';
	
	try
	{
	$sQuery = "SELECT Geslacht,COUNT(*)'AantalVanDitGeslacht' FROM klanten GROUP BY Geslacht ORDER BY AantalVanDitGeslacht DESC";
	$oStmt = $db->prepare($sQuery);
	$oStmt->execute();
	
		if($oStmt->rowcount()>0)
		{
			echo '<table border="2">';
			echo '<thead>';
			echo '<td>Geslacht</td>';
			echo '<td>aantal van dit geslacht</td>';
			echo '</thead>';
			while($aRow =$oStmt->fetch(PDO::FETCH_ASSOC))
			{
				echo '<tr>';
				echo '<td>'.$aRow['Geslacht'].'</td>';
				echo '<td>'.$aRow['AantalVanDitGeslacht'].'</td>';
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