<?php
require_once("model/Database.php");

class AvisManager extends Database 
{
	public function newAvis($avis) 
	{
		$id_nounouSafe = htmlspecialchars($avis->id_nounou());
		$pseudo_parentSafe = htmlspecialchars($avis->pseudo_parent());
		$noteSafe = htmlspecialchars($avis->note());
		$contenuSafe = htmlspecialchars($avis->contenu());

		$db = $this->dbConnect();
		$req = $db->prepare("INSERT INTO avis(id_nounou, pseudo_parent, note, contenu) VALUES(?, ?, ?, ?) ");
		$req->execute(array($id_nounouSafe, $pseudo_parentSafe, $noteSafe, $contenuSafe));
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

	public function average($targetNounou)
	{
		$db = $this->dbConnect();
		$req = $db->prepare("SELECT AVG(note) FROM avis WHERE id_nounou= ? ");
		$req->execute(array($targetNounou->id()));
		$noteMoyenne = $req->fetch(PDO::FETCH_ASSOC);

		return $noteMoyenne;
	}
}