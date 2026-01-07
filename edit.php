<?php
include "connexion.php";

$id = $_GET['id'];
$result = $conn->query("SELECT * FROM contacts WHERE id=$id");
$contact = $result->fetch_assoc();

if (isset($_POST['update'])) {
    $nom = $_POST['nom'];
    $tel = $_POST['telephone'];
    $email = $_POST['email'];

    $conn->query("UPDATE contacts SET
        nom='$nom', telephone='$tel', email='$email'
        WHERE id=$id");

    header("Location: index.php");
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Modifier</title>
    <link rel="stylesheet"
     href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
</head>
<body class="container mt-5">

<h3>Modifier contact</h3>

<form method="POST">
    <input type="text" name="nom" value="<?= $contact['nom'] ?>" class="form-control mb-2">
    <input type="text" name="telephone" value="<?= $contact['telephone'] ?>" class="form-control mb-2">
    <input type="email" name="email" value="<?= $contact['email'] ?>" class="form-control mb-2">
    <button name="update" class="btn btn-success">Modifier</button>
</form>

</body>
</html>
