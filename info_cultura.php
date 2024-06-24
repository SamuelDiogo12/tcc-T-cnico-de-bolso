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
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Perfil</title>
</head>

<body>
    <!DOCTYPE html>
    <html lang="pt-br">

    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>Informações da Cultura</title>
        <style>
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

            .section {
                font-family: Arial, Helvetica, sans-serif;
                font-size: 15px;
                border-radius: 10px;
            }

            .content {
                /*background-color: #419e52;
            color: white;*/
                display: flex;
                align-items: center;
                flex-direction: column;
                font-family: Arial, Helvetica, sans-serif;
                font-size: 15px;
                border-radius: 10px;
                width: 80%;

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
                <p class="verde">Informações da Cultura</p>

                <div class="content">
                    <select id="dropdown" onchange="showSection()" class="droplist">
                        <option value="none" class="opcao">Selecione uma Cultura</option>
                        <option value="Coffea" class="opcao">Café Arabica</option>
                        <option value="videira " class="opcao">Videira </option>
                        <option value="Soja" class="opcao">Soja</option>
                        <option value="Milho" class="opcao">Milho</option>
                    </select>

                    <div id="Coffea" class="section" style="display:none;">
                        <h2>Café Arabica</h2>
                        <h3>Nomes populares: </h3><br>
                        <p>Coffea arabica L. Nomes populares: Cafeeiro-comum, cafezeiro, cafeeiro, café-arábica, coffee (EUA, English), xiao li ka fei (pinyin, China), etc.</p><br>
                        <h3>Familia: Rubiáceas</h3><br>
                        <h3>Clima e solo:</h3><br>
                        <p>a espécie C. arabica é adaptada a clima ameno, subtropical, com temperatura média anual entre 18 e 22 °C e total de deficiência hídrica anual inferior a 150 mm. No Estado de São Paulo essas condições são encontradas, acima de 400 m de altitude ao sul do paralelo 22° e acima de 500 m de altitude, ao norte desse paralelo. O café arábica pode ser cultivado com sucesso em vários tipos de solo, desde que haja adequada correção da acidez e fertilidade. Os solos devem ter profundidade mínima de 1 metro e boa drenagem.</p><br>
                        <h3>Época de semeadura e plantio: </h3><br>
                        <p> a semeadura para formação de mudas em viveiro ocorre de abril a agosto e o plantio das mudas em campo, de outubro a janeiro, preferencialmente em período chuvoso.</p><br>
                        <h3>Espaçamento: </h3><br>
                        <p>é variável, em função dos seguintes fatores: climático: analisar bem as condições térmicas e hídricas do local e verificar o zoneamento climático para o café arábica;</p><br>
                        <h3>Cultivares e linhagens:</h3><br>
                        <p>cultivares de maturação média a tardia, como Catuaí e Obatã, quando plantadas em regiões altas e frias apresentarão maior atraso na maturação. Adensando-se o plantio, a maturação também é retardada;</p><br>
                        <h3>Fertilidade do solo: </h3><br>
                        <p>não constitui fator limitante, pois atualmente existem técnicas agronômicas adequadas para resolver a questão, desde que o solo não apresente problemas físicos limitantes, como encharcamento e afloramento de rocha;</p><br>
                        <h3>Tratos culturais: </h3><br>
                        <p>quando se pretende mecanizar os tratos é necessário utilizar maior espaçamento entre as linhas de plantio, adequando-se à bitola das máquinas que transitarão na lavoura;</p><br>
                        <h3>Controle de pragas e doenças: </h3><br>
                        <p>lavouras mais adensadas apresentam microclima mais favorável à incidência da ferrugem e da broca e menos favorável ao bicho-mineiro, enquanto nas menos adensadas ocorre o processo inverso. Deve-se considerar como será feito o manejo da lavoura, se mecanizado ou manual;</p><br>
                        <h3>Disponibilidade de mão de obra: </h3><br>
                        <p>espaçamentos mais estreitos restringem a mecanização, portanto requerem uso intensivo de mão de obra;</p><br>
                        <h3>Valor da terra: </h3><br>
                        <p>embora não limitante, é importante lembrar que terras mais valorizadas devem apresentar retorno mais rápido em produção, exigindo plantios mais adensados; </p><br>
                        <h3>Tamanho da propriedade: </h3><br>
                        <p>plantio adensado requer maior investimento na implantação da lavoura e demanda maior atenção na implementação de podas, controle de pragas e doenças e colheita. Para melhor aproveitamento de área agrícola, a pequena propriedade é mais apropriada para plantios adensados; </p><br>
                        <h3>Topografia do terreno: </h3><br>
                        <p>áreas montanhosas, com declividade mais acentuada e topografia acidentada, de difícil mecanização são mais apropriadas para plantios adensados;</p><br>
                        <h3> Recursos financeiros: </h3><br>
                        <p>embora o retorno do capital investido em lavouras adensadas seja mais rápido, devido a maior produtividade inicial, os recursos investidos são maiores que nas lavouras não adensadas, devido aos gastos adicionais com mudas, fertilizantes, mão de obra e transporte, entre outros. Por isso, é fator primordial a ser considerado;</p><br>
                        <h3>Poda:</h3><br>
                        <p>é um trato cultural que está cada vez mais incorporado ao manejo da lavoura cafeeira, qualquer que seja o sistema de plantio adotado. Todavia, é indispensável nas lavouras adensadas, devendo ser adotada o quanto antes, dependendo da intensidade do adensamento, e a intervalos mais curtos</p><br>
                        <h3>Calagem:</h3><br>
                        <p>aplicar calcário para elevar a saturação por bases a 50% e o teor de magnésio a um mínimo de 4mmolc dm- ³, com base na análise do solo. Distribuir o corretivo uniformemente sobre o terreno e incorporá-lo ao solo o mais profundamente possível. Além da calagem em área total, aplicar por metro linear de sulco 400 g de calcário. Em cafezal já formado, distribuir o corretivo sobre o solo, de preferência no início da estação chuvosa, aplicando quantidade maior na faixa de terreno que recebe a adubação.</p><br>
                        <h3>Adubação de plantio (orgânica e mineral): </h3><br>
                        <p>se disponível, aplicar por metro de sulco, 20 litros de esterco de curral, ou 5 litros de esterco de galinha com cama (reduzir a 2 litros se for esterco puro), ou 10 litros de palha de café ou 2 litros de torta de mamona, curtidos, com 45 dias de antecedência ao plantio no caso de produtos não curtidos. Quanto à adubação mineral, aplicar por metro linear de sulco: 15 a 60 g de P2 O5 e 0 a 30 g de K2 O. A quantidade de micronutrientes depende dos resultados da análise do solo. Misturar muito bem o calcário, os adubos minerais e o adubo orgânico com a terra do sulco de plantio. Após o pegamento das mudas, aplicar 4 g de N por cova, em cobertura, ao redor das plantas, esparramando bem, repetindo a aplicação a cada 30 dias, até o fim do período chuvoso. No caso do plantio em covas, todos os fertilizantes e o calcário devem ser bem misturados com a terra das covas, antes do fechamento das mesmas.</p><br>
                        <h3>Plantio: </h3><br>
                        <p>deve ser feito em período chuvoso ou com irrigação. Usar mudas vigorosas, com 4 a 6 pares de folhas e desenvolvimento uniforme. Em áreas isentas de nematoides, efetuar o plantio com mudas oriundas de sementes. Em áreas infestadas com nematoides deve-se utilizar mudas enxertadas sobre o porta-enxerto Apoatã IAC 2258. A seguinte sequência deve ser observada no plantio: abertura de covetas, retirada do recipiente (saquinho ou tubete), corte do fundo do saquinho plástico para evitar “pião torto”, colocação da muda com o colo ao nível da superfície do terreno, compactação leve da terra em torno da muda. No plantio com mudas de tubetes, quando feitas covetas com chucho, deve-se chegar a terra com cuidado, não apertando muito para não afetar o sistema radicular. Caso não ocorram chuvas no período de plantio, as mudas devem ser irrigadas. Se houver necessidade, o replantio deve ser realizado com a maior brevidade possível. Atualmente, existem máquinas para o plantio de café.</p><br>
                        <h3>Controle de pragas:</h3><br>
                        <h3>Viveiro: </h3><br>
                        <p>como o uso de brometo de metila está proibido, recomenda-se que seja realizada a solarização da terra a ser utilizada na produção de mudas, visando principalmente o controle de nematoides. O bicho-mineiro pode ser controlado com inseticidas específicos, como os fosforados, também indicados para insetos cortadores como grilos, paquinhas e besouros. </p><br>
                        <h3>Lavoura: </h3><br>
                        <p>pela importância dos danos que causam e pela disseminação por regiões cafeeiras, as principais pragas do cafeeiro são as seguintes: nematoides, cigarras, bicho-mineiro e broca-do-café. De menor importância, em vista da situação específica em que ocorrem, citam-se: cochonilhas-da-raiz, Migdolus sp., lagarta-rosca, ácaro-vermelho, ácaro-plano e cigarrinhas. As demais pragas são de ocorrência esporádica, embora possam causar prejuízos em condições favoráveis ao desenvolvimento.</p><br>
                        <h3>Nematoides: </h3><br>
                        <p>entre as espécies que parasitam o cafeeiro, as mais patogênicas são Meloidogyne incognita, com diversas raças, e M. paranaensis, ocorrendo principalmente nas regiões de arenito dos Estados de São Paulo e Paraná e M. exigua, que se acha disseminada em todas as regiões cafeeiras brasileiras. O nematoide é uma praga do cafeeiro, de importância primária, principalmente nos Estados de São Paulo e Paraná, embora seja também encontrado em Minas Gerais e no Espírito Santo. Os prejuízos são ocasionados desde as mudas, no viveiro, até em lavouras adultas. Considerando que a utilização de nematicidas, embora ajude, encarece muito o controle e não soluciona definitivamente o problema, recomendam-se as seguintes medidas:
                            <br>- Utilização de mudas sadias e isentas de nematoides;
                            <br> - Em áreas de renovação cafeeira, realizar amostragem de solo para análises nematológicas e, se possível, dar um intervalo de descanso de dois anos;
                            <br> - Promover a recuperação de solos onde haja nematoides nocivos ao cafeeiro, com o plantio de leguminosa, como a mucuna-preta, a fim de diminuir sua população;
                            <br> - Em áreas com histórico da presença de Meloidogyne incognita e M. paranaensis, mesmo em níveis populacionais considerados baixos, plantar somente mudas enxertadas sobre o Apoatã IAC 2258, resistente ao nematoide;
                        </p><br>
                        <h3>Cigarras: </h3><br>
                        <p>o ataque de cigarras ocorre em São Paulo com frequência muito grande na região da Mogiana, estendendo-se para o sul de Minas Gerais. A forma jovem ou ninfas, alojadas no sistema radicular, sugam a seiva do cafeeiro, causando definhamento progressivo da planta, desfolhamento e sintomas de deficiências nutricionais, chegando a provocar a morte das plantas. O controle químico é eficiente por meio de inseticidas sistêmicos.</p><br>
                        <h3>Bicho-mineiro: </h3><br>
                        <p>praga disseminada por todas as regiões cafeeiras, causa sérios prejuízos às lavouras quando não controlada eficientemente, em vista da grande desfolha que pode provocar. As regiões mais baixas e mais quentes, com baixa umidade relativa do ar e com período de veranico, apresentam as melhores condições ao ataque da praga. As lavouras em plantios adensados são menos atacadas, pois ocorre nessa situação um microclima desfavorável à praga, pela maior umidade, menor insolação e ventilação. O bicho-mineiro adulto é uma pequena mariposa, que no estádio de lagarta mina as folhas do cafeeiro, ocasionando o desfolhamento. O controle deve ser feito com inseticidas sistêmicos via solo ou por meio de aplicações foliares com inseticidas específicos existentes no mercado.</p><br>
                        <h3>Broca-dos-frutos: </h3><br>
                        <p>a broca-do-café ataca o fruto do cafeeiro causando-lhe perfurações com sérias consequências, pois além da perda de peso e queda dos frutos, favorecem a penetração de fungos secundários, que contribuem para a deterioração das sementes. O grão de café brocado constitui um grave defeito na classificação comercial do produto, prejudicando o tipo. É importante ressaltar que as lavouras fechadas e sombreadas e aquelas localizadas em baixadas são mais favoráveis à presença da praga, cujo controle pode ser:</p><br>
                        <h3>Cultural: </h3><br>
                        <p> colheita bem-feita, sem deixar frutos na árvore e no chão, reduz sensivelmente a população da broca na lavoura.</p><br>
                        <h3>Químico: </h3><br>
                        <p>pulverizações de novembro a janeiro, época de trânsito da broca. Realizar uma ou duas aplicações de inseticidas específicos, com intervalo de vinte dias. Monitorar a lavoura a partir de novembro, para iniciar o controle no momento adequado, sempre com infestação abaixo de 5% dos frutos da primeira florada. </p><br>
                        <h3>Controle de doenças: </h3><br>
                        <p>as principais doenças do cafeeiro são a ferrugem, a cercosporiose, a mancha aureolada, a mancha de phoma, a rizoctoniose, a mancha anular e a roseliniose.</p><br>
                        <h3>Rizoctoniose:</h3><br>
                        <p>é uma das principais doenças que incidem nos viveiros, além da cercosporiose e da mancha aureolada. Para o controle da rizoctoniose pode-se aplicar o fungicida procimidone e/ou efetuar o tratamento das sementes com o mesmo fungicida.</p><br>
                        <h3>Tratos Culturais: </h3><br>
                        <p>Manejo de plantas daninhas: a ocorrência de plantas daninhas é de intensidade variável durante o ano, e essa variação é influenciada pela precipitação pluviométrica e temperatura. De outubro a abril, com a ocorrência de chuvas e temperaturas mais elevadas, é mais comum a presença de gramíneas. Nesse período, há necessidade de controle das plantas invasoras, principalmente na área de projeção da copa, mantendo-se o meio da rua vegetado. O controle pode ser feito com roçadeiras, trinchas ou herbicidas. De maio a setembro, a precipitação pluviométrica é escassa e a temperatura é mais baixa, com maior presença de plantas de folha larga. Nessa época, as plantas invasoras concorrem em menor intensidade, mas a manutenção da lavoura livre delas visa facilitar a colheita. O manejo é a forma de aproveitar a presença de plantas invasoras de maneira mais racional, evitando a concorrência e utilizando-as para melhorar a qualidade do solo. O manejo racional contribui para melhorar a estrutura e fertilidade do solo, propiciando: o aumento da infiltração de água; o decréscimo da perda de solo e de adubos; o não adensamento de camadas superficiais; o aumento do teor de matéria orgânica do solo; o estabelecimento de uma ação “antipercolante”, reciclando nutrientes; o decréscimo da amplitude térmica do solo, entre dia e noite, com reflexos positivos no crescimento e na produção dos cafeeiros; a elevação do nível de fertilidade do solo.</p><br>
                        <h3>Colheita: </h3><br>
                        <p> é realizada de abril a setembro. Iniciar a colheita quando houver no máximo 10% de frutos verdes, procedendo-se a derriça sobre panos. A colheita pode ser feita também com máquinas. Evitar a derriça diretamente no chão e não misturar o café de derriça com o café de varrição.</p><br>
                        <h3>Processamento</h3><br>
                        <p>o café pode ser preparado por via seca ou via úmida. Na via seca os frutos são secos com casca, obtendo-se o “café natural” ou “café em coco”. Na via úmida os frutos são descascados e posteriormente secos em pergaminho, com ou sem a mucilagem, obtendo-se o café “cereja descascado” (a mucilagem permanece aderida ao pergaminho) ou o café “desmucilado” (a mucilagem é removida mecanicamente em desmucilador) ou o café “despolpado” (a mucilagem é removida por processos biológicos em tanques de degomagem).</p><br>
                        <h3>Secagem: </h3><br>
                        <p>a secagem pode ser feita ao sol ou em secadores mecânicos. Na secagem ao sol devem ser utilizados terreiros pavimentados, espalhando-se o café em camadas de 2 a 3 cm de espessura. À medida que o café vai secando deve-se aumentar a espessura da camada, formando leiras. O café deve ser revolvido no mínimo 15 vezes ao dia, para obter uniformidade na secagem e ao atingir a “meia seca” precisa ser protegido/coberto para não reabsorver umidade durante a noite. Na secagem mecânica deve-se atentar para não ultrapassar o limite de temperatura de 40 a 45 °C na massa de café. A secagem é finalizada quando os grãos atingem teor de água de 11% a 12%.</p><br>
                        <h3>Qualidade: </h3><br>
                        <p>a qualidade do café é resultante de diversos fatores que compõem o sistema de produção, desde a escolha do cultivar, o manejo da lavoura, o momento de colheita e a forma de processamento pós-colheita. O cafeicultor deve conhecer a qualidade do café que produz e saber o que o mercado está exigindo, sempre buscando uma melhor forma de agregação de valor ao seu produto. No mercado de commodity os cafés são classificados segundo a Classificação Oficial Brasileira (COB), principalmente quanto ao tipo e qualidade de bebida, recebendo melhores preços aqueles de melhor tipo (menor quantidade de defeitos - do tipo 2 ao tipo 6) e melhor qualidade de bebida (bebida mole a bebida dura).</p><br>
                        <h3>Produtividade normal: 1.500 a 3.000 kg de café beneficiado por hectare.</h3><br>

                    </div>

                    <div id="videira " class="section" style="display:none;">
                        <h2>Videira </h2>
                        <p>A videira pertence à família Vitaceae, gênero Vitis. Destacam-se a Vitis vinifera L., de origem euro-asiática e a Vitis labrusca L., de origem americana.</p>
                        <br><br>
                        <h3>Uvas para mesa: </h3>
                        <br>
                        <p>dividem-se em comuns ou rústicas e finas. As principais uvas comuns ou rústicas cultivadas no Estado de São Paulo são a Niagara Rosada e a Niagara Branca.</p><br>
                        <h3>Uvas para indústria: </h3><br>
                        <p>dividem-se em comuns, híbridas e finas. As principais uvas comuns cultivadas no Estado de São Paulo para produção de vinho, suco, geleia, vinagre e derivados são Niagara Rosada, Niagara Branca, Isabel e Bordô e os porta-enxertos recomendados são os mesmos que para as uvas comuns para mesa.</p><br>
                        <h3>Uvas em potencial: </h3><br>
                        <p>cultivares IAC 871-41 Patrícia, IAC 21-14 Madalena, JD 930 Moscatel de Jundiaí, Concord, Isabel Precoce, BRS Morena, BRS Clara, BRS Linda, BRS Vitória, BRS Núbia, BRS Cora, BRS Violeta, BRS Carmem, BRS Magna, BRS Lorena e Moscato Embrapa.</p><br>
                        <h3>Clima: </h3><br>
                        <p>as videiras são plantas com capacidade de adaptação climática que, aliada à existência de uma grande quantidade de porta-enxertos, possibilita a escolha de combinações que melhor se adaptem às diferentes regiões ecológicas do Estado de São Paulo.</p><br>
                        <h3>Época de plantio: </h3><br>
                        <p>estacas de porta-enxertos não enraizadas: plantio direto no campo em julho e agosto; estacas pré-enraizadas de porta-enxertos conhecidas por “Barbados”: plantio de agosto a setembro; mudas de porta-enxertos enraizadas em sacolas plásticas: plantio de outubro a novembro; mudas prontas obtidas por enxertia de mesa: agosto a setembro. No plantio de estacas de porta-enxertos, a enxertia com a variedade copa deve ser realizada nos meses de julho a agosto do ano seguinte.</p><br>
                        <h3>Calagem:</h3><br>
                        <p>antes da implantação do vinhedo, recomenda-se a aplicação de calcário em área total, para elevar a saturação por bases a 80%. Recomenda-se, preferencialmente o calcário dolomítico, sendo incorporado o mais profundamente possível. Em vinhedos implantados, fazer a calagem em superfície na área total.</p><br>
                        <h3>Adubação</h3><br>
                        <p>Uvas comuns para mesa e para indústria: a) Na adubação de implantação, antes do plantio da videira, aplicar, por cova, 10 litros de esterco de curral, ou 3 litros de esterco de galinha, ou 500 g de torta de mamona, em mistura com a melhor terra de superfície e com a adubação mineral, conforme a análise do solo, com doses de P2 O5 e de K2 O variando de 40 a 80 g/cova e de 20 a 40 g/cova, respectivamente. Aplicar, em cobertura, aos 60 e 120 dias após o plantio dos porta-enxertos, 20 g de N por planta, por vez. <br> b) Na adubação de formação, após a enxertia, aplicar, segundo a análise do solo, 20 g de N/planta, 10 a 30 g de P2 O5 /planta, 10 a 30 g de K2 O/planta. Esta adubação deve ser realizada em cobertura, ao lado das plantas, parcelando em três vezes, sendo a primeiros 30 dias após a brotação e as demais até dezembro. Na adubação de implantação e de formação, consideram-se as quantidades acima utilizando o espaçamento de 2 por 1 m, com 5.000 plantas/ha. Em plantios mais adensados, deve-se ajustar a dose recomendada. <br> c) Na adubação de produção, recomenda-se a adubação mineral conforme a análise do solo e a meta de produtividade entre 13 a 22 t ha-1, com doses de N, P2 O5 e K2 O variando de, 70 a 130 kg ha-1, 80 a 500 kg ha-1 e 60 a 380 kg ha-1, respectivamente. Esta adubação deve ser parcelada em três vezes. A primeira parcela de adubação, que deve ser realizada 60 dias antes da poda, deve conter 100% do P e 50% do K, juntamente com 30 t ha-1 de esterco de curral ou 8 t ha-1 de cama de frango ou 2 t ha-1 de torta de mamona. Após a poda, quando os ramos estiverem com 2 a 3 folhas separadas, aplicar 50% da dose de N. O restante do N e do K deve ser aplicado quando as bagas estiverem entre as fases chumbinho e de meia baga. Deve-se aplicar o N e K em cobertura ao redor das plantas. Em caso de deficiência de boro, quanto o teor no solo for inferior a 0,2 mg DM-3, aplicar 2,5 kg ha-1 na ocasião da poda.</p><br>
                        <h3> Uvas finas para mesa e para indústria</h3><br>
                        <p> a) Na adubação de implantação, antes do plantio da videira, aplicar, por cova, 40 litros de esterco de curral, ou 10 litros de esterco de galinha, ou 2 kg de torta de mamona, em mistura com a melhor terra de superfície e com a adubação mineral, de acordo com a análise do solo, com doses de P2 O5 e de K2 O variando de, 100 a 300 g/cova e de 50 a 150 g/cova, respectivamente. Aplicar, em cobertura, aos 60 e 120 dias após o plantio dos porta-enxertos, 30 g de N por planta, por vez. <br> b) Na adubação de formação, após a enxertia, aplicar, de acordo com a análise do solo, 60 g de N/planta, 50 a 150 g de P2 O5 /planta, 50 a 100 g de K2 O/planta. Esta adubação deve ser realizada em cobertura, ao lado das plantas, parcelando em três vezes, sendo a primeira 30 dias após a brotação e as demais até dezembro. Na adubação de implantação e de formação, consideram-se as quantidades acima utilizando o espaçamento de 4 x 2,5 m com 1.000 plantas/ha. <br> c) Na adubação de produção, recomenda-se a adubação mineral de acordo com a análise do solo e a meta de produtividade entre 23 a 40 t ha-1, com doses de N, P2 O5 e K2 O variando de, 100 a 150 kg ha-1, 120 a 600 kg ha-1 e 120 a 480 kg ha-1, respectivamente. Esta adubação deve ser parcelada em três vezes, de maneira semelhante à recomendação para uvas comuns.</p><br>
                        <h3>Controle de pragas:</h3><br>
                        <p> Das raízes - pérola-da-terra ou margarodes - uso de porta-enxertos tolerantes ou inseticidas sistêmicos granulados no solo, como tiamethoxam e imidacloprid; filoxera - uso de porta-enxertos resistentes;
                            Do tronco e dos ramos - cochonilhas - tratamento de inverno com calda sulfocálcica ou raspando-se o tronco e aplicando óleo emulsionável a 1% mais um inseticida fosforado registrado; coleobrocas - retirar os restos da poda de inverno e queimá-los; cigarrinha-das-fruteiras - poda de inverno e pulverizações com inseticidas fosforados registrados;
                            Das folhas e dos brotos - maromba ou trombeta, grilo-mole, besouro-verde, filoxera na parte aérea, lagarta-das-folhas, besouros - pulverizações com inseticidas fosforados registrados; mosca-branca - imidacloprid e tiamethoxan; ácaros - pulverizações com acaricidas específicos;
                            Dos frutos - traça-dos-cachos - pulverizações com inseticidas piretroides registrados; mosca-das-frutas - ensacamento dos frutos e pulverizações com inseticidas à base de fentiom, triclorfon e malation; tripes - pulverizações com metildicarb.
                            Controle de doenças: Fúngicas - antracnose - pulverizações com fungicidas cymoxanil, mancozeb, tiofanato metílico e difenoconazol; peronóspora ou míldio - pulverizações com fungicidas cobre, mancozeb, maneb, metiram, propineb, ziram, ferbam, folpet, captan, fosetil-alumínio, metalaxil-M, benalaxil, fenamidone e dimetomorfe; oídio - pulverizações com fungicidas azoxestrobin, dinocap, piraclostobin, tolefluanid, fenamirol, difenoconazolmetriram + piraclostrobina, boscalid; mancha-das-folhas - pulverizações com fungicidas mancozeb, tiofanato metílico e difenoconazol; ferrugem - pulverizações com fungicidas calda bordalesa, zineb, maneb, ferbam e captafol; declínio-da-videira e botriodiplodiose: aplicação de tiofanato metílico nos cortes causados pela poda; podridão-amarga - pulverizações com fungicidas captan, ferban e maneb; podridão-da-uva-madura - Uva Boletim, IAC, 200, 2014 A.T.E. Aguiar et al. 408 pulverizações com o fungicida maneb nas bagas, durante todo o ciclo; podridão-negra - pulverizações com os fungicidas maneb e ferban; mofo-cinzento ou botritis - pulverizações com fungicidas captan, folpet, procimidone e iprodione; murcha-de-fusarium ou fusariose - usar porta-enxertos tolerantes como 1103 Paulsen, 99R e 110R.

                        </p><br>
                        <h3>Colheita: </h3><br>
                        <p>a) Regiões leste e sudoeste do Estado de São Paulo: compreendem as regiões de Jundiaí, Indaiatuba, Vinhedo, Valinhos, Louveira, Itupeva, Porto Feliz, Pilar do Sul e São Miguel Arcanjo. Realiza-se a colheita da safra de verão no período de dezembro a fevereiro, sendo proveniente da poda de inverno. Tem-se também a safra de inverno, no período de abril a junho, sendo proveniente da poda do enxerto e da poda de verão realizadas no período de novembro a fevereiro.
                            <br>b) Regiões noroeste e oeste do Estado de São Paulo: compreendem as regiões de Jales, Palmeira d’Oeste, Urânia, Dracena e Tupi Paulista. Realiza-se a colheita da uva no período de junho a novembro, entressafra das regiões leste e sudoeste do Estado de São Paulo. Para isso, realiza-se a poda de produção, nos meses de fevereiro a junho, e a poda de formação dos ramos, nos meses de outubro a novembro.

                        </p><br>
                        <h3>Produtividade:</h3><br>
                        <p>a produtividade da videira depende da variedade, do sistema de condução e do manejo das plantas. Pode variar desde valores abaixo de 10 t ha-1 em cultivos de uvas finas para vinho, em espaldeira, até 12, 15 até 18 t ha-1 para cultivares comuns para mesa ou indústria conduzidas em espaldeira, podendo atingir de 25 a 30 t ha-1, em uvas rústicas ou finas para mesa, ou indústria, em “Y”, ainda podendo ainda chegar até 40-50 t ha-1, nas uvas finas para mesa conduzidas em latada.</p><br>
                    </div>

                    <div id="Soja" class="section" style="display:none;">
                        <h2>Soja</h2><br><br>
                        <p>A soja é uma leguminosa de ciclo anual (90-150 dias), de porte ereto, de crescimento determinado ou indeterminado, com altura final das plantas variando de 45 a 120 cm, dependendo da cultivar, da época da semeadura, da latitude local e da fertilidade do solo. É recomendável o cultivo de genótipos de ciclos diferentes para maior eficiência na utilização de colhedoras automotrizes e mão de obra e para minimizar as perdas por riscos climáticos (veranicos ou excesso de chuvas), em fases críticas, enchimento de grãos e maturação, respectivamente. Glycine max L.; faz parte da família Fabaceae.</p><br>
                        <h3>Calagem: </h3><br>
                        <p>com base na análise do solo, aplicar calcário para elevar a saturação por bases a 60%</p><br>
                        <h3>Adubação nitrogenada: </h3><br>
                        <p>evitar adubação mineral nitrogenada devido à sua interferência negativa na fixação simbiótica.</p><br>
                        <h3>Adubação de plantio: </h3><br>
                        <p>com base na análise do solo e na produtividade esperada (superior a 2.700 kg ha-1), aplicar 40 a 80 kg ha-1 de P2 O5 e 0 a 80 kg ha-1 de K2 O, no sulco. Para doses de K2 O superiores a 60 kg ha-1, sugere-se parcelar metade da quantidade total no plantio e metade em cobertura, 30 a 40 dias após a germinação, principalmente em solos arenosos. Se necessário, aplicar 15 kg ha-1 de enxofre (S) para cada tonelada de produtividade esperada de grãos, mediante o uso de superfosfato simples na adubação básica de semeadura.</p><br>
                        <h3>Outros tratos culturais: </h3><br>
                        <p>evitar a competição desfavorável de plantas daninhas no período vegetativo (primeiros 30 dias, pós-emergência). Para isso, usar herbicidas (pré-plantio incorporado, pré-emergência e pós-emergência) e cultivos mecânicos apropriados.</p><br>
                        <h3>Controle de pragas e doenças:</h3><br>
                        <p>efetuá-lo por manejo integrado, visando preservar ao máximo a população dos inimigos naturais das pragas. Os danos causados por pragas são mais graves a partir da fase reprodutiva da soja (besouros e lagartas), tanto pela destruição da área foliar, que não mais será reposta, como pela danificação dos órgãos reprodutivos (vagens e grãos), causada por percevejos e lagartas. Há doenças que podem causar perdas econômicas como cancro da haste (Diaporthe phaseolorum f. sp. meridionalis), oídio, mosaico comum (SMV) e nematoides de galhas (Meloidogyne sp.) e do cisto (Heterodera glycines), que poderão ser controladas por cultivares resistentes e/ou utilização de sementes sadias. A escolha dos agrotóxicos e sua aplicação deverão ser orientadas por profissionais treinados e competentes para assistência técnica.</p><br>
                        <h3>Produtividade normal: </h3><br>
                        <p>em condições normais, o rendimento em grãos varia de 2.700 a 4.000 kg ha-1.</p><br>

                    </div>
                    <div id="Milho" class="section" style="display:none;">
                        <h2>Milho</h2>
                        <p>Gramínea anual da família Poaceae, nome cientifico Zea mays,do México, anual, com 1,5 a 3,0 m de altura no florescimento, cultivada no verão e na segunda safra (milho safrinha). O consumo dos grãos pode ser feito tanto na propriedade como na indústria para extração de óleo e amido, fabricação de alimentos e rações, podendo ainda ser utilizado como milho verde para consumo dos grãos in natura ou como ingrediente na culinária tradicional.</p><br>
                        <h3>Sementes necessárias: </h3><br>
                        <p>em cultivares transgênicas, utilizar aproximadamente 5% a mais de sementes em relação a população inicial de plantas e em cultivares convencionais, 5% a 10%, dependendo do manejo e umidade do solo e do histórico de ocorrência de pragas iniciais. A maioria das sementes de milho é comercializada em sacos de 60.000 sementes e com peso variando de 13 a 15 kg, para sementes miúdas até 18 a 23 kg, para sementes graúdas.</p><br>
                        <h3>Controle de erosão: </h3><br>
                        <p>uso de sistema de plantio direto e, em áreas com declive maior que 3%, indicam-se o plantio em nível associado ao terraceamento, e as práticas conservacionistas complementares, de acordo com o tipo de solo, classe de capacidade de uso das terras, manejo e rotação de culturas adotados.</p><br>
                        <h3>Calagem: </h3><br>
                        <p>com base na análise química do solo na camada de 0-20 cm, aplicar calcário antes da safra de verão, para elevar a saturação por bases (V) a 70% e o magnésio a um teor mínimo de 4 mmolc dm-3. Em solos com mais de 50 mg dm-3 de matéria orgânica, basta elevar V a 50%.</p><br>
                        <h3>Adubação de semeadura: </h3><br>
                        <p>utilizar os resultados da análise do solo na camada 0-20 cm e a meta de produtividade para recomendação de fósforo, potássio e micronutrientes.</p><br>
                        <h3>Adubação de cobertura: </h3><br>
                        <p> aplicar o nitrogênio em cobertura de acordo com a meta de produtividade e o histórico de uso da área, utilizando doses maiores para solos de textura arenosa, preparo convencional, início de sistema plantio direto e grande quantidade de resíduos de gramíneas (alta resposta) e menores doses para solos argilosos, sistema plantio direto consolidado e sucessão com leguminosas (baixa resposta).</p><br>
                        <h3>Controle de plantas daninhas: </h3><br>
                        <p>o controle manual ou mecânico está restrito às pequenas áreas que ainda utilizam o sistema convencional de preparo do solo; geralmente são realizados um ou dois cultivos rasos, o primeiro próximo do estádio de 4/5 folhas e o segundo no estádio de 9/10 folhas. No controle químico, a escolha de um herbicida isolado ou de uma formulação contendo dois ou mais herbicidas deverá ser feita com base no levantamento prévio da infestação existente no local da lavoura.</p><br>
                        <h3>Produtividade normal: </h3><br>
                        <p>milho grão - safra de verão e milho irrigado, 6 a 14 t ha-1; <br> safrinha - 4 a 8 t ha-1; <br> milho verde - 8 a 16 t ha-1 de espigas com palha.</p><br>
                    </div>
                </div>






            </div>


            <script>
                function showSection() {
                    const dropdown = document.getElementById('dropdown');
                    const selectedValue = dropdown.value;

                    const sections = document.querySelectorAll('.section');
                    sections.forEach(section => {
                        if (section.id === selectedValue) {
                            section.style.display = 'block';
                        } else {
                            section.style.display = 'none';
                        }
                    });
                }
            </script>

            <footer>
                <p>Todos os direitos reservados </p>
                <img src="imagem/8_Sem_Título__1_-removebg-preview.png" alt="Logo" class="logo_f">
            </footer>
        </div>
        <script src="script.js"></script>
    </body>