<?php

function connected_only()
{
	if(!isset($_SESSION['user'])) {
		Header("Location: se-connecter.php");
		exit();
	}
}

function already_connected()
{
	if(isset($_SESSION['user'])) {
		Header("Location: index.php");
		exit();
	}
}
