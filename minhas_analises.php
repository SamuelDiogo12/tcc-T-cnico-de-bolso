<?php
session_start();

// Verifica se o usuário está logado
if (!isset($_SESSION['usuario'])) {
    header("Location: login.php");
    exit();
}

$nome_usuario = $_SESSION['usuario'];


error_reporting(E_ALL);
ini_set('display_errors', 1);

include_once "conexao.php";

// Verificar se o formulário foi enviado
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['salvar'])) {
    // Capturar e validar os dados
    $nome = isset($_POST['nome']) ? $_POST['nome'] : null;
    $profundidade = isset($_POST['profundidade']) ? $_POST['profundidade'] : null;
    $materia_organica = isset($_POST['materia_organica']) ? $_POST['materia_organica'] : null;
    $ph = isset($_POST['ph']) ? $_POST['ph'] : null;
    $p = isset($_POST['P']) ? $_POST['P'] : null;
    $n = isset($_POST['N']) ? $_POST['N'] : null;
    $s = isset($_POST['S']) ? $_POST['S'] : null;
    $k = isset($_POST['K']) ? $_POST['K'] : null;
    $ca = isset($_POST['Ca']) ? $_POST['Ca'] : null;
    $mg = isset($_POST['Mg']) ? $_POST['Mg'] : null;
    $al = isset($_POST['Al']) ? $_POST['Al'] : null;
    $sb = isset($_POST['SB']) ? $_POST['SB'] : null;
    $h_al = isset($_POST['H_AL']) ? $_POST['H_AL'] : null;
    $ctc = isset($_POST['CTC']) ? $_POST['CTC'] : null;
    $v_porcentagem = isset($_POST['V_porcentagem']) ? $_POST['V_porcentagem'] : null;
    $boro = isset($_POST['Boro']) ? $_POST['Boro'] : null;
    $cobre = isset($_POST['Cobre']) ? $_POST['Cobre'] : null;
    $ferro = isset($_POST['Ferro']) ? $_POST['Ferro'] : null;
    $manganes = isset($_POST['Manganes']) ? $_POST['Manganes'] : null;
    $zinco = isset($_POST['Zinco']) ? $_POST['Zinco'] : null;

    // Verificar se todos os campos foram preenchidos
    if (is_null($nome) || is_null($profundidade) || is_null($materia_organica) || is_null($ph) || is_null($p) ||is_null($n) || is_null($s) || is_null($k) || is_null($ca) || is_null($mg) || is_null($al) || is_null($sb) || is_null($h_al) || is_null($ctc) || is_null($v_porcentagem) || is_null($boro) || is_null($cobre) || is_null($ferro) || is_null($manganes) || is_null($zinco)) {
        echo "Erro: Todos os campos devem ser preenchidos.";
        exit;
    }

    // Preparar e vincular
    $stmt = $conexao->prepare("INSERT INTO tb_analises (nome, profundidade, materia_organica, ph, P, N, S, K, Ca, Mg, Al, SB, H_AL, CTC, V_PORCENTAGEM, Boro, Cobre, Ferro, Manganes, Zinco) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("ssdddddddddddddddddd", $nome, $profundidade, $materia_organica, $ph, $p, $n, $s, $k, $ca, $mg, $al, $sb, $h_al, $ctc, $v_porcentagem, $boro, $cobre, $ferro, $manganes, $zinco);

    // Executar a consulta
    if ($stmt->execute()) {
        // Redirecionar de volta para a mesma página após a inserção
        header("Location: {$_SERVER['PHP_SELF']}");
        exit;
    } else {
        echo "Erro: " . $stmt->error;
    }

    $stmt->close();
    $conexao->close();
}
?>


<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Minhas Análises</title>
    <style>
     @import url("https://fonts.googleapis.com/css2?family=Jomhuria&display=swap");


        body {
            font-family: Arial, Helvetica, sans-serif;
            background-image: linear-gradient(to right, #3f4d42, #363d38);
            color: #fff;
            margin: 0;
            padding: 0;

        }
        .titulo1 {
            align-items: center;
            justify-content: center;
            font-family: Jomhuria;
            font-size: 120px;
            display: flex;
            text-align: left;
        }
        .container {
            margin: 0 auto;
            padding: 0 auto;
            width: 90%;
            background-color: white;

            box-shadow: 0 0 10px rgba(0, 0, 0, 0.3);
            overflow: hidden; /* Adicionado para evitar overflow */
        }
        .perfil img {
            vertical-align: middle;
        }
        .perfil{
            height: 60%;   
            text-align: center;
        }
        .second-step {
            margin-top: 20px;
            margin-bottom: 20px;
            background-color: rgb(24, 101, 24);
            padding: 20px;
 
            box-shadow: 0 0 6px rgba(0, 0, 0, 0.3);
            text-align: center; /* Centralizar o conteúdo */
        }
        button {
            background-color: rgb(13, 190, 13);
            color: #ffffff;
            border: none;
            padding: 10px 20px;
            border-radius: 10px;
            box-shadow: 1px 1px 6px black;
            cursor: pointer;
            font-size: 16px;
            margin-right: 10px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin: 20px auto; /* Centralizar tabelas horizontalmente */
            background-color: rgb(24, 101, 24); /* Fundo verde escuro */
            border: 2px solid green; /* Margens verdes */
            color: white; /* Texto branco */
        }
        th, td {
            padding: 8px;
            text-align: center;
        }
        th {
            background-color: rgb(13, 190, 13); /* Verde mais claro para cabeçalho */
        }
        tr:nth-child(even) {
            background-color: rgb(24, 101, 24); /* Verde escuro */
        }
        tr:nth-child(odd) {
            background-color: rgb(18, 85, 18); /* Verde mais escuro */
        }
        tr:hover {
            background-color: rgb(13, 168, 13);
            color: white;
        }
        header {
            width: 100%;
            height: 200px;
            background-image: linear-gradient(to right, #419e52, #58d16e);
            justify-content: space-around;
            color: white;
            display: flex;
            align-items: center;
            font-family: Arial, Helvetica, sans-serif;  
        }
        footer {
            background-image: linear-gradient(to right, #419e52, #58d16e);
            width: 100%;
            height: 80px;color: white;
            padding: 10px 0;
            text-align: center;
            margin-top: 20px;

            position: relative; /* Adicionado para evitar sobreposição */
            display: flex;
            justify-content: center;
            font-family: Jomhuria;
            font-size: 35px;
        }
        footer img{
            size: 40%;
        }
        .logo {
            height: 60%;
            vertical-align: middle;
            margin-left: 10px;
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
        #tabela-salva {
            display: none; /* Inicialmente oculto */
            flex-direction: column; /* Orientação em coluna */
        }
        .tabela-salva table {
            width: 90%; /* Ajuste da largura */
            margin: 10px auto; /* Centralizar tabelas horizontalmente */
        }
        .tabela-salva th, .tabela-salva td {
            padding: 8px;
            text-align: center; /* Centralizar texto */
        }
        .tabela-salva th {
            background-color: rgb(13, 190, 13);
        }
        .tabela-salva tr:nth-child(even) {
            background-color: rgb(24, 101, 24);
        }
        .tabela-salva tr:nth-child(odd) {
            background-color: rgb(18, 85, 18);
        }
        .tabela-salva tr:hover {
            background-color: rgb(13, 168, 13);
        }
        /* Adicionado para manter o texto visível durante o redimensionamento */
        .container {
            overflow-x: auto;
        }
        .second-step form {
            display: flex;
            flex-direction: column;
            align-items: center;
        }
        .second-step form input[type="text"] {
            margin-bottom: 10px;
        }
        /* Ajuste da responsividade */
        @media (max-width: 768px) {
            nav ul {
                flex-direction: column;
                align-items: center;
            }
            nav ul li {
                display: block;
                margin-bottom: 10px;
            }
        }
        @media (max-width: 480px) {
            header {
                flex-direction: column;
            }
            .logo {
                margin-bottom: 10px;
            }
            .second-step form {
                width: 100%;
                padding: 0 10px;
            }
            table {
                font-size: 14px;
            }
        }
        /* Estilo para centralizar o conteúdo dos botões e formulário */
        .second-step form {
            display: flex;
            flex-direction: column;
            align-items: center;
        }
        /* Estilo para ajustar a altura das tabelas */
        table {
            table-layout: fixed;
            word-wrap: break-word;
        }
        .tabela-salva {
            table-layout: fixed;
            word-wrap: break-word;
        }
        .tabela-salva table {
            width: 100%;
            margin: 10px auto; /* Centralizar tabelas horizontalmente */
        }
        .tabela-salva th, .tabela-salva td {
            padding: 8px;
            text-align: center; /* Centralizar texto */
        }
        .tabela-salva th {
            background-color: rgb(13, 190, 13);
        }
        .tabela-salva tr:nth-child(even) {
            background-color: rgb(24, 101, 24);
        }
        .tabela-salva tr:nth-child(odd) {
            background-color: rgb(18, 85, 18);
        }
        .tabela-salva tr:hover {
            background-color: rgb(13, 168, 13);
        }


    </style>
</head>
<body>
    <div class="container">
        <header>
        <div class="perfil">
                    <img src="imagem/perfil.png" alt="perfil" class="perfil" />
                    <h4><?php echo htmlspecialchars($nome_usuario); ?></h4>
                </div>
            <spam class="titulo1">Minhas Análises</spam>
            <img src="imagem/8_Sem_Título__1_-removebg-preview.png" alt="Logo" class="logo" />
        </header>
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
        <div class="second-step">
            <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
                <!-- Campos do formulário aqui -->
                <input type="text" name="nome" placeholder="Nome">
                <input type="text" name="profundidade" placeholder="Profundidade">
                <input type="text" name="materia_organica" placeholder="Matéria Orgânica">
                <input type="text" name="ph" placeholder="pH">
                <input type="text" name="P" placeholder="P">
                <input type="text" name="N" placeholder="N">
                <input type="text" name="S" placeholder="S">
                <input type="text" name="K" placeholder="K">
                <input type="text" name="Ca" placeholder="Ca">
                <input type="text" name="Mg" placeholder="Mg">
                <input type="text" name="Al" placeholder="Al">
                <input type="text" name="SB" placeholder="SB">
                <input type="text" name="H_AL" placeholder="H+Al">
                <input type="text" name="CTC" placeholder="CTC">
                <input type="text" name="V_porcentagem" placeholder="V%">
                <input type="text" name="Boro" placeholder="Boro">
                <input type="text" name="Cobre" placeholder="Cobre">
                <input type="text" name="Ferro" placeholder="Ferro">
                <input type="text" name="Manganes" placeholder="Manganês">
                <input type="text" name="Zinco" placeholder="Zinco">
                <button type="submit" name="salvar">Salvar Análise</button>
                <br>
                <button type="button" onclick="toggleTabela()">Ver Análises Salvas</button>
            </form>
        </div>
        <div id="tabela-salva" class="tabela-salva">
            <?php
            // Exibir as análises salvas
            $sql = "SELECT * FROM tb_analises";
            $result = $conexao->query($sql);
            if ($result->num_rows > 0) {
                echo "<table><thead><tr><th>Nome</th><th>Profundidade</th><th>Matéria Orgânica</th><th>pH</th><th>P</th><th>N</th><th>S</th><th>K</th><th>Ca</th><th>Mg</th><th>Al</th><th>SB</th><th>H+Al</th><th>CTC</th><th>V%</th><th>Boro</th><th>Cobre</th><th>Ferro</th><th>Manganês</th><th>Zinco</th></tr></thead><tbody>";
                while($row = $result->fetch_assoc()) {
                    echo "<tr><td>".$row["nome"]."</td><td>".$row["profundidade"]."</td><td>".$row["materia_organica"]."</td><td>".$row["ph"]."</td><td>".$row["P"]."</td><td>".$row["N"]."</td><td>".$row["S"]."</td><td>".$row["K"]."</td><td>".$row["Ca"]."</td><td>".$row["Mg"]."</td><td>".$row["Al"]."</td><td>".$row["SB"]."</td><td>".$row["H_AL"]."</td><td>".$row["CTC"]."</td><td>".$row["V_PORCENTAGEM"]."</td><td>".$row["Boro"]."</td><td>".$row["Cobre"]."</td><td>".$row["Ferro"]."</td><td>".$row["Manganes"]."</td><td>".$row["Zinco"]."</td></tr>";
                }
                echo "</tbody></table>";
            } else {
                echo "Nenhuma análise salva encontrada.";
            }
            $conexao->close();
            ?>
        </div>
        <footer>
            <p>Todos os direitos reservados &copy; 2024</p>
            <img class="logo_f" src="imagem/8_Sem_Título__1_-removebg-preview.png" alt="Logo" >
        </footer>
    </div>

    <script>
        function toggleTabela() {
            var tabelaSalva = document.getElementById('tabela-salva');
            if (tabelaSalva.style.display === 'none' || tabelaSalva.style.display === '') {
                tabelaSalva.style.display = 'block';
            } else {
                tabelaSalva.style.display = 'none';
            }
        }
    </script>
</body>
</html>
