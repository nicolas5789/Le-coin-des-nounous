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

		//front 

		case "home":
			FrontController::home();
			break;

		case "listNounous":
		if(isset($_idDept) && $_idDept > 0) {
			FrontController::listNounous($_idDept);
		} else {
			FrontController::home();
		} break;

		case "howItWorks":
			FrontController::howItWorks();
			break;

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
		if(isset($_SESSION['profil']) && isset($_GET['id']) && $_SESSION['profil'] == 'parent') {
			FrontController::addAvis($_GET['id']);
		} else {
			FrontController::home();
		}
			break;

		case "mailToNounou":
		if(isset($_SESSION['profil']) && isset($_idNounou) && $_SESSION['profil'] == 'parent') {
			FrontController::mailToNounou($_idNounou);
		} else {
			FrontController::home();
		}
			break;
		
		case "updateAvis":
		if(isset($_SESSION['profil']) && isset($_GET['id']) && $_SESSION['profil'] == 'parent') {
			FrontController::updateAvis($_GET['id']);
		} else {
			FrontController::home();
		}
			break;

		case "reportAvis":
		if(isset($_GET['idAvis']) && isset($_idNounou) && $_GET['idAvis'] > 0 && $_idNounou > 0) {
			FrontController::reportAvis($_GET['idAvis'], $_idNounou);
		} else {
			FrontController::home();
		}
			break;


		case "deleteAvis":
		if(isset($_SESSION['profil']) && isset($_GET['idAvis']) && isset($_GET['idNounou']) && $_SESSION['profil'] == 'parent') {
			FrontController::deleteAvis($_GET['idAvis'], $_GET['idNounou']);
		} else {
			FrontController::home();
		}
			break;

		case "nounouProfil":
		if(isset($_SESSION['pseudo']) && $_SESSION['profil'] == 'nounou') {
			FrontController::nounouProfil($_SESSION['pseudo']);
		} else {
			FrontController::home();
		}
			break;

		case "editNounou":
		if(isset($_SESSION['pseudo']) && $_SESSION['profil'] == 'nounou') {
			FormController::editNounou($_SESSION['pseudo']);
		} else {
			FrontController::home();
		}
			break;

		case "reportNounou":
		if(isset($_idNounou) && $_idNounou > 0) {
			FrontController::reportNounou($_idNounou);
		} else {
			FrontController::home();
		}
			break;

		case "deleteNounou":
		if(isset($_SESSION['pseudo']) && $_SESSION['profil'] == 'nounou') {
			FrontController::deleteNounou($_idNounou);
			session_destroy();
		} else {
			FrontController::home();
		}
			break;

		case "parentProfil" :
		if(isset($_SESSION['pseudo']) && $_SESSION['profil'] == 'parent') {
			FrontController::parentProfil($_SESSION['pseudo']);
		} else {
			FrontController::home();
		}
			break;

		case "editParent":
		if(isset($_SESSION['pseudo']) && $_SESSION['profil'] == 'parent') {
			FormController::editParent($_SESSION['pseudo']);
		} else {
			FrontController::home();
		}
			break;

		case "deleteParent":
		if(isset($_SESSION['pseudo']) && $_SESSION['profil'] == 'parent') {
			FrontController::deleteParent($_SESSION['pseudo']);
			session_destroy();
		} else {
			FrontController::home();
		}
			break;

		case "contactUs" :
			FrontController::contactUs();
			break;

		case "mailToUs":
			FrontController::mailToUs();
			break;

		//admin

		case "adminLogin":
			AdminController::adminLogin();
			break;

		case "adminConnect":
			AdminController::adminConnect();
			break;

		case "adminPanel":
			if(isset($_SESSION['profil']) && $_SESSION['profil'] == "admin") {
				AdminController::adminPanel();	
			} else {
				FrontController::home();
			}
			break;

		case "adminEditNounou":
			if(isset($_SESSION['profil']) && isset($_GET['pseudo']) && $_SESSION['profil'] == "admin") {
				AdminController::adminEditNounou($_GET['pseudo']);
			} else {
				FrontController::home();
			}
			break;

		case "adminUpdateNounou":
			if(isset($_SESSION['profil']) && isset($_GET['pseudo']) && $_SESSION['profil'] == "admin") {
				FormController::editNounou($_GET['pseudo']);	
			} else {
				FrontController::home();
			}
			break;

		case "adminDeleteNounou":
			if(isset($_SESSION['profil']) && isset($_idNounou) && $_SESSION['profil'] == "admin") {
				FrontController::deleteNounou($_idNounou);	
			} else {
				FrontController::home();
			}
			break;


		case "adminEditParent":
			if(isset($_SESSION['profil']) && isset($_GET['pseudo']) && $_SESSION['profil'] == "admin") {
				AdminController::adminEditParent($_GET['pseudo']);	
			} else {
				FrontController::home();
			}
			break;

		case "adminUpdateParent":
			if(isset($_SESSION['profil']) && isset($_GET['pseudo']) && $_SESSION['profil'] == "admin") {
				FormController::editParent($_GET['pseudo']);	
			} else {
				FrontController::home();
			}
			break;

		case "adminDeleteParent":
			if(isset($_SESSION['profil']) && isset($_GET['pseudo']) && $_SESSION['profil'] == "admin") {
				FrontController::deleteParent($_GET['pseudo']);	
			} else {
				FrontController::home();
			}
			break;

		case "adminShowAvis":
			if(isset($_SESSION['profil']) && isset($_idNounou) && $_SESSION['profil'] == "admin") {
				AdminController::adminShowAvis($_idNounou);
			} else {
				FrontController::home();
			}
			break;

		case "adminEditAvis":
			if(isset($_SESSION['profil']) && isset($_GET['idAvis']) && isset($_idNounou) && $_SESSION['profil'] == "admin") {
				AdminController::adminEditAvis($_GET['idAvis'], $_idNounou);
			} else {
				FrontController::home();
			}
			break;

		case "adminDeleteAvis":
			if(isset($_SESSION['profil']) && isset($_GET['idAvis']) && isset($_idNounou) && $_SESSION['profil'] == "admin") {
				AdminController::adminDeleteAvis($_GET['idAvis'], $_idNounou);
			} else {
				FrontController::home();
			}
			break;

		case "adminPanelDeleteAvis":
			if(isset($_SESSION['profil']) && isset($_GET['idAvis']) && $_SESSION['profil'] == "admin") {
				AdminController::adminPanelDeleteAvis($_GET['idAvis']);
			} else {
				FrontController::home();
			}
			break;

		//mutual

		case "logout":
			session_destroy();
			header("Location: index.php");
			break;

		case "updatePasswordParent": 
			if(isset($_SESSION['profil']) && isset($_GET['pseudo'])) {
				FormController::updatePasswordParent($_GET['pseudo']);	
			}
			break;

		case "updatePasswordNounou": 
			if(isset($_SESSION['profil']) && isset($_GET['pseudo'])) {
				FormController::updatePasswordNounou($_GET['pseudo']);
			}
			break;

		default:
			FrontController::home();
			break;
	}
} else {
	FrontController::home();
}