<?php
require_once("model/Database.php");

class ParentManager extends Database 
{
	public function newParent()
	{
		//CREATE
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
}