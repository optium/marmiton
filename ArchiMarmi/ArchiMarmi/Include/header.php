<?php
include "header_php.php";
if (!Login::getInstance()->isLogged()) {
	echo "You're not logged. Please, go to <a href='index.php'>the connexion page</a> and log you.";
	exit();
}
?>
<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html;charset=utf-8" />
<title>SVIE21&2 Helper ~ SODA</title>
<!-- Bootstrap -->
<link rel="stylesheet" href="css/css.css">
<link href="css/bootstrap.min.css" rel="stylesheet" media="screen">
<script src="js/jquery-1.9.1.js"></script>
<script src="js/bootstrap.min.js"></script>
<script type="text/javascript" charset="utf-8" src="js/jquery.dataTables.js"></script>
<script type="text/javascript" charset="utf-8" src="js/ZeroClipboard.js"></script>
<script type="text/javascript" charset="utf-8" src="js/TableTools.js"></script>
<script type="text/javascript" charset="utf-8" src="js/dataTables.bootstrap.js"></script>

</head>