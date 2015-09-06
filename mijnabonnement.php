<html>
<head>
	<title>MijnAbonnement</title>
	<link rel='stylesheet' type='text/css' href='fit.css'>
	</head>
	<body>
	<header>
	<h1>Mijn abbonement</h1>
	</header>
	<BR><BR>

	<?php
	SESSION_START();
	require_once'DBCONFIG.php';
	
	try
	{
	$sQuery = "SELECT * FROM abbonementklant WHERE Klantnummer=:Klantnummer";
	$oStmt = $db->prepare($sQuery);
	$oStmt->bindValue(':Klantnummer', $_SESSION['Klantnummer'], PDO::PARAM_INT);
	$oStmt->execute();
	
		if($oStmt->rowcount()>0)
		{
			echo '<table border="2">';
			echo '<thead>';
			echo '<td>Klantnummer</td>';
			echo '<td>Achternaam</td>';
			echo '<td>Abonnement</td>';
			echo '</thead>';
			while($aRow =$oStmt->fetch(PDO::FETCH_ASSOC))
			{
				echo '<tr>';
				echo '<td>'.$aRow['Klantnummer'].'</td>';
				echo '<td>'.$aRow['Achternaam'].'</td>';
				echo '<td>'.$aRow['Abonnement'].'</td>';
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
<BR><BR><BR><BR>	<a href="klantmenu.php"><input type ="button" value = "Terug naar menu""></a>
</body>
</html>	