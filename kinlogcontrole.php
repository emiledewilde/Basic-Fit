<?php

if(!isset($_SESSION['klogin']) || $_SESSION['klogin'] == false)
{
	header('location: klogin.php');
	exit();
}
?>