
<?php
require_once '../database/connexion.php';

// a. Récupérer l'identifiant
$id = $_GET['id'];

// b. Charger les données
$sql = "SELECT * FROM formations WHERE id_formation = :id";
$stmt = $pdo->prepare($sql);
$stmt->execute([':id' => $id]);
$formation = $stmt->fetch(PDO::FETCH_ASSOC);

if (!$formation) {
    die("Formation introuvable !");
}

// d. Modifier les données
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nom = $_POST['nom_formation'];
    $duree = $_POST['duree'];

    $sql = "UPDATE formations
            SET nom_formation = :nom, duree = :duree
            WHERE id_formation = :id";

    $stmt = $pdo->prepare($sql);
    $stmt->execute([
        ':nom' => $nom,
        ':duree' => $duree,
        ':id' => $id
    ]);

    // e. Redirection
    header("Location: index.php");
    exit;
}
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Modifier une formation</title>
</head>
<body>

<h2>Modifier une formation</h2>

<!-- c. Préremplir le formulaire -->
<form method="POST">

    <label>Nom de formation :</label>
    <input type="text" name="nom_formation"
    value="<?= htmlspecialchars($formation['nom_formation']) ?>" required>

    <br><br>

    <label>Durée :</label>
    <input type="text" name="duree"
    value="<?= htmlspecialchars($formation['duree']) ?>" required>

    <br><br>

    <button type="submit">Modifier</button>

</form>

<a href="index.php">Retour à la liste</a>

</body>
</html>
