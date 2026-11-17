
<?php
require_once '../connexion.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $nom = $_POST['nom_formation'];
    $duree = $_POST['duree'];

    $sql = "INSERT INTO formations (nom_formation, duree)
            VALUES (:nom, :duree)";

    $stmt = $pdo->prepare($sql);

    $stmt->execute([
        ':nom' => $nom,
        ':duree' => $duree
    ]);

    header("Location: index.php");
    exit;
}
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Ajouter une formation</title>
</head>
<body>

<h2>Ajouter une formation</h2>

<form method="POST">

    <label>Nom de formation :</label>
    <input type="text" name="nom_formation" required>
    <br><br>

    <label>Durée :</label>
    <input type="text" name="duree" required>
    <br><br>

    <button type="submit">Ajouter</button>

</form>

<a href="index.php">Retour à la liste</a>

</body>
</html>
