<?php
	session_start();
	require_once 'DBCONFIG.php';
	if($_SERVER['REQUEST_METHOD'] == 'POST')
	{
		if(isset($_POST['Adminnummer'], $_POST['Wachtwoord']))
		{
			try
			{
				$sQuery = "SELECT * FROM admindata WHERE Adminnummer = ?";
				$oStmt  = $db->prepare($sQuery);
				$oStmt->bindValue(1,$_POST['Adminnummer']);
				$oStmt->execute();
				$rij = $oStmt->fetch(PDO::FETCH_ASSOC);
				if(password_verify($_POST['Wachtwoord'],$rij['Wachtwoord']))
				{
					$_SESSION['klogin']= true;
					$_SESSION['Adminnummer']=$rij['Adminnummer'];
					$_SESSION['Voornaam']=$rij['Voornaam'];
					header('Refresh: 0; url=adminmenu.php');
				}	
				else
				{
					header('Refresh: 3; url=klogin.php') ;
					echo 'Deze combinatie van Adminnr en wachtwoord is niet juist!';
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
			header('Refresh: 3; url=klogin.php');
			echo 'Een vereist veld bestaat niet!';
		}
	}
	else
	{
		header('location:klogin.php');
		exit();
	}
	
?>
		
			
				
				
				
				
				
				
				
	