<?php
require_once("model/Database.php");

class NounouManager extends Database 
{
	//ajout d'une nounou (CREATE)
	public function newNounou()
	{
		//passage en safe des var

		//connexion à la bdd
		//req
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

	//affichage du profil d'une nounou
	public function getNounou($targetNounou)
	{
		$db = $this->dbConnect();
		$req = $db->prepare("SELECT * FROM nounous WHERE id= ?");
		$req->execute(array($targetNounou->id()));

		$nounou = $req->fetch(PDO::FETCH_ASSOC);

		return new Nounou($nounou);
	}

	//modifier un profil de nounou (UPDATE)
	public function editNounou()
	{
		//idem que new en update avec un id d'objet en param	
	}

	//supprimer le profil d'une nounou (DELETE)
	public function deleteNounou()
	{
		//
	}
}