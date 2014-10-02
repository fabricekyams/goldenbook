<?php

if (!isset($this->auth)){
	if (!isset($_SESSION['AUTH'])){
		header('Location:'.WEBROOT.'private/user/login');
		var_dump($_SESSION);
		var_dump("Je n'ai rien a faire ici");
		die();
	}
}