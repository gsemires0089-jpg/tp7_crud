
<?php
require_once '../database/connexion.php';

// a. Récupérer l'identifiant
$id = $_GET['id'];

// b et c. Préparer et exécuter DELETE avec WHERE
$sql = "DELETE FROM etudiants WHERE id_etudiant = :id";

$stmt = $pdo->prepare($sql);

$stmt->execute([
    ':id' => $id
]);

// d. Rediriger vers la liste
header("Location: index.php");
exit;
?>
