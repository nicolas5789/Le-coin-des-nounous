<?php
require_once("model/Database.php");

class NounouManager extends Database 
{
	//ajout d'une nounou (CREATE)
	public function newNounou($nounou)
	{
		
		$password = htmlspecialchars($nounou->password());
		
		$pseudoSafe = htmlspecialchars($nounou->pseudo());
		$nomSafe = htmlspecialchars($nounou->nom());
		$prenomSafe = htmlspecialchars($nounou->prenom());
		$emailSafe = htmlspecialchars($nounou->email());
		$passwordSafe = password_hash($password, PASSWORD_DEFAULT);
		$experienceSafe = htmlspecialchars($nounou->experience());
		$dispoSafe = htmlspecialchars($nounou->place_dispo());
		$villeSafe = htmlspecialchars($nounou->ville());
		$departementSafe = htmlspecialchars($nounou->departement());
	
		$db = $this->dbConnect();
		$req = $db->prepare("INSERT INTO nounous(pseudo, nom, prenom, email, password, experience, place_dispo, ville, departement) VALUES(?, ?, ?, ?, ?, ?, ?, ?, ?)");
		$req->execute(array($pseudoSafe, $nomSafe, $prenomSafe, $emailSafe, $passwordSafe, $experienceSafe, $dispoSafe, $villeSafe, $departementSafe));

	}

	//affichage de la liste des nounous par dept(READ)
	public function listNounous($targetNounou)
	{
		$nounous = [];

		$db = $this->dbConnect();
		$req = $db->prepare("SELECT * FROM nounous WHERE departement= ? ORDER BY id");
		$req->execute(array($targetNounou->departement()));

		while($data = $req->fetch(PDO::FETCH_ASSOC))
		{
			$nounous[] = new Nounou($data);
		}

		return $nounous;
	}

	//affichage de toutes les nounous
	public function listAllNounous()
	{
		$nounous = [];

		$db = $this->dbConnect();
		$req = $db->query("SELECT * FROM nounous ORDER BY signalement DESC");
		
		while($data = $req->fetch(PDO::FETCH_ASSOC))
		{
			$nounous[] = new Nounou($data);
		}

		return $nounous;
	}

	//affichage du profil d'une nounou
	public function getNounou($targetNounou)
	{
		$db = $this->dbConnect();
		$req = $db->prepare("SELECT * FROM nounous WHERE id= ?");
		$req->execute(array($targetNounou->id()));
		
		$nounou = $req->fetch(PDO::FETCH_ASSOC);

		return new Nounou($nounou);
	}

	//affichage du profil d'une nounou par pseudo
	public function getNounouByPseudo($targetNounou)
	{
		$db = $this->dbConnect();
		$req = $db->prepare("SELECT * FROM nounous WHERE pseudo= ?");
		$req->execute(array($targetNounou->pseudo()));
		
		$nounou = $req->fetch(PDO::FETCH_ASSOC);

		return new Nounou($nounou);
	}

	//modifier un profil de nounou (UPDATE)
	public function updateNounou($nounou)
	{
		$password = htmlspecialchars($nounou->password());
		
		$pseudoSafe = htmlspecialchars($nounou->pseudo());
		$nomSafe = htmlspecialchars($nounou->nom());
		$prenomSafe = htmlspecialchars($nounou->prenom());
		$emailSafe = htmlspecialchars($nounou->email());
		$passwordSafe = password_hash($password, PASSWORD_DEFAULT);
		$experienceSafe = htmlspecialchars($nounou->experience());
		$dispoSafe = htmlspecialchars($nounou->place_dispo());
		$villeSafe = htmlspecialchars($nounou->ville());
		$departementSafe = htmlspecialchars($nounou->departement());
		$pseudoCurrent = $_SESSION['pseudo'];
	
		$db = $this->dbConnect();
		$req = $db->prepare("UPDATE nounous SET pseudo= ?, nom= ?, prenom= ?, email= ?, password= ?, experience= ?, place_dispo= ?, ville= ?, departement= ? WHERE pseudo= ? ");
		$req->execute(array($pseudoSafe, $nomSafe, $prenomSafe, $emailSafe, $passwordSafe, $experienceSafe, $dispoSafe, $villeSafe, $departementSafe, $pseudoCurrent));	
	}

	public function reportNounou($nounou)
	{
		$db = $this->dbConnect();
		$req = $db->prepare("UPDATE nounous SET signalement= signalement+1 WHERE id= ?");
		$req->execute(array($nounou->id()));
	}

	//supprimer le profil d'une nounou (DELETE)
	public function deleteNounou($targetNounou)
	{
		$db = $this->dbConnect();
		$req= $db->prepare("DELETE FROM nounous WHERE pseudo= ?");
		$req->execute(array($targetNounou->pseudo()));
	}

	//verifie si le profil existe déjà dans la db
	public function existNounou($targetNounou) 
	{
		$db = $this->dbConnect();
		$req = $db->prepare("SELECT * FROM nounous WHERE pseudo = ? OR email = ?");
		$req->execute(array($targetNounou->pseudo(), $targetNounou->email()));
		$count_req = $req->fetchAll();
		$existNounou = count($count_req);

		return $existNounou;
	}

	//contrôle le mdp en fonction du pseudo
	public function accessNounou($nounou)
	{
		$db = $this->dbConnect();
		$req = $db->prepare("SELECT * FROM nounous WHERE pseudo= ?");
		$req->execute(array($nounou->pseudo()));

		$nounouOnFile = $req->fetch(PDO::FETCH_ASSOC);

		if($nounouOnFile !== false) {
			return new Nounou($nounouOnFile);
		}

	}

}