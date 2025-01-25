<?php
// Set the upload directory
$uploadDir = 'uploads/'; // Base upload directory

// Get user identifier (you can replace it with a session variable or anything else)
$userIdentifier = $_GET['id']; // Replace with dynamic user identifier

// Create the user's folder if it doesn't exist
$userFolder = $uploadDir . $userIdentifier;
if (!file_exists($userFolder)) {
    mkdir($userFolder, 0777, true); // Create folder with appropriate permissions
}

// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_FILES['fileToUpload'])) {
    // Get selected category
    $category = $_POST['category'];
    
    // Get the original filename and create a safe version of the filename
    $originalFileName = basename($_FILES['fileToUpload']['name']);
    $fileExtension = pathinfo($originalFileName, PATHINFO_EXTENSION); // Get file extension
    
    // Generate a new file name using the category and a timestamp
    $newFileName = $category . '-' . date('m-d-y') . '.' . $fileExtension;
    $targetFilePath = $userFolder . '/' . $newFileName;

    // Check if there are any upload errors
    if ($_FILES['fileToUpload']['error'] !== UPLOAD_ERR_OK) {
        echo 'Error during file upload: ' . $_FILES['fileToUpload']['error'];
        exit;
    }

    // Check if file is an actual file
    if (is_uploaded_file($_FILES['fileToUpload']['tmp_name'])) {
        // Move the uploaded file to the user's folder with the new file name
        if (move_uploaded_file($_FILES['fileToUpload']['tmp_name'], $targetFilePath)) {
            echo 'File uploaded successfully as ' . $newFileName;
            header('Location: profile.php?id=' . $userIdentifier . ''); // Redirect to the profile page
        } else {
            echo 'Sorry, there was an error moving your file.';
            header('Location: profile.php?id=' . $userIdentifier . ''); // Redirect to the profile page
        }
    } else {
        echo 'Invalid file upload attempt.';
        header('Location: profile.php?id=' . $userIdentifier . ''); // Redirect to the profile page
    }
} else {
    echo 'Please choose a file to upload.';
    header('Location: profile.php?id=' . $userIdentifier . ''); // Redirect to the index page
}
?>