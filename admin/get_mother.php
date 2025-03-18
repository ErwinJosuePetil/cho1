<?php
require_once 'db.php'; // Database connection

header('Content-Type: application/json'); // Set response as JSON

if ($_SERVER['REQUEST_METHOD'] === 'POST' && !empty($_POST['id'])) {
    $id = filter_var($_POST['id'], FILTER_SANITIZE_NUMBER_INT); // Sanitize input

    try {
        $stmt = $pdo->prepare("SELECT * FROM mothers WHERE id = ?");
        $stmt->execute([$id]);
        $mother = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($mother) {
            echo json_encode($mother);
        } else {
            echo json_encode(['error' => 'Patient not found.']);
        }
    } catch (PDOException $e) {
        echo json_encode(['error' => 'Database error: ' . $e->getMessage()]);
    }
} else {
    echo json_encode(['error' => 'Invalid request.']);
}
?>
