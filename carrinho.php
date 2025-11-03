<?php
session_start();
include 'conexao.php';

if(!isset($_SESSION['usuario_id'])){
    die("Faça login para acessar o carrinho.");
}

$itens = json_decode(file_get_contents("php://input"), true);
$total = 0;

foreach($itens as $item){
    $total += $item['preco'] * $item['quantidade'];
}

$stmt = $pdo->prepare("INSERT INTO pedidos(usuario_id,total) VALUES(?,?)");
$stmt->execute([$_SESSION['usuario_id'], $total]);
$pedido_id = $pdo->lastInsertId();

$stmt_item = $pdo->prepare("INSERT INTO itens_pedido(pedido_id,produto_id,quantidade,preco) VALUES(?,?,?,?)");
foreach($itens as $item){
    $stmt_item->execute([$pedido_id, $item['id'], $item['quantidade'], $item['preco']]);
}

echo json_encode(["status"=>"ok","pedido_id"=>$pedido_id]);
?>
