<?php
require_once("model/Database.php");

class ParentManager extends Database 
{
	public function newParent($parent)
	{
		$password = htmlspecialchars($parent->password());
		
		$pseudoSafe = htmlspecialchars($parent->pseudo());
		$nomSafe = htmlspecialchars($parent->nom());
		$prenomSafe = htmlspecialchars($parent->prenom());
		$emailSafe = htmlspecialchars($parent->email());
		$passwordSafe = password_hash($password, PASSWORD_DEFAULT);
		$villeSafe = htmlspecialchars($parent->ville());
		$departementSafe = htmlspecialchars($parent->departement());
	
		$db = $this->dbConnect();
		$req = $db->prepare("INSERT INTO parents(pseudo, nom, prenom, email, password, ville, departement) VALUES(?, ?, ?, ?, ?, ?, ?)");
		$req->execute(array($pseudoSafe, $nomSafe, $prenomSafe, $emailSafe, $passwordSafe, $villeSafe, $departementSafe));
	}

	public function getParent($targetParent)
	{
		//READ
	}

	//UPDATE

	//DELETE

	//contrôle le mdp en fonction du pseudo
	public function accessParent($parent)
	{
		$db = $this->dbConnect();
		$req = $db->prepare("SELECT * FROM parents WHERE pseudo= ?");
		$req->execute(array($parent->pseudo()));

		$parentOnFile = $req->fetch(PDO::FETCH_ASSOC);

		if($parentOnFile !== false) {
			return new PereMere($parentOnFile);
		}

	}

		//verifie si le profil existe déjà dans la db
	public function existParent($targetParent) 
	{
		$db = $this->dbConnect();
		$req = $db->prepare("SELECT * FROM parents WHERE pseudo = ? OR email = ?");
		$req->execute(array($targetParent->pseudo(), $targetParent->email()));
		$count_req = $req->fetchAll();
		$existParent = count($count_req);

		return $existParent;
	}
}