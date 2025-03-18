<?php
require_once 'db.php';
require_once 'functions.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $mother_id = $_POST['mother_id'];
    $status = $_POST['status'];
    $expected_delivery_date = $_POST['expected_delivery_date'];
    $last_checkup = $_POST['last_checkup'];
    $complications = $_POST['complications'];

    $sql = "INSERT INTO pregnancies (mother_id, status, expected_delivery_date, last_checkup, complications) 
            VALUES ('$mother_id', '$status', '$expected_delivery_date', '$last_checkup', '$complications')";
    
    if (mysqli_query($conn, $sql)) {
        header("Location: pregnancy.php?success=1");
        exit();
    } else {
        echo "Error: " . mysqli_error($conn);
    }
}

// Fetch mothers for dropdown
$mothers = get_mothers();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Add Pregnancy Record</title>
</head>
<body>
    <h2>Add Pregnancy Record</h2>
    <form method="POST" action="">
        <label>Mother:</label>
        <select name="mother_id" required>
            <?php foreach ($mothers as $mother) { ?>
                <option value="<?= $mother['id'] ?>"><?= $mother['firstname'] . ' ' . $mother['lastname'] ?></option>
            <?php } ?>
        </select><br>

        <label>Pregnancy Status:</label>
        <input type="text" name="status" required><br>

        <label>Expected Delivery Date:</label>
        <input type="date" name="expected_delivery_date" required><br>

        <label>Last Check-up:</label>
        <input type="date" name="last_checkup" required><br>

        <label>Complications:</label>
        <input type="text" name="complications"><br>

        <button type="submit">Add Record</button>
    </form>
</body>
</html>
