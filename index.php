<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bem Vindo!</title>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Jomhuria&display=swap');

        body {
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            background-image: url('imagem/AnyConv.com');
            background-size: cover;
            background-color: black;
            height: 100vh;
            margin: 0;
        }
        header {
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            color: white;
            width: 100%;
            height: 100%;
        }
        .entrar {
            margin-top: 125px;
            background-color: rgba(0, 0, 0, 0.6);
            display: flex;
            flex-direction: row;
            align-items: center;
            justify-content: space-around;
            width: 240px;
            height: 150px;
            border-radius: 25px;
        }
        .titulo {
            font-family: 'Jomhuria', cursive;
            font-size: 145px;
            width: 600px;
            text-align: center;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            
        }
        button {
            font-family: 'Jomhuria', cursive;
            font-size: 30px;
            border: none;
            padding: 15px;
            border-radius: 15px;
            background-color: green;
            color: white;
            cursor: pointer;
            transition: background-color 0.3s;
        }
        button:hover {
            background-color: rgb(75, 209, 75);
        }
       /* .box {
            display: inline-block;
            position: relative;
            text-align: center;
        }*/
        .box img {
            opacity: 0.4;
            width: 100%;
            height: auto;
        }
        .box span {
            position: absolute;
            top: 20%;
            right: 30%;
        }
        .entrar {
            position: absolute;
            top: 50%;
            right: 50%;
            transform: translate(50%, -50%);
        }
    </style>
</head>
<body>
    <header>
        <div class="box">
            <span class="titulo">Técnico de Bolso</span>
            <div class="entrar">
                <a href="cadastro.php"><button>Cadastrar-se</button></a>
                <a href="login.php"><button>Entrar</button></a>
            </div>
        </div>
    </header>
</body>
</html>
