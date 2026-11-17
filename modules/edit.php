
<?php
require_once '../database/connexion.php';

$id = $_GET['id'];

$sql = "SELECT * FROM modules WHERE id_module = :id";
$stmt = $pdo->prepare($sql);
$stmt->execute([':id' => $id]);
$module = $stmt->fetch(PDO::FETCH_ASSOC);

if (!$module) {
    die("Module introuvable !");
}

$sql = "SELECT * FROM formations";
$stmt = $pdo->query($sql);
$formations = $stmt->fetchAll(PDO::FETCH_ASSOC);

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $nom_module = $_POST['nom_module'];
    $coefficient = $_POST['coefficient'];
    $id_formation = $_POST['id_formation'];

    $sql = "UPDATE modules
            SET nom_module = :nom_module,
                coefficient = :coefficient,
                id_formation = :id_formation
            WHERE id_module = :id";

    $stmt = $pdo->prepare($sql);

    $stmt->execute([
        ':nom_module' => $nom_module,
        ':coefficient' => $coefficient,
        ':id_formation' => $id_formation,
        ':id' => $id
    ]);

    header("Location: index.php");
    exit;
}
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Modifier un module</title>
</head>
<body>

<h2>Modifier un module</h2>

<form method="POST">

    <label>Nom du module :</label>
    <input type="text" name="nom_module"
           value="<?= htmlspecialchars($module['nom_module']) ?>" required>
    <br><br>

    <label>Coefficient :</label>
    <input type="number" name="coefficient" step="0.01"
           value="<?= htmlspecialchars($module['coefficient']) ?>" required>
    <br><br>

    <label>Formation :</label>

    <select name="id_formation" required>

        <?php foreach ($formations as $formation): ?>
            <option value="<?= $formation['id_formation'] ?>"
                <?= ($formation['id_formation'] == $module['id_formation']) ? 'selected' : '' ?>>
                <?= htmlspecialchars($formation['nom_formation']) ?>
            </option>
        <?php endforeach; ?>

    </select>

    <br><br>

    <button type="submit">Modifier</button>

</form>

<br>
<a href="index.php">Retour à la liste</a>

</body>
</html>
