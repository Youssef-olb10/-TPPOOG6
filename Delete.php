<?php
include('connection.php');

if ($_SERVER['REQUEST_METHOD'] == 'GET') {

    if (isset($_GET['id']) && is_numeric($_GET['id'])) {
        $id = $_GET['id'];

        $conn = new Connection();
        $conn->selectDatabase("chapitre4db");

        include('client.php');

        
        $deleteSuccess = Client::deleteClient("Clients", $conn->connexion, $id);

        
        if ($deleteSuccess) {
            echo "<script>alert('Client deleted successfully!'); window.location.href = 'read.php';</script>";
        } else {
            echo "<script>alert('Error deleting client.'); window.location.href = 'read.php';</script>";
        }
    } else {
        echo "<script>alert('Invalid ID.'); window.location.href = 'read.php';</script>";
    }
}
?>
