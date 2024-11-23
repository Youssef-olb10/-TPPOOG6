<?php
class Connection {
    private $servername = "localhost";
    private $username = "root";
    private $password = "";
    public $connexion;

    public function __construct() {
        $this->connexion = mysqli_connect($this->servername, $this->username, $this->password);

        if (!$this->connexion) {
            die('ERROR: ' . mysqli_connect_error());
        }
    }

    function createDatabase($dbName) {
        // Crée la base de données si elle n'existe pas
        $sql = "CREATE DATABASE IF NOT EXISTS $dbName";
        if (mysqli_query($this->connexion, $sql)) {
            echo "Database '$dbName' created successfully.<br>";
        } else {
            echo "Error creating database: " . mysqli_error($this->connexion) . "<br>";
        }
    }

    function selectDatabase($dbName) {
        // Sélectionne la base de données
        if (!mysqli_select_db($this->connexion, $dbName)) {
            echo "Error selecting database: " . mysqli_error($this->connexion) . "<br>";
        }
    }

    function createTable($query) {
        // Crée la table Clients si elle n'existe pas
        if (mysqli_query($this->connexion, $query)) {
            echo "Table Clients created successfully<br>";
        } else {
            echo "Error creating table: " . mysqli_error($this->connexion) . "<br>";
        }
    }
}
?>
