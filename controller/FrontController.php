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

		$nounou = $nounouManager->getNounou($targetNounou);

		require("views/front/frontNounouView.php");
	}

	public static function newForm()
	{
		require("views/front/frontNewFormView.php");
	}
}