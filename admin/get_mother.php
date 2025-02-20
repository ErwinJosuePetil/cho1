<?php
require_once 'db.php'; // Database connection

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['id'])) {
    $id = $_POST['id'];
    $stmt = $pdo->prepare("SELECT * FROM mothers WHERE id = ?");
    $stmt->execute([$id]);
    $mother = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($mother) {
        echo json_encode($mother);
    } else {
        echo json_encode(['error' => 'Patient not found.']);
    }
}
?>
