<?php
require("model/Autoloader.php");
Autoloader::register();

abstract class FrontController
{
	public static function home()
	{
		require("views/front/frontHomeView.php");
	}

	public static function listNounous($idDept) //liste nounous par dept
	{
		$targetNounou = new Nounou(['departement'=>$idDept]);
		$nounouManager = new NounouManager();

		$nounous = $nounouManager->listNounous($targetNounou);

		require("views/front/frontListView.php");
	}

	public static function showNounou($idNounou)
	{
		$targetNounou = new Nounou(['id'=>$idNounou]);
		$nounouManager = new NounouManager();
		$avisManager = new avisManager();

		$nounou = $nounouManager->getNounou($targetNounou);
		$listingAvis = $avisManager->listAvis($targetNounou);

		$noteMoyenne = $avisManager->average($targetNounou);

		require("views/front/frontNounouView.php");
	}

	public static function newNounouForm()
	{
		require("views/front/frontNewNounouFormView.php");
	}

	public static function login()
	{
		require("views/front/frontLoginView.php");
	}

	public static function connectNounou()
	{
		$nounouToCheck = new Nounou(['pseudo'=>$_POST['pseudo'],'password'=>$_POST['password']]);
		$nounouManager = new NounouManager();

		$passwordOnFile = $nounouManager->accessNounou($nounouToCheck);
		$passwordToCheck = $_POST['password'];

		if(isset($passwordOnFile)) 
		{
			if(password_verify($passwordToCheck, $passwordOnFile))
			{
				echo "cool ca passe";
			} else 
			{
				echo "2 Pass ou id faux";
			}
		} else 
		{
			//$_SESSION['connect_message'] = "Pseudo ou mot de passe incorrect";
			echo "Pseudo ou mdp incorrect 3";
		}

	}

	
}