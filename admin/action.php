<?php
// Include the database connection
require_once 'db.php';

// Check if the form was submitted
if (isset($_POST['add_patient'])) {
    // Get the form data
    $firstname = $_POST['firstname'];
    $middlename = $_POST['middlename'] ?? ''; // Handle case where middle name is optional
    $lastname = $_POST['lastname'];
    $birthdate = $_POST['birthdate'];
    $birthplace = $_POST['birthplace'];
    $sex = $_POST['sex'] ?? 'Female'; // Default to Female if not set
    $admission_date = $_POST['admission_date'];
    $discharge_date = $_POST['discharge_date'] ?? ''; // Optional field
    $complications = $_POST['complications'] ?? ''; // Optional field

    try {
        // Prepare the SQL query to insert data into the Mothers table
        $sql = "INSERT INTO Mothers (firstname, middlename, lastname, birthdate, birthplace, sex, admission_date, discharge_date, complications)
                VALUES (:firstname, :middlename, :lastname, :birthdate, :birthplace, :sex, :admission_date, :discharge_date, :complications)";
        
        // Prepare the statement
        $stmt = $pdo->prepare($sql);

        // Bind the form data to the prepared statement
        $stmt->bindParam(':firstname', $firstname);
        $stmt->bindParam(':middlename', $middlename);
        $stmt->bindParam(':lastname', $lastname);
        $stmt->bindParam(':birthdate', $birthdate);
        $stmt->bindParam(':birthplace', $birthplace);
        $stmt->bindParam(':sex', $sex);
        $stmt->bindParam(':admission_date', $admission_date);
        $stmt->bindParam(':discharge_date', $discharge_date);
        $stmt->bindParam(':complications', $complications);

        // Execute the statement
        $stmt->execute();

        // Redirect or show a success message
        echo "New patient added successfully!";
        header("Location: patient.php"); // Replace with your success page URL
        exit();
    } catch (PDOException $e) {
        // Handle error if the insertion fails
        echo "Error: " . $e->getMessage();
    }
}
?>
