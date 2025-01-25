<?php
// Include the database connection
require_once 'db.php';

function get_mothers(){
    global $pdo;
    $sql = "SELECT * FROM mothers";
    $stmt = $pdo->prepare($sql);
    $stmt->execute();
    return $stmt->fetchAll();
}
function get_mother($id){
    global $pdo;
    $sql = "SELECT * FROM mothers WHERE id = :id";
    $stmt = $pdo->prepare($sql);
    $stmt->execute(['id' => $id]);
    return $stmt->fetch();
}
?>