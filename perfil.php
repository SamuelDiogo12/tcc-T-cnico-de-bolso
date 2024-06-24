
<?php
session_start();
include_once 'conexao.php';

// Verifica se o usuário está logado
if (!isset($_SESSION['usuario'])) {
    header("Location: login.php");
    exit();
}

$nome_usuario = $_SESSION['usuario'];

// Buscar dados do usuário no banco
$sql = $conexao->prepare("SELECT * FROM tb_usuarios WHERE nome = ?");
$sql->bind_param("s", $nome_usuario);
$sql->execute();
$result = $sql->get_result();
$user_data = $result->fetch_assoc();
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Perfil</title>
    <style>
        /* Seu CSS aqui */
        @import url("https://fonts.googleapis.com/css2?family=Jomhuria&display=swap");

@import url("https://fonts.googleapis.com/css2?family=Jomhuria&display=swap");

body {
background-image: linear-gradient(to right, #3f4d42, #363d38);
display: flex;
align-items: center;
flex-direction: column;
justify-content: center;
}

#container {
width: 90%;
height: 100%;
background-color: white;
border-radius: 15px;
}

.titulo {
width: 100%;
height: 200px;
background-image: linear-gradient(to right, #419e52, #58d16e);
justify-content: space-around;
color: white;
display: flex;
align-items: center;
font-family: Arial, Helvetica, sans-serif;
}

.titulo1 {
align-items: center;
justify-content: center;
font-family: Jomhuria;
font-size: 120px;
display: flex;
text-align: left;
}
nav {
            display: flex;
            align-items: center;
            justify-content: space-around;
            background-image: linear-gradient(180deg, #419e52, #54c068);
            font-family: "Convergence", sans-serif;
            font-size: 40px;
            font-family: Jomhuria;
            overflow: hidden;
        }

        nav ul {
            display: flex;
            list-style-type: none;
            margin: 0;
            padding: 0;
            text-align: center;
        }
        nav ul li {
            display: inline;
        }
        nav ul li a {
            display: block;
            color: white;
            text-decoration: none;
            padding: 10px 20px;
        }
        nav ul li a:hover {
            background-color: rgb(13, 168, 13);
            transition: all 0.3s;
            border-radius: 10px;
        }

.logo {
height: 60%;
}

.perfil {
height: 60%;
}

article {
align-items: center;
padding: 15px;
width: 50%;
font-size: 20px;
font-family: Arial, Helvetica, sans-serif;
letter-spacing: 1px;
}

.verde {
color: #419e52;
font-family: Jomhuria;
font-size: 70px;
padding: 0%;
}

aside {
background-color: #66ce79;
width: 450px;
height: 800px;
border-radius: 15px;
}

.corpo {
display: flex;
flex-direction: column;
justify-content: space-between;
padding: 30px;
align-items: center;
}

footer {
justify-content: center;
display: flex;
color: white;
font-family: Jomhuria;
font-size: 35px;
background-image: linear-gradient(to right, #419e52, #58d16e);
width: 100%;
height: 80px;
}

.p2 {

font-family: Arial, Helvetica, sans-serif;
font-size: 25px;
color: white;
background-color: rgba(0, 0, 0, 0.6);
border-radius: 10px;
display: flex;
align-items: center;
flex-direction: column;
padding: 15px;
}

#submit {
background-image: linear-gradient(to right, #a1f7b1, #31bb4a, #2f7a3d);
width: 100%;
border-radius: 10px;
border: none;
padding: 15px;
color: white;
font-size: 20px;
cursor: pointer;
}

#submit:hover {
background-image: linear-gradient(to right, #ccfad4, #4ce067, #419e52);
}

.inputUser {
background: none;
border: none;
color: #3f4d42;
font-family: Arial, Helvetica, sans-serif;
font-size: 15px;

}

    </style>
</head>
<body>
    <div id="container">
        <header>
            <div class="titulo">
                <div class="perfil">
                    <img src="imagem/perfil.png" alt="perfil" class="perfil" />
                    <h4><?php echo htmlspecialchars($nome_usuario); ?></h4>
                </div>
                <spam class="titulo1">Técnico de Bolso</spam>
                <img src="imagem/8_Sem_Título__1_-removebg-preview.png" alt="Logo" class="logo" />
            </div>
            <nav>
                <ul>
                    <li><a href="inicio.php">Home</a></li>
                    <li><a href="minhas_analises.php">Minhas Análises</a></li>
                    <li><a href="calagem.php">Cálculo de Calagem</a></li>
                    <li><a href="adubacao.php">Cálculo de Adubação</a></li>
                    <li><a href="info_cultura.php">Informações da Cultura</a></li>
                    <li><a href="perfil.php">Perfil</a></li>
                </ul>
            </nav>
        </header>
        <div class="corpo">
            <p class="verde">Perfil</p>
            <div class="p2">
                <form action="editar_perfil.php" method="POST">
                    <div class="inputBox">
                        <label for="nome" class="labelInput">Nome</label>
                        <input type="text" name="nome" id="nome" class="inputUser" required value="<?php echo htmlspecialchars($user_data['nome']); ?>" <?php echo isset($_SESSION['editando']) ? '' : 'readonly'; ?>>
                    </div>
                    <br><br>
                    <div class="inputBox">
                        <label for="email" class="labelInput">Email</label>
                        <input type="email" name="email" id="email" class="inputUser" required value="<?php echo htmlspecialchars($user_data['email']); ?>" <?php echo isset($_SESSION['editando']) ? '' : 'readonly'; ?>>
                    </div>
                    <br><br>
                    <div class="inputBox">
                        <label for="telefone" class="labelInput">Telefone</label>
                        <input type="tel" name="telefone" id="telefone" class="inputUser" required value="<?php echo htmlspecialchars($user_data['telefone']); ?>" <?php echo isset($_SESSION['editando']) ? '' : 'readonly'; ?>>
                    </div>
                    <br><br>
                    <?php if (isset($_SESSION['editando'])) : ?>
                        <div class="inputBox">
                            <label for="senha" class="labelInput">Senha</label>
                            <input type="password" name="senha" id="senha" class="inputUser" required>
                        </div>
                        <br><br>
                        <button type="submit" name="salvar" id="salvar">Salvar</button>
                    <?php else : ?>
                        <button type="submit" name="editar" id="editar">Editar</button>
                    <?php endif; ?>
                </form>
            </div>
        </div>
        <footer>
            <p>Todos os direitos reservados </p>
            <img src="imagem/8_Sem_Título__1_-removebg-preview.png" alt="Logo" class="logo_f">
        </footer>
    </div>
    <script src="script.js"></script>
</body>
</html>
