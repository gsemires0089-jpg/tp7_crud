
<?php
require_once '../connexion.php';

// a. Récupérer l'identifiant
$id = $_GET['id'];

// b et c. Préparer DELETE avec WHERE
$sql = "DELETE FROM modules WHERE id_module = :id";

$stmt = $pdo->prepare($sql);

$stmt->execute([
    ':id' => $id
]);

// d. Redirection
header("Location: index.php");
exit;
?>
