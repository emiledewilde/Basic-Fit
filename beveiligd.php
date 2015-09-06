<?php
	session_start();
	require_once 'DBCONFIG.php';
	if($_SERVER['REQUEST_METHOD'] == 'POST')
	{
		if(isset($_POST['Klantnummer'], $_POST['Wachtwoord']))
		{
			try
			{
				$sQuery = "SELECT * FROM klantdata WHERE Klantnummer = ?";
				$oStmt  = $db->prepare($sQuery);
				$oStmt->bindValue(1,$_POST['Klantnummer']);
				$oStmt->execute();
				$rij = $oStmt->fetch(PDO::FETCH_ASSOC);
				if(password_verify($_POST['Wachtwoord'],$rij['Wachtwoord']))
				{
					$_SESSION['login']= true;
					$_SESSION['Klantnummer']=$rij['Klantnummer'];
					$_SESSION['Voornaam']=$rij['Voornaam'];
					header('Refresh: 0; url=klantmenu.php');
				}	
				else
				{
					header('Refresh: 3; url=login.php') ;
					echo 'Deze combinatie van klantnr en wachtwoord is niet juist!';
				}
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
			$db = null;
		}
		else
		{
			header('Refresh: 3; url=login.php');
			echo 'Een vereist veld bestaat niet!';
		}
	}
	else
	{
		header('location:login.php');
		exit();
	}
	
?>
		
			
				
				
				
				
				
				
				
	