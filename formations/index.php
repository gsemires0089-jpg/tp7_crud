
<?php
require_once '../connexion.php';

$sql = "SELECT * FROM formations";
$stmt = $pdo->query($sql);

$formations = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Liste des formations</title>
</head>
<body>

<h2>Liste des formations</h2>

<table border="1" cellpadding="10">
    <tr>
        <th>ID</th>
        <th>Nom formation</th>
        <th>Durée</th>
        <th>Actions</th>
    </tr>

    <?php foreach ($formations as $formation): ?>
    <tr>
        <td><?= htmlspecialchars($formation['id_formation']) ?></td>
        <td><?= htmlspecialchars($formation['nom_formation']) ?></td>
        <td><?= htmlspecialchars($formation['duree']) ?></td>
        <td>
            <a href="edit.php?id=<?= $formation['id_formation'] ?>">Modifier</a> |
            <a href="delete.php?id=<?= $formation['id_formation'] ?>"
             onclick="return confirm('Voulez-vous vraiment supprimer cette formation ?')">Supprimer</a>
        </td>
    </tr>
    <?php endforeach; ?>

</table>

</body>
</html>
