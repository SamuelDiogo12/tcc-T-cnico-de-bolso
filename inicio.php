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
    <title>Home</title>
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

      .yy {
        background-color: #54c068;
        color: #fff;
        padding: 10px;
        border-radius: 10px;
        margin-bottom: 10px;
      }

      .verde {
        color: #419e52;
        font-family: Jomhuria;
        font-size: 70px;
        padding: 0%;
      }

      aside {
        background-color: #54c068;
        width: 450px;
        height: 100%;
        border-radius: 15px;
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
      }

      .corpo {
        display: flex;
        flex-direction: row;
        justify-content: space-between;
        padding: 30px;
        height: 100%;
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

      
/* Slideshow styles */
.slideshow {
  width: 100%;
  height: 100%;
  display: flex;
  align-items: center;
  justify-content: center;
  background-color: #54c068;
  border-radius: 15px;
  flex-direction: column;
  font-family: Arial, Helvetica, sans-serif;
}

.slide {
  display: none;
  flex-direction: column;
  align-items: center;
  justify-content: center;
}

.slide.active {
  display: flex;
}

.slideshow a {
  text-decoration: none;
  color: inherit;
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
          <img
            src="imagem/8_Sem_Título__1_-removebg-preview.png"
            alt="Logo"
            class="logo"
          />
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
        <article>
          <p class="intro">
          <p class="verde">BEM VINDO!</p>
          Aqui, no Técnico de Bolso, você poderá realizar cálculos de calagem e
          adubação com praticidade, possuindo tudo no momento em que quiser!
          <br /><br />
          Em MINHAS ANÁLISES, basta inserir os dados requeridos, e estes serão
          armazenados, depois, faça suas contas! <br /><br />
          Caso você esteja buscando por algumas informações adicionais sobre as
          culturas mais trabalhadas atualmente, acesse INFORMAÇÕES DA CULTURA.
        </article>
        <aside>
        <div class="slideshow" id="noticia"></div>
      </aside>
      </div>
      <footer>
        <p>Todos os direitos reservados </p>
        <img
          src="imagem/8_Sem_Título__1_-removebg-preview.png"
          alt="Logo"
          class="logo_f"
        />
      </footer>
    </div>
    <script src="script.js"></script>
  </body>
</html>
