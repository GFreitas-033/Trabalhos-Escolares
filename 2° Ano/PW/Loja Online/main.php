<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mercado Express</title>
    <style>
        body{
            background-color: #5f5f5f;
        }

        .span{
            color: red;
            background-color: black;
            padding: 0.44rem;
        }

        .btn-preco{
            display: block;
            float: right;
            margin-right: 1.5rem;
            margin-top: 5rem;
        }

        .img{
            width: 10rem;
            height: 10rem;
            float: left;
        }


        .container-produto{
            margin: 4rem; 
            background-color: #ccc;
            height: 10rem;
        }

        .titulo-produto{
            text-align: center;
        }

        .descricao-produto{
            font-size: 0.7rem;
            margin-bottom: 1rem;
            margin-left: 11rem;
        }

        .submit{
            color: red;
            background-color: black;
            cursor: pointer; 
            padding: 0.6rem;
        }
        .submit:hover{
            background-color: white;
            color: black;
        }
    </style>
</head>
<body>
    <?php
        include 'header.html';
        include 'funcoes.php';

        if(isset($_POST['pro1'])){      
            $_SESSION['lista_de_compras'] = adicionarProduto($_SESSION['lista_de_compras'], "Controle R$142,49");
        }
        if(isset($_POST['pro2'])){      
            $_SESSION['lista_de_compras'] = adicionarProduto($_SESSION['lista_de_compras'], "Placa de Vídeo R$1.075,02");
        }
        if(isset($_POST['pro3'])){      
            $_SESSION['lista_de_compras'] = adicionarProduto($_SESSION['lista_de_compras'], "HEADSET R$699,00");
        }
        if(isset($_POST['pro4'])){      
            $_SESSION['lista_de_compras'] = adicionarProduto($_SESSION['lista_de_compras'], "Teclado R$245,50");
        }
        if(isset($_POST['pro5'])){      
            $_SESSION['lista_de_compras'] = adicionarProduto($_SESSION['lista_de_compras'], "Mouse R$680,00");
        }
        if(isset($_POST['pro6'])){      
            $_SESSION['lista_de_compras'] = adicionarProduto($_SESSION['lista_de_compras'], "Memória Ram R$594,00");
        }
        if(isset($_POST['pro7'])){      
            $_SESSION['lista_de_compras'] = adicionarProduto($_SESSION['lista_de_compras'], "Processador R$1.529,70");
        }
        if(isset($_POST['pro8'])){      
            $_SESSION['lista_de_compras'] = adicionarProduto($_SESSION['lista_de_compras'], "Gabinete R$330,00");
        }
        if(isset($_POST['pro9'])){      
            $_SESSION['lista_de_compras'] = adicionarProduto($_SESSION['lista_de_compras'], "Cadeira Gamer R$1.579,90");
        }    

        exibirLista($_SESSION['lista_de_compras']);
        
    ?>
<form action="" method="post">
    <div class="container-produto">
        <img src="img/produto1.jpg" class="img">
        <h3 class="titulo-produto">Controle sem fio Bluetooth OSTENT Gamepad Joystick para console Nintendo Switch</h3>
        <div class="btn-preco">
            <span class="span">R$142,49</span>
            <input type="submit" name="pro1" value="Adicionar ao Carrinho" class="submit">
        </div>
        <p class="descricao-produto">Características: <br>
            * Dois motores elétricos para uma melhor experiência de jogo <br>
            * Porta de carregamento tipo C permite que você use o seu adaptador tipo C original para carregar o seu controle. <br>
            * Bateria de íons de lítio incorporada de 3,7 V/400 mAh <br>
            O pacote inclui: <br>
            * 1 x controle <br>
            * 1 x cabo carregador.
        </p>
    </div>

    <div class="container-produto">
        <img src="img/produto2.jpg" class="img">
        <h3 class="titulo-produto">Placa de Vídeo RX580 8GB GDDR5</h3>
        <div class="btn-preco">
            <span class="span">R$1.075,02</span>
            <input type="submit" name="pro2" value="Adicionar ao Carrinho" class="submit">
        </div>
        <p class="descricao-produto">Características: <br>
            * Radeon RX580, suporta mineração, hashrate de mineração na faixa de 28-30MH/S. <br>
            * Chipset: AMD Radeon RX 580, Memória de vídeo: 8 GB GDDR5, Boost Clock: 1370 MHz. <br>
            * PCIe 3.0: A placa gráfica de jogos Mllse RX580 usa slot gráfico PCI Express 3.0, plug and play, fácil de usar, bom desempenho. <br>
            O pacote inclui: <br>
            * 1 x Placa de Vídeo RX580<br>
        </p>
    </div>

    <div class="container-produto">
        <img src="img/produto3.jpg" class="img">
        <h3 class="titulo-produto">HEADSET GAMER HI-RES BLUETOOTH</h3>
        <div class="btn-preco">
            <span class="span">R$699,00</span>
            <input type="submit" name="pro3" value="Adicionar ao Carrinho" class="submit">
        </div>
        <p class="descricao-produto">Características: <br>
            * Orelhas de gato magnéticas. <br>
            * Áudio de alta resolução certificado com até 36 horas de duração da bateria. <br>
            * Posicionamento acústico preciso conforto prolongado. <br>
            O pacote inclui: <br>
            * 1 x HEADSET GAMER<br>
            * 1 x Cabo de Carregamento<br>
        </p>
    </div>

    <div class="container-produto">
        <img src="img/produto4.jpg" class="img">
        <h3 class="titulo-produto">Teclado Mecanico Gamer Pc Led Rgb Usb C Switch Blue</h3>
        <div class="btn-preco">
            <span class="span">R$245,50</span>
            <input type="submit" name="pro4" value="Adicionar ao Carrinho" class="submit">
        </div>
        <p class="descricao-produto">Características: <br>
            * Teclado Branco e Preto. <br>
            * Aumente sua experiência gamer com o TECLADO MECÂNICO, KP-TE100. <br>
            * Com o teclado USB, Teclas grandes com pressionamento suave e confortável. <br>
            O pacote inclui: <br>
            * 1 x Teclado RGB chroma<br>
            * 1 x Manual de instruções<br>
        </p>
    </div>
    <div class="container-produto">
        <img src="img/produto5.jpg" class="img">
        <h3 class="titulo-produto">Mouse Gamer Sem Fio Logitech G502 X PLUS LIGHTSPEED</h3>
        <div class="btn-preco">
            <span class="span">R$680,00</span>
            <input type="submit" name="pro5" value="Adicionar ao Carrinho" class="submit">
        </div>
        <p class="descricao-produto">Características: <br>
            * Nova tecnologia de switches híbridos óptico-mecânicos para mais velocidade e confiabilidade. <br>
            * Resposta imediata e horas de desempenho. <br>
            * Iluminação personalizável e inteligente, adaptando-se ao seu jogo. <br>
            O pacote inclui: <br>
            * 1 x Mouse Gamer Logitech G502<br>
            * 1 x Cabo para Carregamento<br></p>
    </div>
    <div class="container-produto">
        <img src="img/produto6.jpg" class="img">
        <h3 class="titulo-produto">Memória Ram 16gb (2x8gb) Asgard Loki W2 Rgb 3200mhz Ddr4</h3>
        <div class="btn-preco">
            <span class="span">R$594,00</span>
            <input type="submit" name="pro6" value="Adicionar ao Carrinho" class="submit">
        </div>
        <p class="descricao-produto">Características: <br>
            * Marca/modelo: Asgard Loki W2 RGB DDR4. <br>
            * Frequência: 3200MHz. <br>
            * Certificados: Ce, rohs, fcc, iso9001. <br>
            O pacote inclui: <br>
            * 2 x Memória Ram 16gb Asgard Loki<br></p>
    </div>
    <div class="container-produto">
        <img src="img/produto7.jpg" class="img">
        <h3 class="titulo-produto">Processador AMD Ryzen 9 7950X Box</h3>
        <div class="btn-preco">
            <span class="span">R$1.529,70</span>
            <input type="submit" name="pro7" value="Adicionar ao Carrinho" class="submit">
        </div>
        <p class="descricao-produto">Características: <br>
            * O melhor para criadores e o melhor para os jogadores, pode proporcionar desempenho ultrarrápido. <br>
            * 16 núcleos e 32 fios de processamento, baseados na arquitetura AMD "Zen 4". <br>
            * 5,7 GHz Max Boost, desbloqueado para overclocking, 80 MB de cache, suporte DDR5-5200. <br>
            O pacote inclui: <br>
            * 1 x Processador AMD Ryzen 9 7950X<br>
            * 1 x Pasta Térmica Grizzly Kryonaut 1g<br></p>
    </div>
    <div class="container-produto">
        <img src="img/produto8.jpg" class="img">
        <h3 class="titulo-produto">Gabinete Gamer Superframe Storm Sem Fan Mid Towe Rgb</h3>
        <div class="btn-preco">
            <span class="span">R$330,00</span>
            <input type="submit" name="pro8" value="Adicionar ao Carrinho" class="submit">
        </div>
        <p class="descricao-produto">Características: <br>
            * Compatível com uma ampla gama de placas-mãe, incluindo ITX, Micro ATX e ATX. <br>
            * Customizável e compatível com diversas configurações. <br>
            * Possui suporte para watercoolers de 120mm e 240mm. <br>
            O pacote inclui: <br>
            * 1 x Gabinete Gamer SuperFrame Storm<br></p>
    </div>
    <div class="container-produto">
        <img src="img/produto9.jpg" class="img">
        <h3 class="titulo-produto">AKRacing AK RD Masters Series Pro Luxury XL Cadeira de jogos, vermelha</h3>
        <div class="btn-preco">
            <span class="span">R$1.579,90</span>
            <input type="submit" name="pro9" value="Adicionar ao Carrinho" class="submit">
        </div>
        <p class="descricao-produto">Características: <br>
            * Estofado de couro sintético perfurado na frente e atrás. <br>
            * Armação de metal larga com 70% mais espuma curvada a frio para o máximo de conforto e durabilidade. <br>
            * Mecanismo avançado com posições de inclinação traváveis. <br>
            O pacote inclui: <br>
            * 1 x Cadeira de jogos, vermelha<br>
            * Conjunto de almofada<br></p>
    </div>
</form>
    <?php
        include 'footer.html';
    ?>
</body>
</html>