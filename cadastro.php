<?php
session_start();
include_once 'conexao.php';

if (isset($_POST['nome'], $_POST['email'], $_POST['telefone'], $_POST['cpf'], $_POST['genero'], $_POST['data_nasc'], $_POST['cidade'], $_POST['estado'], $_POST['endereco'], $_POST['senha'])) {
    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $telefone = $_POST['telefone'];
    $cpf = $_POST['cpf'];
    $genero = $_POST['genero'];
    $data_nasc = $_POST['data_nasc'];
    $cidade = $_POST['cidade'];
    $estado = $_POST['estado'];
    $endereco = $_POST['endereco'];
    $senha = $_POST['senha'];

    // Gerar hash da senha
    $senha_hash = password_hash($senha, PASSWORD_DEFAULT);

    // Preparar a consulta SQL para evitar SQL Injection
    $sql = $conexao->prepare("INSERT INTO tb_usuarios (nome, email, telefone, cpf, genero, data_nasc, cidade, estado, endereco, senha) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
    $sql->bind_param("ssssssssss", $nome, $email, $telefone, $cpf, $genero, $data_nasc, $cidade, $estado, $endereco, $senha_hash);
    $sql->execute();

    if ($sql->affected_rows > 0) {
        $_SESSION['usuario'] = $nome; // Salva o nome do usuário na sessão após o cadastro
        header("Location: inicio.php"); // Redireciona para a página inicial
        exit();
    } else {
        echo "Erro ao cadastrar usuário.";
    }
} else {
    echo "Por favor, preencha todos os campos.";
}
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro</title>

    <style>
        body {
            font-family: Arial, Helvetica, sans-serif;
            background-image: linear-gradient(to right, #a1f7b1, #31bb4a, #2f7a3d);
        }

        .box {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            background-color: rgba(0, 0, 0, 0.6);
            padding: 15px;
            border-radius: 18px;
            width: 20%;
            color: white;
        }

        fieldset {
            border: 4px solid #2f7a3d;
        }

        legend {
            border: 1px solid #2f7a3d;
            padding: 10px;
            text-align: center;
            background-color: #2f7a3d;
            border-radius: 10px;
        }

        .inputBox {
            position: relative;
        }

        .inputUser {
            background: none;
            border: none;
            border-bottom: 1px solid;
            outline: none;
            color: white;
            font-size: 15px;
            width: 100%;
            letter-spacing: 2px;
        }

        .labelInput {
            position: absolute;
            top: 0px;
            left: 0px;
            pointer-events: none;
            transition: .5s;
        }

        .inputUser:focus~.labelInput,
        .inputUser:valid~.labelInput {
            top: -20px;
            font-size: 12px;
            color: #31bb4a;
        }

        .seta {
            transform: rotate(180deg);
            height: 50px;
        }

        #data_nascimento {
            border: none;
            padding: 8px;
            border-radius: 10px;
            outline: none;
            font-size: 15px;
        }

        #submit {
            background-image: linear-gradient(to right, #a1f7b1, #31bb4a, #2f7a3d);
            width: 100%;
            border-radius: 10px;
            border: none;
            padding: 15px;
            color: white;
            font-size: 15px;
            cursor: pointer;
        }

        #submit:hover {
            background-image: linear-gradient(to right, #ccfad4, #4ce067, #419e52);
        }
    </style>
</head>

<body>

    <div class="box">
        <form action="cadastro.php" method="post">
            <fieldset>
                <legend><b>Formulario de Cadastro</b></legend>
                <br>
                <div class="inputBox">
                    <input type="text" name="nome" id="nome" class="inputUser" required>
                    <label for="nome" class="labelInput">Nome</label>
                </div>
                <br><br>
                <div class="inputBox">
                    <input type="text" name="email" id="email" class="inputUser" required>
                    <label for="email" class="labelInput">Email</label>
                </div>
                <br><br>
                <div class="inputBox">
                    <input type="tel" name="telefone" id="telefone" class="inputUser" required>
                    <label for="telefone" class="labelInput">Telefone</label>
                </div>
                <br><br>
                <div class="inputBox">
                    <input type="number" name="cpf" id="cpf" class="inputUser" required>
                    <label for="cpf" class="labelInput">CPF</label>
                </div>
                <br><br>
                <p>Gênero:</p>
                <input type="radio" id="feminino" name="genero" value="feminino" checked>
                <label for="feminino">Feminino</label>
                <br>
                <input type="radio" id="masculino" name="genero" value="masculino">
                <label for="masculino">Masculino</label>
                <br>
                <input type="radio" id="outro" name="genero" value="outro">
                <label for="outro">Outro</label>
                <br><br>
                <label for="data_nascimento"> <b>Data de Nascimento:</b></label>
                <input type="date" name="data_nasc" id="data_nascimento">
                <br><br>
                <div class="inputBox">
                    <input type="text" name="cidade" id="cidade" class="inputUser" required>
                    <label for="cidade" class="labelInput">Cidade</label>
                </div>
                <br><br>
                <div class="inputBox">
                    <input type="text" name="estado" id="estado" class="inputUser" required>
                    <label for="estado" class="labelInput">Estado</label>
                </div>
                <br><br>
                <div class="inputBox">
                    <input type="text" name="endereco" id="endereco" class="inputUser" required>
                    <label for="endereco" class="labelInput">Endereço</label>
                </div>
                <br><br>
                <div class="inputBox">
                    <input type="password" name="senha" id="senha" class="inputUser" required>
                    <label for="senha" class="labelInput">Senha</label>
                </div>
                <br><br>
                <button type="submit" name="submit" id="submit">Gravar</button>
            </fieldset>
        </form>
    </div>
    <a href="index.php"><img src="imagem/arrow-icon-arrows-sign-black-arrows-free-png.webp" alt="voltar" class="seta"></a>
</body>

</html>
