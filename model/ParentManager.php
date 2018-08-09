<?php
require_once("model/Database.php");

class ParentManager extends Database 
{
	public function newParent($parent) // CREATE
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

	public function getParent($targetParent) // READ
	{
		$db = $this->dbConnect();
		$req = $db->prepare("SELECT * FROM parents WHERE pseudo= ?");
		$req->execute(array($targetParent->pseudo()));
		$parent = $req->fetch(PDO::FETCH_ASSOC);

		return new PereMere($parent);

	}

	public function updateParent($parent) // UPDATE
	{
		$password = htmlspecialchars($parent->password());
		
		$pseudoSafe = htmlspecialchars($parent->pseudo());
		$nomSafe = htmlspecialchars($parent->nom());
		$prenomSafe = htmlspecialchars($parent->prenom());
		$emailSafe = htmlspecialchars($parent->email());
		$passwordSafe = password_hash($password, PASSWORD_DEFAULT);
		$villeSafe = htmlspecialchars($parent->ville());
		$departementSafe = htmlspecialchars($parent->departement());
		$pseudoCurrent = $_SESSION['pseudoCurrent'];

		$db = $this->dbConnect();
		$req = $db->prepare("UPDATE parents SET pseudo= ?, nom= ?, prenom= ?, email= ?, password= ?, ville= ?, departement= ? WHERE pseudo= ?");
		$req->execute(array($pseudoSafe, $nomSafe, $prenomSafe, $emailSafe, $passwordSafe, $villeSafe, $departementSafe, $pseudoCurrent));
	}

	public function deleteParent($targetParent) //DELETE
	{
		$db = $this->dbConnect();
		$req = $db->prepare("DELETE FROM parents WHERE pseudo= ?");
		$req->execute(array($targetParent->pseudo()));
	}

	public function listAllParents()
	{
		$parents = [];

		$db = $this->dbConnect();
		$req = $db->query("SELECT * FROM parents ORDER BY id DESC");
		
		while($data = $req->fetch(PDO::FETCH_ASSOC))
		{
			$parents[] = new PereMere($data);
		}

		return $parents;
	}

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
		
		$existParent = $req->fetch(PDO::FETCH_ASSOC);
		if($existParent == TRUE) {
			return new PereMere($existParent);
		}
		//$count_req = $req->fetchAll();
		//$existParent = count($count_req);

		//return $existParent;
	}

	public function existPseudoParent($targetParent) 
	{
		$db = $this->dbConnect();
		$req = $db->prepare("SELECT * FROM parents WHERE pseudo = ?");
		$req->execute(array($targetParent->pseudo()));
		$count_req = $req->fetchAll();
		$existPseudoParent = count($count_req);

		return $existPseudoParent;
	}

	public function existMailParent($targetParent)
	{
		$db = $this->dbConnect();
		$req = $db->prepare("SELECT * FROM parents WHERE email = ?");
		$req->execute(array($targetParent->email()));
		$count_req = $req->fetchAll();
		$existMailParent = count($count_req);

		return $existMailParent;
	}


}