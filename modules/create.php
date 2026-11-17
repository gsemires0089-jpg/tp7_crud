
<?php
require_once '../connexion.php';

$sql = "SELECT * FROM formations";
$stmt = $pdo->query($sql);
$formations = $stmt->fetchAll(PDO::FETCH_ASSOC);

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $nom_module = $_POST['nom_module'];
    $coefficient = $_POST['coefficient'];
    $id_formation = $_POST['id_formation'];

    $sql = "INSERT INTO modules
            (nom_module, coefficient, id_formation)
            VALUES (:nom_module, :coefficient, :id_formation)";

    $stmt = $pdo->prepare($sql);

    $stmt->execute([
        ':nom_module' => $nom_module,
        ':coefficient' => $coefficient,
        ':id_formation' => $id_formation
    ]);

    header("Location: index.php");
    exit;
}
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Ajouter un module</title>
</head>
<body>

<h2>Ajouter un module</h2>

<form method="POST">

    <label>Nom du module :</label>
    <input type="text" name="nom_module" required>
    <br><br>

    <label>Coefficient :</label>
    <input type="number" name="coefficient" step="0.01" required>
    <br><br>

    <label>Formation :</label>

    <select name="id_formation" required>
        <option value="">Choisir une formation</option>

        <?php foreach ($formations as $formation): ?>
            <option value="<?= $formation['id_formation'] ?>">
                <?= htmlspecialchars($formation['nom_formation']) ?>
            </option>
        <?php endforeach; ?>

    </select>

    <br><br>

    <button type="submit">Ajouter</button>

</form>

<br>
<a href="index.php">Retour à la liste</a>

</body>
</html>
