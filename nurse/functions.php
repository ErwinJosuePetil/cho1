<?php
include "db.php";

function getMedicalRecords()
{
    global $pdo;

    $sql = "SELECT * FROM maternity_records";
    $stmt = $pdo->prepare($sql);
    $stmt->execute();
    return $stmt->fetchAll();
}
function getMotherRecords()
{
    global $pdo;

    $sql = "SELECT * FROM mothers";
    $stmt = $pdo->prepare($sql);
    $stmt->execute();
    return $stmt->fetchAll();
}
