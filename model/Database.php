<?php

class Database 
{

	//connexion à la bdd
	protected function dbConnect()
	{
		try
		{
			$db = new PDO("mysql:host=localhost;dbname=le_coin_des_nounous;charset=utf8", "root", "root"); //LOCAL
			//$db = new PDO("mysql:host=localhost;dbname=sailqbhx_lecoindesnounous;charset=utf8", "sailqbhx_admin", "boeing747"); //EN LIGNE
			//var_dump($db);
			return $db;
		}
		//affichage si erreur
		catch(Exception $e)
		{
			die("Erreur : " . $e->getMessages());
		}
	}


}