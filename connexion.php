<?php
$conn = new mysqli("localhost", "root", "", "mini_crud");

if ($conn->connect_error) {
    die("Connexion échouée : " . $conn->connect_error);
}
?>
