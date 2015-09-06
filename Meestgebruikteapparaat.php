<html>
<head>
	<title>Meestgebruikt</title>
	<link rel='stylesheet' type='text/css' href='BasicFit.css'>
	</head>
	<body>
	
	<?php
	require_once'DBCONFIG.php';
	
	try
	{
	$sQuery = "SELECT Apparaatnaam, COUNT(*) AS meestgebruikt FROM klantapp
	INNER JOIN apparaten
	ON klantapp.Apparaatnr=apparaten.Apparaatnr
	GROUP BY Apparaatnaam Order BY meestgebruikt DESC";
	$oStmt = $db->prepare($sQuery);
	$oStmt->execute();
	
		if($oStmt->rowcount()>0)
		{
			echo '<table border="2">';
			echo '<thead>';
			echo '<td>apparaatnaam</td>';
			echo '<td>meest gebruikt</td>';
			echo '</thead>';
			while($aRow =$oStmt->fetch(PDO::FETCH_ASSOC))
			{
				echo '<tr>';
				echo '<td>'.$aRow['Apparaatnaam'].'</td>';
				echo '<td>'.$aRow['meestgebruikt'].'</td>';
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