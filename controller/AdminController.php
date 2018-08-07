<?php 

abstract class AdminController
{
	public static function adminLogin()
	{
		require("views/admin/adminLoginView.php");
	}

	public static function adminConnect()
	{
		$administrateurToCheck = new Administrateur(['pseudo'=>$_POST['pseudo'], 'password'=>$_POST['password']]);
		$administrateurManager = new AdministrateurManager();

		$administrateurOnFile = $administrateurManager->accessAdministrateur($administrateurToCheck);

		if(isset($administrateurOnFile))
		{
			$passwordToCheck = $administrateurToCheck->password();
			$passwordOnFile = $administrateurOnFile->password();
			if(password_verify($passwordToCheck, $passwordOnFile))
			{
				$_SESSION['profil'] = "admin";
				$_SESSION['pseudo'] = $administrateurOnFile->pseudo();
				header("Location: index.php?action=adminPanel");
			} else 
			{
				$_SESSION['adminConnect_message'] = "Pseudo ou mot de passe incorrect 2";
				header("Location: index.php?action=adminLogin");
			}
		} else {
			$_SESSION['adminConnect_message'] = "Pseudo ou mot de passe incorrect";
			header("Location: index.php?action=adminLogin");
		}
	}

	public static function adminPanel()
	{
		$nounouManager = new NounouManager();
		$parentManager = new ParentManager();
		$avisManager = new AvisManager();
		$nounous = $nounouManager->listAllNounous();
		$parents = $parentManager->listAllParents();
		$listAvis = $avisManager->listAllAvis();

		require("views/admin/adminPanelView.php");
	}








}