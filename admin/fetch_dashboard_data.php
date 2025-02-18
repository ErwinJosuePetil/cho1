<?php
require 'db.php'; // Include the database connection

// Fetch total patient records
$query = $pdo->query("SELECT COUNT(*) as total_patients FROM mothers");
$total_patients = $query->fetch(PDO::FETCH_ASSOC)['total_patients'];

// Fetch annual patient count (admitted this year)
$current_year = date('Y');
$query = $pdo->query("SELECT COUNT(*) as annual_patients FROM mothers WHERE YEAR(admission_date) = $current_year");
$annual_patients = $query->fetch(PDO::FETCH_ASSOC)['annual_patients'];

// Fetch tasks percentage (completed medical records vs total)
$query = $pdo->query("SELECT COUNT(*) as total_records FROM medical_records");
$total_records = $query->fetch(PDO::FETCH_ASSOC)['total_records'];

$query = $pdo->query("SELECT COUNT(*) as completed_tasks FROM medical_records WHERE notes IS NOT NULL AND notes != ''");
$completed_tasks = $query->fetch(PDO::FETCH_ASSOC)['completed_tasks'];

$task_percentage = ($total_records > 0) ? round(($completed_tasks / $total_records) * 100) : 0;

// Fetch pending requests (example: unreviewed medical records)
$query = $pdo->query("SELECT COUNT(*) as pending_requests FROM medical_records WHERE notes IS NULL OR notes = ''");
$pending_requests = $query->fetch(PDO::FETCH_ASSOC)['pending_requests'];

// Store fetched data in an associative array
$dashboard_data = [
    'total_patients' => $total_patients,
    'annual_patients' => $annual_patients,
    'task_percentage' => $task_percentage,
    'pending_requests' => $pending_requests
];

// Return data as JSON
header('Content-Type: application/json');
echo json_encode($dashboard_data);
?>
