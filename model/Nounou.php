<?php

class Nounou
{
	private $_id;
	private $_pseudo;
	private $_nom;
	private $_prenom;
	private $_email;
	private $_password;
	private $_experience;
	private $_place_dispo;
	private $_ville;
	private $_departement;
	private $_signalement;

	public function __construct(array $data)
	{
		if(isset($data['id'])) {
			$this->setId($data['id']);
		}
		if(isset($data['pseudo'])) {
			$this->setPseudo($data['pseudo']);
		}
		if(isset($data['nom'])) {
			$this->setNom($data['nom']);
		}
		if(isset($data['prenom'])) {
			$this->setPrenom($data['prenom']);
		}
		if(isset($data['email'])) {
			$this->setEmail($data['email']);
		}
		if(isset($data['password'])) {
			$this->setPassword($data['password']);
		}
		if(isset($data['experience'])) {
			$this->setExperience($data['experience']);
		}
		if(isset($data['place_dispo'])) {
			$this->setPlace_dispo($data['place_dispo']);
		}
		if(isset($data['ville'])) {
			$this->setVille($data['ville']);
		}
		if(isset($data['departement'])) {
			$this->setDepartement($data['departement']);
		}
		if(isset($data['signalement'])) {
			$this->setSignalement($data['signalement']);
		}
	}

	//setters

	public function setId($id)
	{
		$id = (int) $id;
		if ($id > 0) {
			$this->_id = $id;
		}
	}

	public function setPseudo($pseudo)
	{
		if (is_string($pseudo)) {
			$this->_pseudo = $pseudo;
		}
	}

	public function setNom($nom)
	{
		if (is_string($nom)) {
			$this->_nom = $nom;
		}
	}

	public function setPrenom($prenom)
	{
		if (is_string($prenom)) {
			$this->_prenom = $prenom;
		}
	}

	public function setEmail($email)
	{
		if (is_string($email)) {
			$this->_email = $email;
		}
	}

	public function setPassword($password)
	{
		if (is_string($password)) {
			$this->_password = $password;
		}
	}

	public function setExperience($experience)
	{
		$experience = (int) $experience;
		if ($experience > 0) {
			$this->_experience = $experience;
		}
	}

	public function setPlace_dispo($place_dispo)
	{
		$place_dispo = (int) $place_dispo;
		if ($place_dispo > 0) {
			$this->_place_dispo = $place_dispo;
		}
	}

	public function setVille($ville)
	{
		if (is_string($ville)) {
			$this->_ville = $ville;
		}
	}

	public function setDepartement($departement)
	{
		$departement = (int) $departement;
		if ($departement > 0) {
			$this->_departement = $departement;
		}
	}

	public function setSignalement($signalement)
	{
		$signalement = (int) $signalement;
		if ($signalement >= 0) {
			$this->_signalement = $signalement;
		}
	}


//getters

	public function id()
	{
		return $this->_id;
	}
	public function pseudo()
	{
		return $this->_pseudo;
	}
	public function nom()
	{
		return $this->_nom;
	}
	public function prenom()
	{
		return $this->_prenom;
	}
	public function email()
	{
		return $this->_email;
	}
	public function password()
	{
		return $this->_password;
	}
	public function experience()
	{
		return $this->_experience;
	}
	public function place_dispo()
	{
		return $this->_place_dispo;
	}
	public function ville()
	{
		return $this->_ville;
	}
	public function departement()
	{
		return $this->_departement;
	}
	public function signalement()
	{
		return $this->_signalement;
	}
}