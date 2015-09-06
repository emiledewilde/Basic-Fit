<?php
    session_start();
	include 'inlogcontroleklant.php';
?>
<!DOCTYPE html>
<html>
<head>
   <title>klantmenu</title>
   <link rel="stylesheet" href="Basicfit.css">
</head>
<body>
<header>
     <h1>klantmenu</h1>
</header>
  <?php
    echo "<h2>Welkom ". $_SESSION['Voornaam']. "</h2>";
	echo "<h5>Klantnummer: ".$_SESSION['Klantnummer']. "</h5>";
  ?>
  

  <br><br><br>
 <h1>Mijn gegevens</h1>
	  <nav>
	<ul>
		<li><a href="beoordelinggeven.php"><input type="button" value = "Een beoordeling over een apparaat geven"></a></li>
		<li><a href="mijnabonnement.php"><input type="button" value = "Mijn huildig abbonement"></a></li>
	</ul>
</nav>
<br><br><br>
	<div id="main">
	 <div class="textArea">
	  <h1>Wachtwoord wijzigen/Uitloggen</h1>
	  </div>
	  </div>
	  <nav>
	<ul>
		<li><a href="wijzig.php"><input type="button" value = "Wachtwoord wijzigen"></a></li>
		<li><a href="logout.php"><input type="button" value = "Uitloggen"></a></li>
	</ul>

 <footer>
   <h3>Gemaakt door Emile</h3>
</footer>
</body>
</html>