<?php
require_once '../connexion.php';

$sql = "SELECT etudiants.*, formations.nom_formation
        FROM etudiants
        INNER JOIN formations
        ON etudiants.id_formation = formations.id_formation";

$stmt = $pdo->query($sql);
$etudiants = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Liste des étudiants</title>
</head>
<body>

<h2>Liste des étudiants</h2>

<a href="create.php">Ajouter un étudiant</a>

<br><br>

<table border="1" cellpadding="10">
    <tr>
        <th>ID</th>
        <th>Nom</th>
        <th>Prénom</th>
        <th>Email</th>
        <th>Formation</th>
        <th>Actions</th>
    </tr>

    <?php foreach ($etudiants as $etudiant): ?>
    <tr>
        <td><?= htmlspecialchars($etudiant['id_etudiant']) ?></td>
        <td><?= htmlspecialchars($etudiant['nom']) ?></td>
        <td><?= htmlspecialchars($etudiant['prenom']) ?></td>
        <td><?= htmlspecialchars($etudiant['email']) ?></td>
        <td><?= htmlspecialchars($etudiant['nom_formation']) ?></td>

        <td>
            <a href="edit.php?id=<?= $etudiant['id_etudiant'] ?>">Modifier</a> |

            <a href="delete.php?id=<?= $etudiant['id_etudiant'] ?>"
               onclick="return confirm('Voulez-vous vraiment supprimer cet étudiant ?')">
               Supprimer
            </a>
        </td>
    </tr>
    <?php endforeach; ?>

</table>

</body>
</html>

