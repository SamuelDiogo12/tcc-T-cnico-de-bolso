<?php
session_start();
include_once 'conexao.php';

if (isset($_POST['nome']) && isset($_POST['senha'])) {
    $nome = $_POST['nome'];
    $senha = $_POST['senha'];

    // Preparar a consulta SQL para evitar SQL Injection
    $sql = $conexao->prepare("SELECT * FROM tb_usuarios WHERE nome = ?");
    $sql->bind_param("s", $nome);
    $sql->execute();
    $result = $sql->get_result();

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();

        // Verificar a senha usando password_verify()
        if (password_verify($senha, $row['senha'])) {
            $_SESSION['usuario'] = $row['nome']; // Salvando o nome do usuário na sessão
            header("Location: inicio.php"); // Redirecionando para a página inicial
            exit();
        } else {
            echo "Senha incorreta!";
        }
    } else {
        echo "Usuário não encontrado!";
    }
} else {
    echo "Por favor, preencha todos os campos!";
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Jomhuria&display=swap');

        body {
            font-family: Arial, Helvetica, sans-serif;
            background-image: linear-gradient(to right, #a1f7b1, #31bb4a, #2f7a3d);
        }

        .entrar {
            background-color: rgba(0, 0, 0, 0.6);
            position: absolute;
            border-radius: 15px;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            padding: 80px;
            color: white;
            font-size: 20px;
        }

        input {
            padding: 15px;
            border: none;
            outline: none;
            font-size: 15px;
        }

        button {
            font-family: Arial, Helvetica, sans-serif;
            font-size: 15px;
            border: none;
            padding: 15px;
            border-radius: 10px;
            width: 100%;
            background-color: green;
            color: white;
            cursor: pointer;
        }

        button:hover {
            background-color: rgb(75, 209, 75);
        }

        .seta {
            transform: rotate(180deg);
            height: 50px;
        }
    </style>
</head>
<body>
    <div class="entrar">
        <h1>Login</h1>
        <form action="login.php" method="post">
            <input type="text" name="nome" placeholder="Nome" required>
            <br><br>
            <input type="password" name="senha" placeholder="Senha" required>
            <br><br>
            <button type="submit">Enviar</button>
        </form>
    </div>
    <a href="index.php"><img src="imagem/arrow-icon-arrows-sign-black-arrows-free-png.webp" alt="voltar" class="seta"></a>
</body>
</html>
