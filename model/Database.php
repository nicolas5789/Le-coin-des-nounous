<?php

class Database
{
	private $pdo;

    // Connexion à la bdd
    protected function dbConnect()
    {
        if ($this->pdo === null) {
            try {
                $pdo = new PDO("mysql:host=localhost;dbname=le_coin_des_nounous;charset=utf8", "root", "root"); //LOCAL
                //$pdo = new PDO("mysql:host=localhost;dbname=sailqbhx_lecoindesnounous;charset=utf8", "sailqbhx_admin", "boeing747"); //EN LIGNE
                $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

                $this->pdo = $pdo;

            } catch (PDOException $e) {
                echo "Base de donnée indisponible </br> <a href='index.php?action=home'>Retourner à l'accueil</a> </br>";
				die("Erreur : " . $e->getMessage());
            }
        }
        return $this->pdo;
    }
    
}

