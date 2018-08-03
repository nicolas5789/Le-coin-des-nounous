<?php
session_start();

//appel des controleurs
require("controller/FrontController.php");
require("controller/AdminController.php");
require("controller/FormController.php");

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

		case "newNounouForm":
			FrontController::newNounouForm();
			break;

		case "addNounou":
			FormController::addNounou();
			break;

		case "newParentForm":
			FrontController::newParentForm();
			break;

		case "addParent":
			FormController::addParent();
			break;

		case "login":
			FrontController::login();
			break;

		case "connect":
			FrontController::connect();
			break;

		case "addAvis":
		if(isset($_SESSION['profil']) && $_SESSION['profil'] == 'parent') {
			FrontController::addAvis($_GET['id']);
		} else {
			FrontController::home();
		}
			break;
		
		case "updateAvis":
		if(isset($_SESSION['profil']) && $_SESSION['profil'] == 'parent') {
			FrontController::updateAvis($_GET['id']);
		} else {
			FrontController::home();
		}
			break;

		case "deleteAvis":
		if(isset($_SESSION['profil']) && $_SESSION['profil'] == 'parent') {
			FrontController::deleteAvis($_GET['idAvis'], $_GET['idNounou']);
		} else {
			FrontController::home();
		}
			break;

		case "logout":
			session_destroy();
			header("Location: index.php");
			break;

		default:
			FrontController::home();
			break;
	}
} else {
	FrontController::home();
}