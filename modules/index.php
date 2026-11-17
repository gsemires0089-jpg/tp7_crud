
<?php
require_once '../connexion.php';

$sql = "SELECT modules.*, formations.nom_formation
        FROM modules
        INNER JOIN formations
        ON modules.id_formation = formations.id_formation";

$stmt = $pdo->query($sql);
$modules = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Liste des modules</title>
</head>
<body>

<h2>Liste des modules</h2>

<a href="create.php">Ajouter un module</a>

<br><br>

<table border="1" cellpadding="10">
    <tr>
        <th>ID</th>
        <th>Nom du module</th>
        <th>Coefficient</th>
        <th>Formation</th>
        <th>Actions</th>
    </tr>

    <?php foreach ($modules as $module): ?>
    <tr>
        <td><?= htmlspecialchars($module['id_module']) ?></td>
        <td><?= htmlspecialchars($module['nom_module']) ?></td>
        <td><?= htmlspecialchars($module['coefficient']) ?></td>
        <td><?= htmlspecialchars($module['nom_formation']) ?></td>

        <td>
            <a href="edit.php?id=<?= $module['id_module'] ?>">Modifier</a> |

            <a href="delete.php?id=<?= $module['id_module'] ?>"
               onclick="return confirm('Voulez-vous vraiment supprimer ce module ?')">
               Supprimer
            </a>
        </td>
    </tr>
    <?php endforeach; ?>

</table>

</body>
</html>

