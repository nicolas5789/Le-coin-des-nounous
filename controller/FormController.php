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

}