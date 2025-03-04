<?php
require_once 'db.php'; // Ensure this file contains a valid database connection

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['id'])) {
    $id = intval($_POST['id']);
    $firstname = $_POST['firstname'];
    $middlename = $_POST['middlename'];
    $lastname = $_POST['lastname'];
    $birthdate = $_POST['birthdate'];
    $birthplace = $_POST['birthplace'];
    $address = $_POST['address'];
    $contact_number = $_POST['contact_number'];
    $admission_date = $_POST['admission_date'];
    $discharge_date = $_POST['discharge_date'];
    $complications = $_POST['complications'];

    // Prepare SQL update query
    $sql = "UPDATE mothers SET 
                firstname = ?, 
                middlename = ?, 
                lastname = ?, 
                birthdate = ?, 
                birthplace = ?, 
                address = ?, 
                contact_number = ?, 
                admission_date = ?, 
                discharge_date = ?, 
                complications = ? 
            WHERE id = ?";

    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssssssssssi", $firstname, $middlename, $lastname, $birthdate, $birthplace, $address, $contact_number, $admission_date, $discharge_date, $complications, $id);

    if ($stmt->execute()) {
        echo json_encode(["success" => true, "message" => "Mother's information updated successfully."]);
    } else {
        echo json_encode(["success" => false, "message" => "Update failed."]);
    }
} else {
    echo json_encode(["success" => false, "message" => "Invalid request."]);
}
?>
