<?php
    session_start();
	include 'kinlogcontrole.php';
?>
<html>
<head>
<title>Muteer klantgegevens</title>
<link rel='stylesheet' type='text/css' href='fit.css'>
</head>
<body>
<header>
<h1>klant muteren</h1>
</header>

<?php
require_once 'DBCONFIG.php';
include 'functies.php';

echo"<BR><BR>";

if(isset($_POST["Wijzig"]))
{
	try
	{
		$sQuery = "UPDATE klantdata SET Voornaam = :Voornaam, Achternaam = :Achternaam, Adres = :Adres, Postcode =
		:Postcode, Woonplaats = :Woonplaats, Email = :Email
		WHERE Klantnummer = :Klantnummer";
		$oStmt = $db->prepare($sQuery);
		$oStmt->bindParam(':Klantnummer', $_POST['Klantnummer'], PDO::PARAM_STR);
		$oStmt->bindParam(':Voornaam', $_POST['Voornaam'], PDO::PARAM_STR);
		$oStmt->bindParam(':Achternaam', $_POST['Achternaam'], PDO::PARAM_STR);
		$oStmt->bindParam(':Adres', $_POST['Adres'], PDO::PARAM_STR);
		$oStmt->bindParam(':Postcode', $_POST['Postcode'], PDO::PARAM_STR);
		$oStmt->bindParam(':Woonplaats', $_POST['Woonplaats'], PDO::PARAM_STR);
		$oStmt->bindParam(':Email', $_POST['Email'], PDO::PARAM_STR);
		$oStmt->execute();
		redirect('muteerklant2.php');
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
		$sQuery = "DELETE FROM klantdata WHERE Klantnummer = :Klantnummer";
		$oStmt = $db->prepare($sQuery);
		$oStmt->bindParam(':Klantnummer', $_POST['Klantnummer'], PDO::PARAM_STR);
		$oStmt->execute();
		redirect('muteerklant2.php');
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
			$sQuery = "INSERT INTO klantdata (Klantnummer, Voornaam, Achternaam, Adres, Postcode, Woonplaats,
			Email)
			VALUES (:Klantnummer, :Voornaam, :Achternaam, :Adres, :Postcode, :Woonplaats, :Email)";
			$oStmt = $db->prepare($sQuery);
			$oStmt->bindParam(':Klantnummer', $_POST['Klantnummer'], PDO::PARAM_STR);
			$oStmt->bindParam(':Voornaam', $_POST['Voornaam'], PDO::PARAM_STR);
			$oStmt->bindParam(':Achternaam', $_POST['Achternaam'], PDO::PARAM_STR);
			$oStmt->bindParam(':Adres', $_POST['Adres'], PDO::PARAM_STR);
			$oStmt->bindParam(':Postcode', $_POST['Postcode'], PDO::PARAM_STR);
			$oStmt->bindParam(':Woonplaats', $_POST['Woonplaats'], PDO::PARAM_STR);
			$oStmt->bindParam(':Email', $_POST['Email'], PDO::PARAM_STR);
			$oStmt->execute();
			redirect('muteerklant2.php');
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
	$sQuery= "SELECT * FROM klantdata";

		$oStmt = $db->prepare($sQuery);
		$oStmt->execute();
		
		echo "<table border =2>";
		echo "<TR><TD>Klantnummer</TD>
			<TD>Voornaam</TD>
			<TD>Achternaam</TD>
			<TD>Adres</TD>
			<TD>Postcode</TD>
			<TD>Woonplaats</TD>
			<TD>E-mail</TD>
			<TD>Wijzig</TD>
			<TD>Wis</TD></TR>";
		while($rij = $oStmt->fetch(PDO::FETCH_ASSOC))
		{
		?>
			<form method="post" action="muteerklant2.php">
			<tr>
			<td><?php echo($rij ['Klantnummer']); ?><input type="hidden" name="Klantnummer"
			value ="<?php echo($rij['Klantnummer']); ?>"></td>
			<td><input type="text" name="Voornaam" value ="<?php echo($rij['Voornaam']); ?>"
			></td>
			<td><input type="text" name="Achternaam" value ="<?php echo($rij['Achternaam']); ?>"
			></td>
			<td><input type="text" name="Adres" value ="<?php echo($rij['Adres']); ?>"
			></td>
			<td><input type="text" name="Postcode" value ="<?php echo($rij['Postcode']); ?>"
			></td>
			<td><input type="text" name="Woonplaats" value ="<?php echo($rij['Woonplaats']); ?>"
			></td>
			<td><input type="Email" name="Email" value ="<?php echo($rij['Email']); ?>"
			></td>
			<td><input type="submit" name="Wijzig" value="Wijzig"></td>
			<td><input type="submit" name="Wis" value="Wis" onClick="return confirm('Rijnummer<?php echo($rij['Klantnummer']); ?> word verwijderd. weet u het zeker ?')"></td>
			
			</tr>
			</form>
		<?php
		}
		?>
			<form method="post" action="muteerklant2.php">
			<tr>
			<td><input type="text" name="Klantnummer" value ="" required></td>
			<td><input type="text" name="Voornaam" value ="" required></td>
			<td><input type="text" name="Achternaam" value ="" required></td>
			<td><input type="text" name="Adres" value ="" required></td>
			<td><input type="text" name="Postcode" value ="" required></td>
			<td><input type="text" name="Woonplaats" value ="" required></td>
			<td><input type="email" name="Email" value ="" required></td>
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

<BR><BR>	<a href="adminmenu.php"><input type ="button" value = "Terug naar menu"></a>