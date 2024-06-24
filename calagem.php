<?php
session_start();

// Verifica se o usuário está logado
if (!isset($_SESSION['usuario'])) {
    header("Location: login.php");
    exit();
}

$nome_usuario = $_SESSION['usuario'];
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Cálculo de Calagem</title>
    <style>
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

        .logo_f {
            size: 40%;
        }

        .tabela {
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            width: 70%;
            height: 60%;
        }

        .calagem {
            width: 70%;
            height: 60%;
            background-color: #419e52;
            padding: 1em;
            border-radius: 10px;
            text-align: left;
            color: white;
            font-family: Arial, Helvetica, sans-serif;
            font-size: 20px;

        }

        .button {
            background-color: #388647;
            color: #ffffff;
            border: none;
            padding: 3vh;
            border-radius: 10px;
            cursor: pointer;
            font-size: 19px;
            width: 100%;

        }

        .button:hover {
            background-color: #58d16e;
        }

        .btn {
            background: none;
            border: none;
            padding: 0;
            cursor: pointer;
        }

        input {
            border: none;
            font-family: Arial, Helvetica, sans-serif;
            font-size: 20px;
            width: 100%;
            letter-spacing: 2px;
            border-radius: 5px;
            margin: 5px;
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
            <p class="verde">Cálculo de Calagem</p>
            <div class="tabela">
                <div class="calagem">
                    <label for="v2">Digite o v2:</label>
                    <input type="number" placeholder="v2" id="v2">
                    <br>
                    <p>V% da cultura</p>

                    <label for="v1">Digite o v1:</label>
                    <input type="number" placeholder="v1" id="v1">
                    <br>
                    <p>V% da análise</p>

                    <label for="ctc">Digite o ctc:</label>
                    <input type="number" placeholder="ctc" id="ctc">
                    <br><br>

                    <label for="f">Digite o fator de profundidade:</label>
                    <input type="number" placeholder="f" id="f">
                    <br>
                    <p>Análise de 0 a 20cm: 1 <br> Análise de 20 a 30cm: 1,5 <br> Análise de 20 a 40cm: 2</p>

                    <label for="prnt">Digite o prnt:</label>
                    <input type="number" placeholder="prnt" id="prnt">
                    <br><br>

                    <button class="button" onclick="btncalcular()">Calcular</button>
                    <br><br>
                    <div id="lblResultado"></div>
                </div>
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