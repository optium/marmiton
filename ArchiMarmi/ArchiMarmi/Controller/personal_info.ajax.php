<?php

include "../Include/header_php.php";

if(isset($_GET['up_user'])){
	$dal_perso = new DAL_Personal_admin();
	if (false === $dal_perso->update_personal_info($_POST, $_POST['id_user'])) {
		echo '{"rep":false,"msg":"Error while updating personal info"}';
		exit();
	}
	echo '{"rep":true,"msg":"personal info updated"}';
	exit();
}

if(isset($_GET['up_password'])){
	$dal_perso = new DAL_Personal_admin();
	if (false === $dal_perso->update_password($_POST['new'], $_POST['id_user'])) {
		echo '{"rep":false,"msg":"Error while updating password"}';
		exit();
	}
	echo '{"rep":true,"msg":"password updated"}';
	exit();
}

if(isset($_GET['up_parameters'])){
	$dal_perso = new DAL_Personal_admin();
	if (false === $dal_perso->update_parameters($_POST, $_POST['id_user'])) {
		echo '{"rep":false,"msg":"Error while updating parameters"}';
		exit();
	}
	echo '{"rep":true,"msg":"parameters updated"}';
	exit();
}

if(isset($_GET['request_access'])){
	$dal_perso = new DAL_Personal_admin();
	if (false === $dal_perso->request_access($_GET['id_user'], $_GET['part'])) {
		echo '{"rep":false,"msg":"Error while updating parameters"}';
		exit();
	}
	echo '{"rep":true,"msg":"parameters updated"}';
	header("Location: ./../user.php?user=".Login::getInstance()->getLogin());
}
?>