<?php
include "connexion.php";

// Ajouter
if (isset($_POST['ajouter'])) {
    $nom = $_POST['nom'];
    $tel = $_POST['telephone'];
    $email = $_POST['email'];

    if (!empty($nom) && !empty($tel) && !empty($email)) {
        $sql = "INSERT INTO contacts (nom, telephone, email)
                VALUES ('$nom', '$tel', '$email')";
        $conn->query($sql);
    }
}

// Supprimer
if (isset($_GET['delete'])) {
    $id = $_GET['delete'];
    $conn->query("DELETE FROM contacts WHERE id=$id");
}

$contacts = $conn->query("SELECT * FROM contacts");
?>

<!DOCTYPE html>
<html>
<head>
    <title>Mini CRUD</title>
    <link rel="stylesheet"
     href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
</head>
<body class="container mt-5">

<h3>Gestion des contacts</h3>

<form method="POST" class="mb-4">
    <input type="text" name="nom" placeholder="Nom" class="form-control mb-2">
    <input type="text" name="telephone" placeholder="Téléphone" class="form-control mb-2">
    <input type="email" name="email" placeholder="Email" class="form-control mb-2">
    <button name="ajouter" class="btn btn-primary">Ajouter</button>
</form>

<table class="table table-bordered">
<tr>
    <th>Nom</th>
    <th>Téléphone</th>
    <th>Email</th>
    <th>Action</th>
</tr>

<?php while($row = $contacts->fetch_assoc()) { ?>
<tr>
    <td><?= $row['nom'] ?></td>
    <td><?= $row['telephone'] ?></td>
    <td><?= $row['email'] ?></td>
    <td>
        <a href="edit.php?id=<?= $row['id'] ?>" class="btn btn-warning btn-sm">Modifier</a>
        <a href="?delete=<?= $row['id'] ?>" class="btn btn-danger btn-sm">Supprimer</a>
    </td>
</tr>
<?php } ?>
</table>

</body>
</html>
