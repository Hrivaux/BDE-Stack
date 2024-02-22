<?php

class DatabaseConnection {
    private $host;
    private $dbname;
    private $username;
    private $password;
    private $pdo;

    public function __construct($host, $dbname, $username, $password) {
        $this->host = $host;
        $this->dbname = $dbname;
        $this->username = $username;
        $this->password = $password;
    }

    public function connect() {
        try {
            $this->pdo = new PDO('mysql:host=' . $this->host . ';dbname=' . $this->dbname, $this->username, $this->password);
            $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $this->pdo->exec("SET CHARACTER SET utf8");
            return $this->pdo;
        } catch (PDOException $e) {
            die('Erreur : ' . $e->getMessage());
        }
    }

    public function disconnect() {
        $this->pdo = null;
    }
}

// Utilisation :
$database = new DatabaseConnection('mysql-hubin.alwaysdata.net', 'hubin_bde', 'hubin', 'HubinSQL2022!');
$bdd = $database->connect();

// Utilisez $bdd pour exécuter vos requêtes
// Par exemple : $bdd->query('SELECT * FROM ma_table');

// Après avoir terminé, vous pouvez déconnecter la base de données
// $database->disconnect();
