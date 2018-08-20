<?php

abstract class FormController 
{
	public static function addNounou()
	{
		if(isset($_POST['pseudo']) && isset($_POST['nom']) && isset($_POST['prenom']) && isset($_POST['email']) && isset($_POST['confirm_email']) && isset($_POST['password']) && isset($_POST['confirm_password']) && isset($_POST['experience']) && is_numeric($_POST['experience']) && isset($_POST['dispo'])  && is_numeric($_POST['dispo']) && isset($_POST['ville']) && isset($_POST['departement']) && is_numeric($_POST['departement']) && $_POST['dispo'] >= 0 && $_POST['experience'] >= 0) 
		{
			if(($_POST['pseudo']!="") && ($_POST['nom']!="") && ($_POST['prenom']!="") && ($_POST['email']!="") && ($_POST['confirm_email']!="") && ($_POST['password']!="") && ($_POST['confirm_password']!="") && ($_POST['experience']!="") && ($_POST['dispo']!="") && ($_POST['ville']!="") && ($_POST['departement']!="")) 
			{
				if($_POST['email'] == $_POST['confirm_email'])
				{
					if (preg_match("#^[a-z0-9._-]+@[a-z0-9._-]{2,}\.[a-z]{2,4}$#", $_POST['email']))
					{
						if($_POST['password'] == $_POST['confirm_password'])
						{
							$nounouToCheck = new Nounou(['pseudo'=>$_POST['pseudo'], 'email'=>$_POST['email']]);
							$parentToCheck = new Parents(['pseudo'=>$_POST['pseudo'], 'email'=>$_POST['email']]);
							$nounouManger = new NounouManager();
							$parentManager = new ParentManager();

							$existNounou = $nounouManger->existNounou($nounouToCheck);
							$existParent = $parentManager->existParent($parentToCheck);

							if ($existNounou!=0 || $existParent!=0)
							{
								$_SESSION['form_message'] = "Pseudo ou Email déjà utilisé";
							} else 
							{
								$nounou = new Nounou(['pseudo'=>$_POST['pseudo'], 'nom'=>$_POST['nom'], 'prenom'=>$_POST['prenom'], 'email'=>$_POST['email'], 'password'=>$_POST['password'], 'experience'=>$_POST['experience'], 'place_dispo'=>$_POST['dispo'], 'ville'=>$_POST['ville'], 'departement'=>$_POST['departement']]);
								$nounouManager = new NounouManager();
								$nounouManager->newNounou($nounou);

								$_SESSION['form_message'] = "Félicitation, vous pouvez désormais vous connecter avec votre profil";
							}
						} else 
						{
							$_SESSION['form_message'] = "Les mots de passe ne correspondent pas"; 
						}
					} else 
					{
						$_SESSION['form_message'] = "Adresse email invalide";	
					}
				} else 
				{
					$_SESSION['form_message'] = "Les adresses email doivent correspondre";
				}

			} else 
			{
				$_SESSION['form_message'] = "Tous les champs ne sont pas remplis";
			}
		} else 
		{
			$_SESSION['form_message'] = "Saisi invalide";
		}
	header("Location: index.php?action=newNounouForm");
	}

	public static function editNounou($pseudoNounou)
	{
		if(isset($_SESSION['pseudo']) && isset($_POST['pseudo']) && isset($_POST['nom']) && isset($_POST['prenom']) && isset($_POST['email']) && isset($_POST['confirm_email']) && isset($_POST['experience']) && is_numeric($_POST['experience']) && isset($_POST['place_dispo']) && is_numeric($_POST['place_dispo']) && isset($_POST['ville']) && isset($_POST['departement']) && is_numeric($_POST['departement']) && $_POST['dispo'] >= 0 && $_POST['experience'] >= 0) 
		{
			if(($_SESSION['pseudo']!="") && ($_POST['pseudo']!="") && ($_POST['nom']!="") && ($_POST['prenom']!="") && ($_POST['email']!="") && ($_POST['confirm_email']!="") && ($_POST['experience']!="") && ($_POST['place_dispo']!="") && ($_POST['ville']!="") && ($_POST['departement']!="")) 
			{
				if($_POST['email'] == $_POST['confirm_email'])
				{
					if (preg_match("#^[a-z0-9._-]+@[a-z0-9._-]{2,}\.[a-z]{2,4}$#", $_POST['email']))
					{
						if($_SESSION['profil']) 
						{
							$nounouToCheck = new Nounou(['pseudo'=>$_POST['pseudo'], 'email'=>$_POST['email']]);
							$nounouManager = new NounouManager();
							$parentManager = new ParentManager();

							$existPseudoParent = $parentManager->existPseudoParent($nounouToCheck);
							$existMailParent = $parentManager->existMailParent($nounouToCheck);
							$existPseudoNounou = $nounouManager->existPseudoNounou($nounouToCheck);
							$existMailNounou = $nounouManager->existMailNounou($nounouToCheck);

							$nounouTarget = new Nounou(['pseudo'=>$pseudoNounou]);

							$nounou = $nounouManager->getNounouByPseudo($nounouTarget);

							//Vérification existance pseudo ou email dans la db

							if($_POST['pseudo'] == $pseudoNounou) {
								if($_POST['email'] == $nounou->email()) {
									$update = "ok";
								} elseif($existMailParent !== 0 || $existMailNounou !== 0) {
										$_SESSION['editNounou_message'] = "Adresse email déjà utilisée";
									} else {
										$update = "ok";
									}
							} elseif($existPseudoParent !== 0 || $existPseudoNounou !== 0) {
									$_SESSION['editNounou_message'] = "Pseudo indisponible";
								} elseif($_POST['email'] == $nounou->email()) {
										$update = "ok";
									} elseif($existMailParent !== 0 || $existMailNounou !== 0) {
											$_SESSION['editNounou_message'] = "Adresse email déjà utilisée";
										} else {
											$update = "ok";
										}
						} else 
						{
							$_SESSION['editNounou_message'] = "Les mots de passe doivent être identiques";
						}
					} else 
					{
						$_SESSION['editNounou_message'] = "Adresse email invalide";	
					}
				} else
				{
					$_SESSION['editNounou_message'] = "Les emails doivent correspondre";
				}
			} else 
			{
				$_SESSION['editNounou_message'] = "Tous les champs doivent être remplis";
			}
		} else {
			$_SESSION['editNounou_message'] = "Saisi invalide";
		}

		//Si conditions ok -> update dans la db
		if(isset($update) && $update == "ok"){

			$nounouToUpdate = new Nounou(['pseudo'=>$_POST['pseudo'], 'nom'=>$_POST['nom'], 'prenom'=>$_POST['prenom'], 'email'=>$_POST['email'], 'experience'=>$_POST['experience'], 'place_dispo'=>$_POST['place_dispo'], 'ville'=>$_POST['ville'], 'departement'=>$_POST['departement']]);

			$nounouManager = new NounouManager();
			$_SESSION['pseudoCurrent'] = $pseudoNounou;
			$nounouManager->updateNounou($nounouToUpdate); 
			$_SESSION['editNounou_message'] = "Vos modifications ont bien été prises en compte";

			if($_SESSION['profil'] == 'nounou') {
			$_SESSION["pseudo"] = $nounouToUpdate->pseudo();
			header("Location: index.php?action=nounouProfil");	
			} elseif($_SESSION['profil'] == 'admin') {
				header("Location: index.php?action=adminEditNounou&pseudo=".$nounouToUpdate->pseudo());
			}

		} else {
			if($_SESSION['profil'] == 'nounou') {
			header("Location: index.php?action=nounouProfil");	
			} elseif($_SESSION['profil'] == 'admin') {
				header("Location: index.php?action=adminEditNounou&pseudo=".$pseudoNounou);
			}
		}	
	}

	public static function addParent()
	{
		if(isset($_POST['pseudo']) && isset($_POST['nom']) && isset($_POST['prenom']) && isset($_POST['email']) && isset($_POST['confirm_email']) && isset($_POST['password']) && isset($_POST['confirm_password']) && isset($_POST['ville']) && isset($_POST['departement']) && is_numeric($_POST['departement'])) 
		{
			if(($_POST['pseudo']!="") && ($_POST['nom']!="") && ($_POST['prenom']!="") && ($_POST['email']!="") && ($_POST['confirm_email']!="") && ($_POST['password']!="") && ($_POST['confirm_password']!="") && ($_POST['ville']!="") && ($_POST['departement']!="")) 
			{
				if($_POST['email'] == $_POST['confirm_email'])
				{
					if (preg_match("#^[a-z0-9._-]+@[a-z0-9._-]{2,}\.[a-z]{2,4}$#", $_POST['email']))
					{
						if($_POST['password'] == $_POST['confirm_password'])
						{
							$nounouToCheck = new Nounou(['pseudo'=>$_POST['pseudo'], 'email'=>$_POST['email']]);
							$parentToCheck = new Parents(['pseudo'=>$_POST['pseudo'], 'email'=>$_POST['email']]);
							$nounouManger = new NounouManager();
							$parentManager = new ParentManager();

							$existNounou = $nounouManger->existNounou($nounouToCheck);
							$existParent = $parentManager->existParent($parentToCheck);


							if ($existNounou!=0 || $existParent!=0)
							{
								$_SESSION['form_message'] = "Pseudo ou Email déjà utilisé";
							} else 
							{
								$parent = new Parents(['pseudo'=>$_POST['pseudo'], 'nom'=>$_POST['nom'], 'prenom'=>$_POST['prenom'], 'email'=>$_POST['email'], 'password'=>$_POST['password'], 'ville'=>$_POST['ville'], 'departement'=>$_POST['departement']]);
								$parentManager = new ParentManager();
								$parentManager->newParent($parent);

								$_SESSION['form_message'] = "Félicitation, vous pouvez désormais vous connecter avec votre profil";
							}
						} else 
						{
							$_SESSION['form_message'] = "Les mots de passe ne correspondent pas"; 
						}
					} else 
					{
						$_SESSION['form_message'] = "Adresse email invalide";	
					}
				} else 
				{
					$_SESSION['form_message'] = "Les adresses email doivent correspondre";
				}

			} else 
			{
				$_SESSION['form_message'] = "Tous les champs ne sont pas remplis";
			}
		} else 
		{
			$_SESSION['form_message'] = "Saisi invalide";
		}
	header("Location: index.php?action=newParentForm");
	}


	public static function editParent($pseudoParent)
	{
		if(isset($_SESSION['pseudo']) && isset($_POST['pseudo']) && isset($_POST['nom']) && isset($_POST['prenom']) && isset($_POST['email']) && isset($_POST['confirm_email']) && isset($_POST['ville']) && isset($_POST['departement']) && is_numeric($_POST['departement'])) 
		{
			if(($_SESSION['pseudo']!="") && ($_POST['pseudo']!="") && ($_POST['nom']!="") && ($_POST['prenom']!="") && ($_POST['email']!="") && ($_POST['confirm_email']!="") && ($_POST['ville']!="") && ($_POST['departement']!="")) 
			{
				if($_POST['email'] == $_POST['confirm_email'])
				{
					if (preg_match("#^[a-z0-9._-]+@[a-z0-9._-]{2,}\.[a-z]{2,4}$#", $_POST['email']))
					{
						if(isset($_SESSION['profil'])) 
						{
							$nounouToCheck = new Nounou(['pseudo'=>$_POST['pseudo'], 'email'=>$_POST['email']]);
							$parentToCheck = new Parents(['pseudo'=>$_POST['pseudo'], 'email'=>$_POST['email']]);
							$nounouManager = new NounouManager();
							$parentManager = new ParentManager();

							$existPseudoParent = $parentManager->existPseudoParent($parentToCheck);
							$existMailParent = $parentManager->existMailParent($parentToCheck);
							$existPseudoNounou = $nounouManager->existPseudoNounou($parentToCheck);
							$existMailNounou = $nounouManager->existMailNounou($parentToCheck);

							$parentTarget = new Parents(['pseudo'=>$pseudoParent]);

							$parent = $parentManager->getParent($parentTarget);

							//Vérification existance pseudo ou email dans la db

							if($_POST['pseudo'] == $pseudoParent) {
								if($_POST['email'] == $parent->email()) {
									$update = "ok";
								} elseif($existMailParent !== 0 || $existMailNounou !== 0) {
										$_SESSION['editParent_message'] = "Adresse email déjà utilisée";
									} else {
										$update = "ok";
									}
							} elseif($existPseudoParent !== 0 || $existPseudoNounou !== 0) {
									$_SESSION['editParent_message'] = "Pseudo indisponible";
								} elseif($_POST['email'] == $parent->email()) {
										$update = "ok";
									} elseif($existMailParent !== 0 || $existMailNounou !== 0) {
											$_SESSION['editParent_message'] = "Adresse email déjà utilisée";
										} else {
											$update = "ok";
										}
						} else 
						{
							$_SESSION['editParent_message'] = "Les mots de passe doivent être identiques";
						}
					} else 
					{
						$_SESSION['editParent_message'] = "Adresse email invalide";	
					}
				} else
				{
					$_SESSION['editParent_message'] = "Les emails doivent correspondre";
				}
			} else 
			{
				$_SESSION['editParent_message'] = "Tous les champs doivent être remplis";
			}
		} else
		{
			$_SESSION['editParent_message'] = "Saisi invalide";
		}

		//Si conditions ok -> update dans la db
		if(isset($update) && $update == "ok"){

			$parentToUpdate = new Parents(['pseudo'=>$_POST['pseudo'], 'nom'=>$_POST['nom'], 'prenom'=>$_POST['prenom'], 'email'=>$_POST['email'], 'ville'=>$_POST['ville'], 'departement'=>$_POST['departement']]);
			$parentManager = new ParentManager();
			$_SESSION['pseudoCurrent'] = $pseudoParent;
			$parentManager->updateParent($parentToUpdate);

			$avisManager = new AvisManager();
			$targetAvis = new Avis(['pseudo_parent'=>$_POST['pseudo']]);
			$avisManager->updateAvisPseudo($targetAvis);

			$_SESSION['editParent_message'] = "Vos modifications ont bien été prises en compte";

			if($_SESSION['profil'] == 'parent') {
			$_SESSION["pseudo"] = $parentToUpdate->pseudo();
			header("Location: index.php?action=parentProfil");	
			} elseif($_SESSION['profil'] == 'admin') {
				header("Location: index.php?action=adminEditParent&pseudo=".$parentToUpdate->pseudo());
			}

		} else {
			if($_SESSION['profil'] == 'parent') {
			header("Location: index.php?action=parentProfil");	
			} elseif($_SESSION['profil'] == 'admin') {
				header("Location: index.php?action=adminEditParent&pseudo=".$pseudoParent);
			}
		}	
	}

	public static function updatePasswordParent($pseudo) 
	{
		if(isset($_SESSION['profil'])) 
		{
			if($_POST['password']!="")
			{
				if($_POST['password'] == $_POST['confirm_password']) 
				{
					$parentManager = new ParentManager();
					$parents = new Parents(['pseudo'=>$pseudo, 'password'=>$_POST['password']]);
					$parentManager->updatePasswordParent($parents);
					$_SESSION['editPasswordParent'] = "Le mot de passe a été modifié";
				} else 
				{
					$_SESSION['editPasswordParent'] = "Les mots de passe doivent être identiques";
				}
			} else 
			{
				$_SESSION['editPasswordParent'] = "Les champs doivent être remplis";	
			}	
		}
		if($_SESSION['profil'] == 'parent') {
			header("Location: index.php?action=parentProfil");	
			} elseif($_SESSION['profil'] == 'admin') {
				header("Location: index.php?action=adminEditParent&pseudo=".$pseudo);
			}
	}

	public static function updatePasswordNounou($pseudo) 
	{
		if(isset($_SESSION['profil'])) 
		{
			if($_POST['password']!="")
			{
				if($_POST['password'] == $_POST['confirm_password']) 
				{
					$nounouManager = new NounouManager();
					$nounou = new Nounou(['pseudo'=>$pseudo, 'password'=>$_POST['password']]);
					$nounouManager->updatePasswordNounou($nounou);
					$_SESSION['editPasswordNounou'] = "Le mot de passe a été modifié";
				} else 
				{
					$_SESSION['editPasswordNounou'] = "Les mots de passe doivent être identiques";
				}
			} else 
			{
				$_SESSION['editPasswordNounou'] = "Les champs doivent être remplis";	
			}	
		}
		if($_SESSION['profil'] == 'nounou') {
			header("Location: index.php?action=nounouProfil");	
			} elseif($_SESSION['profil'] == 'admin') {
				header("Location: index.php?action=adminEditNounou&pseudo=".$pseudo);
			}
	}

}