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

	public static function newParentForm()
	{
		require("views/front/frontNewParentFormView.php");
	}

	public static function login()
	{
		require("views/front/frontLoginView.php");
	}

	public static function connect()
	{
		$nounouToCheck = new Nounou(['pseudo'=>$_POST['pseudo'],'password'=>$_POST['password']]);
		$parentToCheck = new PereMere(['pseudo'=>$_POST['pseudo'],'password'=>$_POST['password']]);
		$nounouManager = new NounouManager();
		$parentManager = new ParentManager();

		$nounouOnFile = $nounouManager->accessNounou($nounouToCheck);
		$parentOnFile = $parentManager->accessParent($parentToCheck);

		if(isset($nounouOnFile))
		{
			$passwordNounouToCheck = $nounouToCheck->password();
			$passwordNounouOnFile = $nounouOnFile->password();	

			if(isset($passwordNounouOnFile) && isset($passwordNounouToCheck)) 
			{
				if(password_verify($passwordNounouToCheck, $passwordNounouOnFile))
				{
					$_SESSION['profil'] = "nounou";
					$_SESSION['pseudo'] = $nounouOnFile->pseudo();
					header("Location: index.php");
				} else 
				{
					$_SESSION['connect_message'] = "Pseudo ou mot de passe incorrect 1";
					header("Location: index.php?action=login");
				}
			} else 
			{
				$_SESSION['connect_message'] = "Pseudo ou mot de passe incorrect 2";
				header("Location: index.php?action=login");
			}
		} elseif(isset($parentOnFile))
		{
			$passwordParentToCheck = $parentToCheck->password();
			$passwordParentOnFile = $parentOnFile->password();	

			if(isset($passwordParentOnFile) && isset($passwordParentToCheck)) 
			{
				if(password_verify($passwordParentToCheck, $passwordParentOnFile))
				{
					$_SESSION['profil'] = "parent";
					$_SESSION['pseudo'] = $parentOnFile->pseudo();
					header("Location: index.php");
				} else 
				{
					$_SESSION['connect_message'] = "Pseudo ou mot de passe incorrect 3";
					header("Location: index.php?action=login");
				}
			} else 
			{
				$_SESSION['connect_message'] = "Pseudo ou mot de passe incorrect 4";
				header("Location: index.php?action=login");
			}
		} else 
		{
			$_SESSION['connect_message'] = "Pseudo ou mot de passe incorrect 5";
			header("Location: index.php?action=login");
		}
	}

	public static function addAvis($id_nounou)
	{
		$avis = new Avis(['id_nounou'=>$id_nounou, 'pseudo_parent'=>$_SESSION['pseudo'], 'note'=>$_POST['note'], 'contenu'=>$_POST['contenu']]);
		var_dump($avis);
	}




	
}