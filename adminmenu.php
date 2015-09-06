<?php
    session_start();
	include 'kinlogcontrole.php';
?>
<!DOCTYPE html>
<html>
<head>
   <title>adminmenu</title>
   <link rel="stylesheet" href="BasicFit.css">
</head>
<body>
<header>
     <h1>adminmenu</h1>
</header>
  <?php
    echo "<h2>Welkom ". $_SESSION['Voornaam']. "</h2>";
	echo "<h5>Adminnummer: ".$_SESSION['Adminnummer']. "</h5>";
  ?>
  

  <br><br><br>
 <h1>Beheren</h1>
	  <nav>
	<ul>
		<li><a href="muteerklant2.php"><input type="button" value = "Klantdata beheren"></a></li>
		<li><a href="beoordelingbeheren.php"><input type="button" value = "Beoordelingen beheren"></a></li>
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
		<li><a href="kwijzig.php"><input type="button" value = "Wachtwoord wijzigen"></a></li>
		<li><a href="logout.php"><input type="button" value = "Uitloggen"></a></li>
	</ul>

 <footer>
   <h3>Gemaakt door Emile</h3>
</footer>
</body>
</html>