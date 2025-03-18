<?php
require 'db.php'; // Database connection

header('Content-Type: application/json'); // Ensure JSON responses for AJAX

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $id = filter_var($_POST['id'] ?? null, FILTER_VALIDATE_INT);

    if (!$id) {
        echo json_encode(["success" => false, "message" => "Invalid ID!"]);
        exit;
    }

    try {
        // Prepare SQL statement
        $sql = "UPDATE mothers SET 
            firstname = :firstname, 
            middlename = :middlename, 
            lastname = :lastname, 
            birthdate = :birthdate, 
            birthplace = :birthplace, 
            sex = 'Female', -- Automatically set to Female
            gestational_age = :gestational_age, 
            due_date = :due_date, 
            prenatal_visit = :prenatal_visit, 
            last_menstrual_period = :last_menstrual_period, 
            pregnancy_status = :pregnancy_status, 
            admission_date = :admission_date, 
            discharge_date = :discharge_date, 
            complications = :complications
            WHERE id = :id";

        $stmt = $pdo->prepare($sql);
        $success = $stmt->execute([
            ':firstname' => trim($_POST['firstname']),
            ':middlename' => trim($_POST['middlename']),
            ':lastname' => trim($_POST['lastname']),
            ':birthdate' => $_POST['birthdate'],
            ':birthplace' => trim($_POST['birthplace']),
            ':gestational_age' => filter_var($_POST['gestational_age'], FILTER_SANITIZE_NUMBER_INT),
            ':due_date' => $_POST['due_date'],
            ':prenatal_visit' => filter_var($_POST['prenatal_visit'], FILTER_SANITIZE_NUMBER_INT),
            ':last_menstrual_period' => $_POST['last_menstrual_period'],
            ':pregnancy_status' => trim($_POST['pregnancy_status']),
            ':admission_date' => $_POST['admission_date'],
            ':discharge_date' => $_POST['discharge_date'],
            ':complications' => trim($_POST['complications']),
            ':id' => $id
        ]);

        if ($success) {
            echo json_encode(["success" => true, "message" => "Patient record updated successfully!"]);
        } else {
            echo json_encode(["success" => false, "message" => "Update failed."]);
        }
    } catch (PDOException $e) {
        echo json_encode(["success" => false, "message" => "Database error: " . $e->getMessage()]);
    }
} else {
    echo json_encode(["success" => false, "message" => "Invalid request method."]);
}
exit;
?>
