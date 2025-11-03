<?php
header('Content-Type: application/json');
require_once 'config/database.php';

try {
    $stmt = $conn->prepare("SELECT * FROM produtos");
    $stmt->execute();
    $produtos = $stmt->fetchAll(PDO::FETCH_ASSOC);
    echo json_encode($produtos);
} catch(PDOException $e){
    echo json_encode([]);
}
?>
