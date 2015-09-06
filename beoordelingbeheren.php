<?php
    session_start();
	include 'kinlogcontrole.php';
?>
<html>
<head>
<title>Beoordeling beheren</title>
<link rel='stylesheet' type='text/css' href='fit.css'>
</head>
<body>
<header>
<h1> beoordeling beheren</h1>
</header>
<?php
require_once 'DBCONFIG.php';
include 'functies.php';

echo"<BR><BR>";

if(isset($_POST["Wijzig"]))
{
	try
	{
		$sQuery = "UPDATE basicbeoordeling SET Naam = :Naam, Apparaatnaam = :Apparaatnaam, Beoordeling = :Beoordeling
		WHERE IDnr = :IDnr";
		$oStmt = $db->prepare($sQuery);
		$oStmt->bindParam(':IDnr', $_POST['IDnr'], PDO::PARAM_STR);
		$oStmt->bindParam(':Naam', $_POST['Naam'], PDO::PARAM_STR);
		$oStmt->bindParam(':Apparaatnaam', $_POST['Apparaatnaam'], PDO::PARAM_STR);
		$oStmt->bindParam(':Beoordeling', $_POST['Beoordeling'], PDO::PARAM_STR);
		$oStmt->execute();
		redirect('beoordelingbeheren.php');
	}
	catch(PDOException $e)
	{
		$sMsg = '<p>
			Regelnummer: '.$e->getLine().'<br />
			Bestand: '.$e->getFile().'<br />
			Foutmelding: '.$e->getMessage().'
		</p>';
	trigger_error($sMsg);
	}			
}
if(isset($_POST["Wis"]))
{
	try
	{
		$sQuery = "DELETE FROM basicbeoordeling WHERE IDnr = :IDnr";
		$oStmt = $db->prepare($sQuery);
		$oStmt->bindParam(':IDnr', $_POST['IDnr'], PDO::PARAM_STR);
		$oStmt->execute();
		redirect('beoordelingbeheren.php');
	}
	catch (PDOException $e)
	{
		$sMsg = '<p>
			Regelnummer: '.$e->getLine().'<br />
			Bestand: '.$e->getFile().'<br />
			Foutmelding: '.$e->getMessage().'
		  </p>';
		trigger_error($sMsg);
		}
	}
	if(isset($_POST["Nieuw"]))
	{
		try
		{
			$sQuery = "INSERT INTO basicbeoordeling (IDnr, Naam, Apparaatnaam, Beoordeling)
			VALUES (:IDnr, :Naam, :Apparaatnaam, :Beoordeling)";
			$oStmt = $db->prepare($sQuery);
			$oStmt->bindParam(':IDnr', $_POST['IDnr'], PDO::PARAM_STR);
			$oStmt->bindParam(':Naam', $_POST['Naam'], PDO::PARAM_STR);
			$oStmt->bindParam(':Apparaatnaam', $_POST['Apparaatnaam'], PDO::PARAM_STR);
			$oStmt->bindParam(':Beoordeling', $_POST['Beoordeling'], PDO::PARAM_STR);
			$oStmt->execute();
			redirect('beoordelingbeheren.php');
		}
		catch (PDOException $e)
		{
			$sMsg = '<p>
				Regelnummer: '.$e->getLine().'<br />
				Bestand: '.$e->getFile().'<br />
				Foutmelding: '.$e->getMessage().'
		  </p>';
		trigger_error($sMsg);
		}
	}

	try
	{
	$sQuery= "SELECT * FROM basicbeoordeling";

		$oStmt = $db->prepare($sQuery);
		$oStmt->execute();
		
		echo "<table border =2>";
		echo "<TR><TD>IDnr</TD>
			<TD>Naam</TD>
			<TD>Apparaatnaam</TD>
			<TD>Beoordeling</TD>
			<TD>Wijzig</TD>
			<TD>Wis</TD></TR>";
		while($rij = $oStmt->fetch(PDO::FETCH_ASSOC))
		{
		?>
			<form method="post" action="beoordelingbeheren.php">
			<tr>
			<td><?php echo($rij ['IDnr']); ?><input type="hidden" name="IDnr"
			value ="<?php echo($rij['IDnr']); ?>"></td>
			<td><input type="text" name="Naam" value ="<?php echo($rij['Naam']); ?>"
			></td>
			<td><input type="text" name="Apparaatnaam" value ="<?php echo($rij['Apparaatnaam']); ?>"
			></td>
			<td><input type="text" name="Beoordeling" value ="<?php echo($rij['Beoordeling']); ?>"></td>
			<td><input type="submit" name="Wijzig" value="Wijzig"></td>
			<td><input type="submit" name="Wis" value="Wis" onClick="return confirm('rijnummer <?php echo($rij['IDnr']); ?> word verwijderd. weet u het zeker ?')"></td>
			</tr>
			</form>
		<?php
		}
		?>
			<form method="post" action="beoordelingbeheren.php">
			<tr>
			<td><input type="text" name="IDnr" value ="" required></td>
			<td><input type="text" name="Naam" value ="" required></td>
			<td><input type="text" name="Apparaatnaam" value ="" required></td>
			<td><input type="text" name="Beoordeling" value ="" required></td>
			<td colspan = "2"><input type="submit" name="Nieuw" value="Nieuw"></td>
			
			</tr>
			</form>
		</table>
		<BR>
		<br/>
<?php
}
catch(PDOException $e)
{
	$sMsg = '<p>
			Regelnummer: '.$e->getLine().'<br />
			Bestand: '.$e->getFile(). '<br />
			Foutmelding: '.$e->getMessage().'
		</p>';
		
	trigger_error($sMsg);	
}	
$db=NULL;
?>

<BR><BR> <a href="adminmenu.php"><input type ="button" value = "Terug naar menu"></a>