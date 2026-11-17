
<?php
require_once '../database/connexion.php';

// a. Récupérer l'identifiant
$id = $_GET['id'];

// Vérifier les relations avec les étudiants
$sql = "SELECT COUNT(*) FROM etudiants WHERE id_formation = :id";
$stmt = $pdo->prepare($sql);
$stmt->execute([':id' => $id]);
$nb_etudiants = $stmt->fetchColumn();

// Vérifier les relations avec les modules
$sql = "SELECT COUNT(*) FROM modules WHERE id_formation = :id";
$stmt = $pdo->prepare($sql);
$stmt->execute([':id' => $id]);
$nb_modules = $stmt->fetchColumn();

// Vérifier avant suppression
if ($nb_etudiants > 0 || $nb_modules > 0) {
    die("Impossible de supprimer cette formation : elle est liée à des étudiants ou des modules.");
}

// b et c. DELETE avec WHERE
$sql = "DELETE FROM formations WHERE id_formation = :id";
$stmt = $pdo->prepare($sql);
$stmt->execute([':id' => $id]);

// d. Redirection
header("Location: index.php");
exit;
?>
