<?php

if(!isset($_SESSION['login']) || $_SESSION['login'] == false)
{
	header('location: login.php');
	exit();
}
?>