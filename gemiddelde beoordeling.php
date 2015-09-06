<html>
<head>
	<title>gemiddelde beoordeling.php</title>
	<link rel='stylesheet' type='text/css' href='BasicFit.css'>
	</head>
	<body>
	
	<?php
	require_once'DBCONFIG.php';
	
	try
	{
	$sQuery = "SELECT AVG(Beoordeling) FROM klantapp";
	$oStmt = $db->prepare($sQuery);
	$oStmt->execute();
	
		if($oStmt->rowcount()>0)
		{
			echo '<table border="2">';
			echo '<thead>';
			echo '<td>Gemiddelde beoordeling</td>';
			echo '</thead>';
			while($aRow =$oStmt->fetch(PDO::FETCH_ASSOC))
			{
				echo '<tr>';
				echo '<td>'.$aRow['AVG(Beoordeling)'].'</td>';
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