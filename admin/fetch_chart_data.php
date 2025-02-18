<?php
include 'db.php'; // Include your database connection

// Query to fetch patient records count
$stmt = $pdo->query("SELECT COUNT(*) AS total_patients FROM mothers");
$totalPatients = $stmt->fetch(PDO::FETCH_ASSOC)['total_patients'];

// Query to fetch staff count
$stmt = $pdo->query("SELECT COUNT(*) AS total_staff FROM medical_staff");
$totalStaff = $stmt->fetch(PDO::FETCH_ASSOC)['total_staff'];

// Query to fetch babies count
$stmt = $pdo->query("SELECT COUNT(*) AS total_babies FROM babies");
$totalBabies = $stmt->fetch(PDO::FETCH_ASSOC)['total_babies'];

// Encode the data as JSON and return
echo json_encode([
    'patients' => $totalPatients,
    'staff' => $totalStaff,
    'babies' => $totalBabies
]);
?>
