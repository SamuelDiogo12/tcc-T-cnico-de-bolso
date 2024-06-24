<?php
session_start();
include_once 'conexao.php';

if (!isset($_SESSION['usuario'])) {
    header("Location: login.php");
    exit();
}

$nome_usuario = $_SESSION['usuario'];

// Verificar se o botão de editar foi clicado
if (isset($_POST['editar'])) {
    $_SESSION['editando'] = true; // Define a flag de edição como verdadeira
    header("Location: perfil.php");
    exit();
}

// Verificar se o botão de salvar foi clicado
if (isset($_POST['salvar'])) {
    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $telefone = $_POST['telefone'];
    $senha = $_POST['senha'];

    // Verificar a senha do usuário
    $sql_senha = $conexao->prepare("SELECT senha FROM tb_usuarios WHERE nome = ?");
    $sql_senha->bind_param("s", $nome_usuario);
    $sql_senha->execute();
    $result_senha = $sql_senha->get_result();
    $senha_hash = $result_senha->fetch_assoc()['senha'];

    if (password_verify($senha, $senha_hash)) {
        // Senha correta, atualizar dados
        $sql_update = $conexao->prepare("UPDATE tb_usuarios SET nome = ?, email = ?, telefone = ? WHERE nome = ?");
        $sql_update->bind_param("ssss", $nome, $email, $telefone, $nome_usuario);

        if ($sql_update->execute()) {
            $_SESSION['usuario'] = $nome; // Atualiza o nome na sessão
            unset($_SESSION['editando']); // Remove a flag de edição
            header("Location: perfil.php");
            exit();
        } else {
            echo "Erro ao atualizar os dados!";
        }
    } else {
        echo "Senha incorreta!";
    }
}
?>
