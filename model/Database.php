<?php

class Database 
{
	//connexion à la bdd
	protected function dbConnect()
	{
		try
		{
			$db = new PDO("mysql:host=localhost;dbname=le_coin_des_nounous;charset=utf8", "root", "root"); //LOCAL
			//$bdd = new PDO("mysql:host=localhost;dbname=*******;charset=utf8", "******", "******"); //EN LIGNE
			return $db;
		}
		//affichage si erreur
		catch(Exception $e)
		{
			die("Erreur : " . $e->getMessages());
		}
	}
}