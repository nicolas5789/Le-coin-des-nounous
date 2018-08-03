<?php
require_once("model/Database.php");

class AvisManager extends Database 
{
	public function newAvis($avis) //CREATE
	{
		$id_nounouSafe = htmlspecialchars($avis->id_nounou());
		$pseudo_parentSafe = htmlspecialchars($avis->pseudo_parent());
		$noteSafe = htmlspecialchars($avis->note());
		$contenuSafe = htmlspecialchars($avis->contenu());

		$db = $this->dbConnect();
		$req = $db->prepare("INSERT INTO avis(id_nounou, pseudo_parent, note, contenu) VALUES(?, ?, ?, ?) ");
		$req->execute(array($id_nounouSafe, $pseudo_parentSafe, $noteSafe, $contenuSafe));
	}

	public function getAvis($targetAvis) //READ
	{
		$db = $this->dbConnect();
		$req = $db->prepare("SELECT * FROM avis WHERE id_nounou= ? AND pseudo_parent = ?");
		$req->execute(array($targetAvis->id_nounou(), $targetAvis->pseudo_parent()));
		$avisOnFile = $req->fetch(PDO::FETCH_ASSOC);

		if($avisOnFile!= false){
			return new Avis($avisOnFile);
		}
	}

	public function updateAvis($avis) // UPDATE
	{
		$id_nounouSafe = htmlspecialchars($avis->id_nounou());
		$pseudo_parentSafe = htmlspecialchars($avis->pseudo_parent());
		$noteSafe = htmlspecialchars($avis->note());
		$contenuSafe = htmlspecialchars($avis->contenu());

		$db = $this->dbConnect();
		$req = $db->prepare("UPDATE avis SET note= ?, contenu= ? WHERE id_nounou= ? AND pseudo_parent= ? ");
		$req->execute(array($noteSafe, $contenuSafe, $id_nounouSafe, $pseudo_parentSafe));
	}

	public function deleteAvis($avis) //DELETE
	{
		$db = $this->dbConnect();
		$req = $db->prepare("DELETE FROM avis WHERE id= ?");
		$req->execute(array($avis->id()));
	}

	public function listAvis($targetNounou)
	{
		$listingAvis = [];

		$db = $this->dbConnect();
		$req = $db->prepare("SELECT * FROM avis WHERE id_nounou= ? ORDER BY id");
		$req->execute(array($targetNounou->id()));

		while($data = $req->fetch(PDO::FETCH_ASSOC))
		{
			$listingAvis[] = new Avis($data);
		}

		return $listingAvis;
	}

	public function existAvis($avis)
	{
		$db = $this->dbConnect();
		$req = $db->prepare("SELECT * FROM avis WHERE id_nounou= ? AND pseudo_parent= ?");
		$req->execute(array($avis->id_nounou(), $avis->pseudo_parent()));
		$count_req = $req->fetchAll();
		$existAvis = count($count_req);

		return $existAvis;
	}

	public function average($targetNounou)
	{
		$db = $this->dbConnect();
		$req = $db->prepare("SELECT AVG(note) FROM avis WHERE id_nounou= ? ");
		$req->execute(array($targetNounou->id()));
		$noteMoyenne = $req->fetch(PDO::FETCH_ASSOC);

		return $noteMoyenne;
	}
}