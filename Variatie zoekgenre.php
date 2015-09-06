.... (overige code)

$zoek=$_POST['zoek'];

$sQuery = "SELECT albumcode,titel,artiest,genre,prijs"
			FROM album
			WHERE genre LIKE ?";
			
$oStmt = $db->prepare($sQuery);
$oStmt->bindValue(1, "%$zoek%",PDO::PARAM_STR);
$oStmt->execute();

.... (overige code)