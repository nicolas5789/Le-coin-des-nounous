<?php

class Avis
{
	private $_id;
	private $_id_nounou;
	private $_pseudo_parent;
	private $_note;
	private $_contenu;
	private $_signalement;
	
	public function __construct(array $data)
	{
		if(isset($data['id'])) {
			$this->setId($data['id']);
		}
		if(isset($data['id_nounou'])) {
			$this->setId_nounou($data['id_nounou']);
		}
		if(isset($data['pseudo_parent'])) {
			$this->setPseudo_parent($data['pseudo_parent']);
		}
		if(isset($data['note'])) {
			$this->setNote($data['note']);
		}
		if(isset($data['contenu'])) {
			$this->setContenu($data['contenu']);
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

	public function setId_nounou($id_nounou)
	{
		$id_nounou = (int) $id_nounou;
		if ($id_nounou > 0) {
			$this->_id_nounou = $id_nounou;
		}
	}

	public function setPseudo_parent($pseudo_parent)
	{
		if (is_string($pseudo_parent)) {
			$this->_pseudo_parent = $pseudo_parent;
		}
	}

	public function setNote($note)
	{
		$note = (int) $note;
		if ($note > 0) {
			$this->_note = $note;
		}
	}

	public function setContenu($contenu)
	{
		if (is_string($contenu)) {
			$this->_contenu = $contenu;
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
	public function id_nounou()
	{
		return $this->_id_nounou;
	}
	public function pseudo_parent()
	{
		return $this->_pseudo_parent;
	}
	public function note()
	{
		return $this->_note;
	}
	public function contenu()
	{
		return $this->_contenu;
	}
	public function signalement()
	{
		return $this->_signalement;
	}
}