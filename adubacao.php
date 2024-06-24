<?php
session_start();

// Verifica se o usuário está logado
if (!isset($_SESSION['usuario'])) {
    header("Location: login.php");
    exit();
}

$nome_usuario = $_SESSION['usuario'];

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $cultura_id = $_POST['cultura'];
    $analise_id = $_POST['analise'];

    // Configuração da conexão com o banco de dados
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "formulario";

    // Cria a conexão
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Verifica a conexão
    if ($conn->connect_error) {
        die("Falha na conexão: " . $conn->connect_error);
    }

    // Recupera os dados da cultura selecionada
    $sql = "SELECT * FROM tb_cultura WHERE id_Culturas = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $cultura_id);
    $stmt->execute();
    $cultura_result = $stmt->get_result();
    $cultura = $cultura_result->fetch_assoc();

    // Recupera os dados da análise selecionada
    $sql = "SELECT * FROM tb_analises WHERE id_numero_analise = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $analise_id);
    $stmt->execute();
    $analise_result = $stmt->get_result();
    $analise = $analise_result->fetch_assoc();

    // Fechar a conexão
    $stmt->close();
    $conn->close();

    // Calcula a diferença e a quantidade de fertilizante
    $diferenca_N = ($cultura['N'] ?? 0) - ($analise['N'] ?? 0);
    $diferenca_P = $cultura['P'] - $analise['P'];
    $diferenca_K = $cultura['K'] - $analise['K'];

    // Normaliza os valores pelo menor valor
    $min_valor = min(abs($diferenca_N), abs($diferenca_P), abs($diferenca_K));
    if ($min_valor == 0) {
        $min_valor = 1; // Para evitar divisão por zero
    }

    $norm_N = $diferenca_N / $min_valor;
    $norm_P = $diferenca_P / $min_valor;
    $norm_K = $diferenca_K / $min_valor;

    // Considera os valores positivos e multiplica pelo inverso caso necessário
    $norm_N = $norm_N < 0 ? abs($norm_N) : $norm_N;
    $norm_P = $norm_P < 0 ? abs($norm_P) : $norm_P;
    $norm_K = $norm_K < 0 ? abs($norm_K) : $norm_K;

    // Encontrar a fórmula NPK que melhor se adequa
    // Supondo as fórmulas disponíveis: 8-24-16, 6-18-12, 5-15-10
    $formulas = [
        [8, 24, 16],
        [6, 18, 12],
        [20, 5, 20],
        [5, 15, 10]
    ];

    // Escolhe a fórmula que melhor se adequa à proporção
    $escolhida = null;
    $menor_diferenca = PHP_INT_MAX;
    foreach ($formulas as $formula) {
        $diferenca = abs($norm_N - $formula[0]) + abs($norm_P - $formula[1]) + abs($norm_K - $formula[2]);
        if ($diferenca < $menor_diferenca) {
            $menor_diferenca = $diferenca;
            $escolhida = $formula;
        }
    }

    // Calcula a quantidade necessária da fórmula escolhida
    $quantidade_adubo = 0;
    if ($escolhida) {
        $quantidade_adubo = ($diferenca_N != 0 ? abs($diferenca_N) : abs($diferenca_P)) / $escolhida[0];
    }
}
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Cálculo Adubação</title>
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

        nav ul li a:link,
        a:visited,
        a:active {
            color: white;
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

        .droplist {
            border: none;
            background: none;
            font-family: Arial, Helvetica, sans-serif;
            font-size: 20px;
            background-color: #66ce79;
            color: white;
            border-radius: 10px;
            padding: 15px;
        }

        .content {
            display: flex;
            align-items: center;
            flex-direction: column;
            font-family: Arial, Helvetica, sans-serif;
            font-size: 15px;
            border-radius: 10px;
            width: 80%;
            padding-bottom: 25px;
            justify-content: center;
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
                <div class="titulo1">
                    <h1>Adubação</h1>
                </div>
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
            <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
                <select id="culturaDropdown" name="cultura" class="droplist">
                    <option value="none" class="opcao">Selecione uma cultura</option>
                    <?php
                    // Configuração da conexão com o banco de dados
                    $servername = "localhost";
                    $username = "root";
                    $password = "";
                    $dbname = "formulario";

                    // Cria a conexão
                    $conn = new mysqli($servername, $username, $password, $dbname);

                    // Verifica a conexão
                    if ($conn->connect_error) {
                        die("Falha na conexão: " . $conn->connect_error);
                    }

                    // Consulta SQL para buscar as culturas
                    $sql = "SELECT id_Culturas, nome_culturas FROM tb_cultura";
                    $result = $conn->query($sql);

                    // Preenche as opções do dropdown com os dados do banco de dados
                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                            echo '<option value="' . $row["id_Culturas"] . '">' . $row["nome_culturas"] . '</option>';
                        }
                    } else {
                        echo '<option value="none">Nenhuma cultura encontrada</option>';
                    }

                    // Fecha a conexão
                    $conn->close();
                    ?>
                </select>
                <select id="analiseDropdown" name="analise" class="droplist">
                    <option value="none" class="opcao">Selecione uma análise</option>
                    <?php
                    // Configuração da conexão com o banco de dados
                    $servername = "localhost";
                    $username = "root";
                    $password = "";
                    $dbname = "formulario";

                    // Cria a conexão
                    $conn = new mysqli($servername, $username, $password, $dbname);

                    // Verifica a conexão
                    if ($conn->connect_error) {
                        die("Falha na conexão: " . $conn->connect_error);
                    }

                    // Consulta SQL para buscar as análises
                    $sql = "SELECT id_numero_analise, nome FROM tb_analises";
                    $result = $conn->query($sql);

                    // Preenche as opções do dropdown com os dados do banco de dados
                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                            echo '<option value="' . $row["id_numero_analise"] . '">' . $row["nome"] . '</option>';
                        }
                    } else {
                        echo '<option value="none">Nenhuma análise encontrada</option>';
                    }

                    // Fecha a conexão
                    $conn->close();
                    ?>
                </select>
                <button type="submit">Calcular</button>
            </form>
        </div>
        <div class="content">
            <?php if ($_SERVER["REQUEST_METHOD"] == "POST") : ?>
                <h2>Resultado do Cálculo:</h2>
                <p>Fórmula NPK Escolhida: <?php echo implode('-', $escolhida); ?></p>
                <p>Quantidade de Adubo Necessária: <?php echo number_format($quantidade_adubo, 2); ?> kg/ha</p>
            <?php endif; ?>
        </div>
        <footer>
            <p>Todos os direitos reservados</p>
            <img src="imagem/8_Sem_Título__1_-removebg-preview.png" alt="Logo" class="logo_f">
        </footer>
    </div>
    <script src="script.js"></script>
</body>

</html>
