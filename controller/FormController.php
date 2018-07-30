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
						echo "cool !";
					} else 
					{
						$_SESSION['form_error'] = "Les mots de passe ne correspondent pas"; 
					}
				} else 
				{
					$_SESSION['form_error'] = "Les adresses email doivent correspondre";
				}

			} else 
			{
				$_SESSION['form_error'] = "Tous les champs ne sont pas remplis";
			}
		} 
/*
	var_dump($_POST['pseudo']);
	var_dump($_POST['nom']);
	var_dump($_POST['prenom']);
	var_dump($_POST['email']);
	var_dump($_POST['confirm_email']);
	var_dump($_POST['password']);
	var_dump($_POST['confirm_password']);
	var_dump($_POST['experience']);
	var_dump($_POST['dispo']);
	var_dump($_POST['ville']);
	var_dump($_POST['departement']);
*/
	header("Location: index.php?action=newNounouForm");

	}
}

		/*
			$nounou = new Nounou([
				'pseudo'=>$_POST['pseudo'],
				'nom'=>$_POST['nom'],
				'prenom'=>$_POST['prenom'],
				'email'=>$_POST['email'],
				'password'=>$_POST['password'], // A Hasher
				'experience'=>$_POST['experience'],
				'dispo'=>$_POST['dispo'],
				'ville'=>$_POST['ville'],
				'departement'=>$_POST['departement']
			]);
		*/