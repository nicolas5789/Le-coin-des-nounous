<?php

class Administrateur
{
	private $_id;
	private $_pseudo;
	private $_password;

	public function __construct(array $data)
	{
		if(isset($data['id'])) {
			$this->setId($data['id']);
		}
		if(isset($data['pseudo'])) {
			$this->setPseudo($data['pseudo']);
		}
		if(isset($data['password'])) {
			$this->setPassword($data['password']);
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

	public function setPassword($password)
	{
		if (is_string($password)) {
			$this->_password = $password;
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
	public function password()
	{
		return $this->_password;
	}
}