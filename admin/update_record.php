<?php
require 'db.php'; // Ensure database connection

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST['id'] ?? null;

    if (!empty($id)) {
        $sql = "UPDATE mothers SET 
            firstname = :firstname, 
            middlename = :middlename, 
            lastname = :lastname, 
            birthdate = :birthdate, 
            birthplace = :birthplace, 
            sex = 'Female', -- Automatically setting to Female
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
            ':firstname' => $_POST['firstname'],
            ':middlename' => $_POST['middlename'],
            ':lastname' => $_POST['lastname'],
            ':birthdate' => $_POST['birthdate'],
            ':birthplace' => $_POST['birthplace'],
            ':gestational_age' => $_POST['gestational_age'],
            ':due_date' => $_POST['due_date'],
            ':prenatal_visit' => $_POST['prenatal_visit'],
            ':last_menstrual_period' => $_POST['last_menstrual_period'],
            ':pregnancy_status' => $_POST['pregnancy_status'],
            ':admission_date' => $_POST['admission_date'],
            ':discharge_date' => $_POST['discharge_date'],
            ':complications' => $_POST['complications'],
            ':id' => $id
        ]);

        if ($success) {
            if (isset($_POST['ajax'])) {
                echo json_encode(["success" => true, "message" => "Patient record updated successfully!"]);
            } else {
                echo "<script>
                    alert('Patient record updated successfully!');
                    window.location.href='records.php';
                </script>";
            }
        } else {
            if (isset($_POST['ajax'])) {
                echo json_encode(["success" => false, "message" => "Update failed."]);
            } else {
                echo "<script>
                    alert('Update failed!');
                    window.history.back();
                </script>";
            }
        }
    } else {
        if (isset($_POST['ajax'])) {
            echo json_encode(["success" => false, "message" => "Invalid ID!"]);
        } else {
            echo "<script>
                alert('Invalid ID!');
                window.history.back();
            </script>";
        }
    }
} else {
    if (isset($_POST['ajax'])) {
        echo json_encode(["success" => false, "message" => "Invalid request method."]);
    } else {
        echo "<script>
            alert('Invalid request method.');
            window.history.back();
        </script>";
    }
}
exit;
?>
