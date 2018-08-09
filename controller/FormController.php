<?php

abstract class FormController 
{
	public static function addNounou()
	{
		if(isset($_POST['pseudo']) && isset($_POST['nom']) && isset($_POST['prenom']) && isset($_POST['email']) && isset($_POST['confirm_email']) && isset($_POST['password']) && isset($_POST['confirm_password']) && isset($_POST['experience']) && isset($_POST['dispo']) && isset($_POST['ville']) && isset($_POST['departement'])) 
		{
			if(($_POST['pseudo']!="") && ($_POST['nom']!="") && ($_POST['prenom']!="") && ($_POST['email']!="") && ($_POST['confirm_email']!="") && ($_POST['password']!="") && ($_POST['confirm_password']!="") && ($_POST['experience']!="") && ($_POST['dispo']!="") && ($_POST['ville']!="") && ($_POST['departement']!="")) 
			{
				if($_POST['email'] == $_POST['confirm_email'])
				{
					if($_POST['password'] == $_POST['confirm_password'])
					{
						$nounouToCheck = new Nounou(['pseudo'=>$_POST['pseudo'], 'email'=>$_POST['email']]);
						$parentToCheck = new PereMere(['pseudo'=>$_POST['pseudo'], 'email'=>$_POST['email']]);
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
					$_SESSION['form_message'] = "Les adresses email doivent correspondre";
				}

			} else 
			{
				$_SESSION['form_message'] = "Tous les champs ne sont pas remplis";
			}
		} 
	header("Location: index.php?action=newNounouForm");
	}



	public static function editNounou()
	{
		if(isset($_POST['pseudo']) && isset($_POST['nom']) && isset($_POST['prenom']) && isset($_POST['email']) && isset($_POST['confirm_email']) && isset($_POST['password']) && isset($_POST['confirm_password']) && isset($_POST['experience']) && isset($_POST['dispo']) && isset($_POST['ville']) && isset($_POST['departement'])) 
		{
			if(($_POST['pseudo']!="") && ($_POST['nom']!="") && ($_POST['prenom']!="") && ($_POST['email']!="") && ($_POST['confirm_email']!="") && ($_POST['password']!="") && ($_POST['confirm_password']!="") && ($_POST['experience']!="") && ($_POST['dispo']!="") && ($_POST['ville']!="") && ($_POST['departement']!="")) 
			{
				if($_POST['email'] == $_POST['confirm_email'])
				{
					if($_POST['password'] == $_POST['confirm_password'])
					{
						$nounouToCheck = new Nounou(['pseudo'=>$_SESSION['pseudo'], 'email'=>$_POST['email']]);
						$parentToCheck = new PereMere(['pseudo'=>$_SESSION['pseudo'], 'email'=>$_POST['email']]);
						$nounouManger = new NounouManager();
						$parentManager = new ParentManager();

						$existNounou = $nounouManger->existNounou($nounouToCheck);
						$existParent = $parentManager->existParent($parentToCheck);


						if ($existNounou > 1 || $existParent > 1)
						{
							$_SESSION['editNounou_message'] = "Pseudo ou Email déjà utilisé";
						} else 
						{
							$nounou = new Nounou(['pseudo'=>$_POST['pseudo'], 'nom'=>$_POST['nom'], 'prenom'=>$_POST['prenom'], 'email'=>$_POST['email'], 'password'=>$_POST['password'], 'experience'=>$_POST['experience'], 'place_dispo'=>$_POST['dispo'], 'ville'=>$_POST['ville'], 'departement'=>$_POST['departement']]);
							$nounouManager = new NounouManager();
							$nounouManager->updateNounou($nounou);

							$_SESSION['editNounou_message'] = "Vos modifications ont bien été prises en compte";
						}
					} else 
					{
						$_SESSION['editNounou_message'] = "Les mots de passe ne correspondent pas"; 
					}
				} else 
				{
					$_SESSION['editNounou_message'] = "Les adresses email doivent correspondre";
				}

			} else 
			{
				$_SESSION['editNounou_message'] = "Tous les champs ne sont pas remplis";
			}
		} 
	$_SESSION["pseudo"] = $nounou->pseudo();
	header("Location: index.php?action=nounouProfil");	
	}









	public static function addParent()
	{
		if(isset($_POST['pseudo']) && isset($_POST['nom']) && isset($_POST['prenom']) && isset($_POST['email']) && isset($_POST['confirm_email']) && isset($_POST['password']) && isset($_POST['confirm_password']) && isset($_POST['ville']) && isset($_POST['departement'])) 
		{
			if(($_POST['pseudo']!="") && ($_POST['nom']!="") && ($_POST['prenom']!="") && ($_POST['email']!="") && ($_POST['confirm_email']!="") && ($_POST['password']!="") && ($_POST['confirm_password']!="") && ($_POST['ville']!="") && ($_POST['departement']!="")) 
			{
				if($_POST['email'] == $_POST['confirm_email'])
				{
					if($_POST['password'] == $_POST['confirm_password'])
					{
						$nounouToCheck = new Nounou(['pseudo'=>$_POST['pseudo'], 'email'=>$_POST['email']]);
						$parentToCheck = new PereMere(['pseudo'=>$_POST['pseudo'], 'email'=>$_POST['email']]);
						$nounouManger = new NounouManager();
						$parentManager = new ParentManager();

						$existNounou = $nounouManger->existNounou($nounouToCheck);
						$existParent = $parentManager->existParent($parentToCheck);


						if ($existNounou!=0 || $existParent!=0)
						{
							$_SESSION['form_message'] = "Pseudo ou Email déjà utilisé";
						} else 
						{
							$parent = new PereMere(['pseudo'=>$_POST['pseudo'], 'nom'=>$_POST['nom'], 'prenom'=>$_POST['prenom'], 'email'=>$_POST['email'], 'password'=>$_POST['password'], 'ville'=>$_POST['ville'], 'departement'=>$_POST['departement']]);
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
					$_SESSION['form_message'] = "Les adresses email doivent correspondre";
				}

			} else 
			{
				$_SESSION['form_message'] = "Tous les champs ne sont pas remplis";
			}
		} 
	header("Location: index.php?action=newParentForm");
	}


	public static function editParent($pseudoParent)
	{
		if(isset($_SESSION['pseudo']) && isset($_POST['pseudo']) && isset($_POST['nom']) && isset($_POST['prenom']) && isset($_POST['email']) && isset($_POST['confirm_email']) && isset($_POST['password']) && isset($_POST['confirm_password']) && isset($_POST['ville']) && isset($_POST['departement'])) 
		{
			if(($_SESSION['pseudo']!="") && ($_POST['pseudo']!="") && ($_POST['nom']!="") && ($_POST['prenom']!="") && ($_POST['email']!="") && ($_POST['confirm_email']!="") && ($_POST['password']!="") && ($_POST['confirm_password']!="") && ($_POST['ville']!="") && ($_POST['departement']!="")) 
			{
				if($_POST['email'] == $_POST['confirm_email'])
				{
					if($_POST['password'] == $_POST['confirm_password'])
					{
						$nounouToCheck = new Nounou(['pseudo'=>$_POST['pseudo'], 'email'=>$_POST['email']]);
						$parentToCheck = new PereMere(['pseudo'=>$_POST['pseudo'], 'email'=>$_POST['email']]);
						$nounouManager = new NounouManager();
						$parentManager = new ParentManager();

						$existNounou = $nounouManager->existNounou($nounouToCheck);
						$existParent = $parentManager->existParent($parentToCheck);	

						$existPseudoParent = $parentManager->existPseudoParent($parentToCheck);
						$existMailParent = $parentManager->existMailParent($parentToCheck);

						$existPseudoNounou = $nounouManager->existPseudoNounou($parentToCheck);
						$existMailNounou = $nounouManager->existMailNounou($parentToCheck);

						$parentTarget = new PereMere(['pseudo'=>$pseudoParent]);
						$parent = $parentManager->getParent($parentTarget);


						//if(isset($existParent)){echo "1 parent exist";} 
						//if(isset($existNounou)){echo "1 nounou exist";}

						




						//Si le pseudo exist dans la db
							// 1 fois
								//Si le pseudo saisi = le pseudo de la db
									//si le mail existe dans la db

							// pseudo déjà pris
						//modification

						if($_POST['pseudo'] == $pseudoParent)
						{
							if($_POST['email'] == $parent->email()) 
							{
								echo "modif ok 1";
							} else
							{
								if($existMailParent !== 0 || $existMailNounou !== 0)
								{
									echo "mail déjà utlisé 1";
								} else 
								{
									echo "modif ok 2";
								}
							}
						} else 
						{
							if($existPseudoParent !== 0 || $existPseudoNounou !== 0)
							{
								echo "pseudo utilisé 1";
							} else
							{
								if($_POST['email'] == $parent->email())
								{
									echo "ok modif 3";
								} else
								{
									if($existMailParent !== 0 || $existMailNounou !== 0) 
									{
										echo "mail déjà utilisé 2";
									} else 
									{
										echo "modif ok 4";
									}
								}
							}
						}
						



						
						
						

						















					} else 
					{
						echo "Les mots de passe doivent être identiques";
					}
				} else
				{
					echo "Les emails doivent correspondre";
				}
			} else 
			{
				echo "Tous les champs doivent être remplis";
			}
		}
	}



/*
	public static function editParent($pseudoParent)
	{
		if(isset($_SESSION['pseudo']) && isset($_POST['pseudo']) && isset($_POST['nom']) && isset($_POST['prenom']) && isset($_POST['email']) && isset($_POST['confirm_email']) && isset($_POST['password']) && isset($_POST['confirm_password']) && isset($_POST['ville']) && isset($_POST['departement'])) 
		{
			if(($_SESSION['pseudo']!="") && ($_POST['pseudo']!="") && ($_POST['nom']!="") && ($_POST['prenom']!="") && ($_POST['email']!="") && ($_POST['confirm_email']!="") && ($_POST['password']!="") && ($_POST['confirm_password']!="") && ($_POST['ville']!="") && ($_POST['departement']!="")) 
			{
				if($_POST['email'] == $_POST['confirm_email'])
				{
					if($_POST['password'] == $_POST['confirm_password'])
					{

						$nounouToCheck = new Nounou(['pseudo'=>$pseudoParent, 'email'=>$_POST['email']]);
						$parentToCheck = new PereMere(['pseudo'=>$pseudoParent, 'email'=>$_POST['email']]);
						$nounouManger = new NounouManager();
						$parentManager = new ParentManager();

						$existNounou = $nounouManger->existNounou($nounouToCheck);
						$existParent = $parentManager->existParent($parentToCheck);

						
						if($pseudoParent != $_POST['pseudo']) //si changement de pseudo
						{
							if ($existNounou != 0 || $existParent > 1 ) //si le pseudo existe stop PROBLEME 
							{
								$_SESSION['editParent_message'] = "Pseudo ou Email déjà utilisé";


								if($_SESSION['profil'] == 'parent') {
									header("Location: index.php?action=parentProfil");	
								} elseif($_SESSION['profil'] == 'admin') {
									header("Location: index.php?action=adminEditParent&pseudo=".$pseudoParent);
								}
							} else //sinon ok
							{
								$parent = new PereMere(['pseudo'=>$_POST['pseudo'], 'nom'=>$_POST['nom'], 'prenom'=>$_POST['prenom'], 'email'=>$_POST['email'], 'password'=>$_POST['password'], 'ville'=>$_POST['ville'], 'departement'=>$_POST['departement']]);
								$parentManager = new ParentManager();
								$_SESSION['pseudoCurrent'] = $pseudoParent;
								$parentManager->updateParent($parent);
								$_SESSION['editParent_message'] = "Vos modifications ont bien été prises en compte";

								if($_SESSION['profil'] == 'parent') {
									$_SESSION["pseudo"] = $parent->pseudo();
									header("Location: index.php?action=parentProfil");	
								} elseif($_SESSION['profil'] == 'admin') {
									header("Location: index.php?action=adminEditParent&pseudo=".$parent->pseudo());
								}
							}
						} else //si pas de changement pseudo
						{
							$parent = new PereMere(['pseudo'=>$_POST['pseudo'], 'nom'=>$_POST['nom'], 'prenom'=>$_POST['prenom'], 'email'=>$_POST['email'], 'password'=>$_POST['password'], 'ville'=>$_POST['ville'], 'departement'=>$_POST['departement']]);
							$parentManager = new ParentManager();
							$_SESSION['pseudoCurrent'] = $pseudoParent;
							$parentManager->updateParent($parent);
							$_SESSION['editParent_message'] = "Vos modifications ont bien été prises en compte 2";

							if($_SESSION['profil'] == 'parent') {
								$_SESSION["pseudo"] = $parent->pseudo();
								header("Location: index.php?action=parentProfil");	
							} elseif($_SESSION['profil'] == 'admin') {
								header("Location: index.php?action=adminEditParent&pseudo=".$parent->pseudo());
							}
						}
					
					} else 
					{

						$_SESSION['editParent_message'] = "Les mots de passe ne correspondent pas"; 


						if($_SESSION['profil'] == 'parent') {
							header("Location: index.php?action=parentProfil");	
						} elseif($_SESSION['profil'] == 'admin') {
							header("Location: index.php?action=adminEditParent&pseudo=".$pseudoParent);
						}


					}
				} else 
				{

					$_SESSION['editParent_message'] = "Les adresses email doivent correspondre";


					if($_SESSION['profil'] == 'parent') {
						header("Location: index.php?action=parentProfil");	
					} elseif($_SESSION['profil'] == 'admin') {
						header("Location: index.php?action=adminEditParent&pseudo=".$pseudoParent);
					}

				}

			} else 
			{

				$_SESSION['editParent_message'] = "Tous les champs ne sont pas remplis";


				if($_SESSION['profil'] == 'parent') {
					header("Location: index.php?action=parentProfil");	
				} elseif($_SESSION['profil'] == 'admin') {
					header("Location: index.php?action=adminEditParent&pseudo=".$pseudoParent);
				}


			}
		} 	
	}
*/





}