<?php
$host = "localhost";
$dbname = "preciosa";
$user = "root";   // seu usuário MySQL
$pass = "080708";       // sua senha MySQL

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $user, $pass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(PDOException $e){
    die("Erro na conexão: " . $e->getMessage());
}
?>
