<?php
include 'conexao.php';

if($_SERVER['REQUEST_METHOD']=='POST'){
    $nome = trim($_POST['nome']);
    $email = trim($_POST['email']);
    $senha = password_hash($_POST['senha'], PASSWORD_DEFAULT);

    // Verifica se o email já existe
    $stmt = $pdo->prepare("SELECT * FROM usuarios WHERE email=?");
    $stmt->execute([$email]);
    if($stmt->rowCount() > 0){
        echo "<script>alert('Este email já está cadastrado!'); window.location.href='../cadastro.html';</script>";
        exit;
    }

    // Insere usuário
    $stmt = $pdo->prepare("INSERT INTO usuarios(nome,email,senha) VALUES(?,?,?)");
    if($stmt->execute([$nome,$email,$senha])){
        echo "<script>alert('Cadastro realizado com sucesso!'); window.location.href='../login.html';</script>";
        exit;
    } else {
        echo "<script>alert('Erro no cadastro. Tente novamente.'); window.location.href='../cadastro.html';</script>";
    }
} else {
    echo "Método inválido.";
}
?>
