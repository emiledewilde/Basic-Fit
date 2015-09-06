<html>
<head>
	<title>apparaatnaam</title>
	<link rel='stylesheet' type='text/css' href='fit.css'>
	</head>
	<body>
	<header>
	<h1>Fitness apparaten</h1>
	</header>
	<BR><BR>

	<?php
	require_once'DBCONFIG.php';
	
	try
	{
	$sQuery = "SELECT Apparaatnaam FROM apparaten";
	$oStmt = $db->prepare($sQuery);
	$oStmt->execute();
	
		if($oStmt->rowcount()>0)
		{
			echo '<table border="2">';
			echo '<thead>';
			echo '<td>apparaatnaam</td>';
			echo '</thead>';
			while($aRow =$oStmt->fetch(PDO::FETCH_ASSOC))
			{
				echo '<tr>';
				echo '<td>'.$aRow['Apparaatnaam'].'</td>';
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