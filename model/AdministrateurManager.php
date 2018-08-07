<?php
require_once("model/Database.php");

class AdministrateurManager extends Database 
{
	//contrôle le mdp en fonction du pseudo
	public function accessAdministrateur($administrateur)
	{
		$db = $this->dbConnect();
		$req = $db->prepare("SELECT * FROM administrateurs WHERE pseudo= ?");
		$req->execute(array($administrateur->pseudo()));

		$administrateurOnFile = $req->fetch(PDO::FETCH_ASSOC);

		if($administrateurOnFile !== false) {
			return new Administrateur($administrateurOnFile);
		}
	}
}