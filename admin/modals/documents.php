<?php
include '../db.php';
include '../functions.php';

$id = $_GET['id'];
$mother = get_mother($id);


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit and Print</title>
    <style>
        .editable {
            border: 1px solid #ccc;
            padding: 10px;
            min-height: 100px;
        }

        .container {
            margin-top: 20px;
        }
    </style>
</head>

<body>

    <h1>Edit Content Before Printing</h1>
    <div class="container">
        <div class="editable" contenteditable="true">
            <p>Edit this text before printing it. You can modify this content as you wish.</p>
        </div>
        <button onclick="printDocument()">Print</button>
    </div>

    <script>
        function printDocument() {
            // Optionally, disable content editing before printing
            document.querySelector('.editable').setAttribute('contenteditable', 'false');

            window.print();

            // Re-enable editing after printing (if needed)
            // document.querySelector('.editable').setAttribute('contenteditable', 'true');
        }
    </script>

</body>

</html>