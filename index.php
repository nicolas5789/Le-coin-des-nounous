<?php
session_start();

//appel des controleurs
require("controller/FrontController.php");
require("controller/AdminController.php");

if(isset($_GET["action"])) {
	$_action = $_GET["action"];
}
if(isset($_GET["idDept"])) {
	$_idDept = $_GET["idDept"];
}
if(isset($_GET["idNounou"])) {
	$_idNounou = $_GET["idNounou"];
}

if(isset($_action)) {
	switch ($_action) {
		case "home":
			FrontController::home();
			break;

		case "listNounous":
		if(isset($_idDept) && $_idDept > 0) {
			FrontController::listNounous($_idDept);
		} else {
			FrontController::home();
		} break;

		case "showNounou":
		if(isset($_idNounou) && $_idNounou > 0){
			FrontController::showNounou($_idNounou);
		} else {
			FrontController::home();
		} break;

		case "newForm":
			FrontController::newForm();
			break;


		default:
			FrontController::home();
			break;
	}
} else {
	FrontController::home();
}