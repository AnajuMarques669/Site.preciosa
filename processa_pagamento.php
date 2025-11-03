<?php
if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $nome = $_POST['nome'];
    $endereco = $_POST['endereco'];
    $metodo = $_POST['metodo'];

    switch($metodo){
        case 'mercadopago':
            header("Location: ../mercadopago.php"); // integração real
            break;

        case 'cartao':
            echo "<script>alert('Pagamento com cartão simulado!'); window.location.href='../index.html';</script>";
            break;

        case 'pix':
            echo "<script>alert('Chave PIX: joias@banco.com'); window.location.href='../index.html';</script>";
            break;

        case 'boleto':
            echo "<script>alert('Boleto gerado! (simulação)'); window.location.href='../index.html';</script>";
            break;

        default:
            echo "<script>alert('Selecione um método válido.'); window.location.href='../checkout.html';</script>";
    }
}
?>
