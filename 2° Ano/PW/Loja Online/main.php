<?php
    include 'zproteger.php';
    include 'header.html';
    include 'funcoes.php';

    if(isset($_POST['pro1'])){   
        $preco = 142.49;
        $_SESSION['total'] = adicionarProduto($_SESSION['total'], $preco);
        $_SESSION['lista_de_compras'] = adicionarProduto($_SESSION['lista_de_compras'], "Controle R$142,49");
    }
    if(isset($_POST['pro2'])){      
        $preco = 1075.02;
        $_SESSION['total'] = adicionarProduto($_SESSION['total'], $preco);
        $_SESSION['lista_de_compras'] = adicionarProduto($_SESSION['lista_de_compras'], "Placa de Vídeo R$1075,02");
    }
    if(isset($_POST['pro3'])){      
        $preco = 699.00;
        $_SESSION['total'] = adicionarProduto($_SESSION['total'], $preco);
        $_SESSION['lista_de_compras'] = adicionarProduto($_SESSION['lista_de_compras'], "HEADSET R$699,00");
    }
    if(isset($_POST['pro4'])){      
        $preco = 245.50;
        $_SESSION['total'] = adicionarProduto($_SESSION['total'], $preco);
        $_SESSION['lista_de_compras'] = adicionarProduto($_SESSION['lista_de_compras'], "Teclado R$245,50");
    }
    if(isset($_POST['pro5'])){      
        $preco = 680.00;
        $_SESSION['total'] = adicionarProduto($_SESSION['total'], $preco);
        $_SESSION['lista_de_compras'] = adicionarProduto($_SESSION['lista_de_compras'], "Mouse R$680,00");
    }
    if(isset($_POST['pro6'])){      
        $preco = 594.00;
        $_SESSION['total'] = adicionarProduto($_SESSION['total'], $preco);
        $_SESSION['lista_de_compras'] = adicionarProduto($_SESSION['lista_de_compras'], "Memória Ram R$594,00");
    }
    if(isset($_POST['pro7'])){      
        $preco = 1529.70;
        $_SESSION['total'] = adicionarProduto($_SESSION['total'], $preco);
        $_SESSION['lista_de_compras'] = adicionarProduto($_SESSION['lista_de_compras'], "Processador R$1529,70");
    }
    if(isset($_POST['pro8'])){      
        $preco = 330.00;
        $_SESSION['total'] = adicionarProduto($_SESSION['total'], $preco);
        $_SESSION['lista_de_compras'] = adicionarProduto($_SESSION['lista_de_compras'], "Gabinete R$330,00");
    }
    if(isset($_POST['pro9'])){      
        $preco = 1579.90;
        $_SESSION['total'] = adicionarProduto($_SESSION['total'], $preco);
        $_SESSION['lista_de_compras'] = adicionarProduto($_SESSION['lista_de_compras'], "Cadeira Gamer R$1579,90");
    }  
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mercado Express</title>
    <style>
        body{
            background: linear-gradient(160deg, rgba(0,0,0,1) 17%, rgba(113,115,113,1) 84%, rgba(175,175,175,1) 97%);
        }

        .submit{
            color: red;
            background-color: black;
            cursor: pointer; 
            border: none;
        }
        .submit:hover{
            background-color: #1f1e1e;
            color: white;
        }

        @media screen and (min-width: 320px){
            #form3{
                display: grid;
                grid-template-columns: auto;
            }

            .container-produto{
                margin: 20px;
                background-color: #ccc;
                display: grid;
                grid-template-columns: auto auto;
                grid-template-rows: auto auto;
            }

            .img{
                width: 130px;
                height: 130px;
                margin-right: 5px; 
            }

            .titulo-produto{
                font-size: 16px;
            }

            .span{
                display: flex;
                align-items: center;
                justify-content: center;
                color: red;
                background-color: black;
            }

            .submit{
                padding: 10px;
            }
        }

        @media screen and (min-width: 720px){
            #form3{
                display: grid;
                grid-template-columns: auto auto;
            }

            .container-produto{
                margin: 20px;
                background-color: #ccc;
                display: grid;
                grid-template-columns: auto auto;
                grid-template-rows: auto auto;
            }

            .img{
                width: 160px;
                height: 160px;
                margin-right: 5px; 
            }

            .titulo-produto{
                font-size: 16px;
            }

            .span{
                display: flex;
                align-items: center;
                justify-content: center;
                color: red;
                background-color: black;
            }

            .submit{
                padding: 10px;
            }
        }

        @media screen and (min-width: 1200px){
            #form3{
                display: grid;
                grid-template-columns: 2fr 2fr 2fr;
            }

            .container-produto{
                margin: 50px;
                background-color: #ccc;
                display: grid;
                grid-template-columns: auto auto;
                grid-template-rows: auto auto;
            }

            .img{
                width: 160px;
                height: 160px;
                margin-right: 5px; 
            }

            .titulo-produto{
                font-size: 16px;
            }

            .span{
                display: flex;
                align-items: center;
                justify-content: center;
                color: red;
                background-color: black;
            }

            .submit{
                padding: 10px;
            }
        }
    </style>
</head>
<body>
    <form action="" method="post" id="form3">
        <div class="container-produto">
            <img src="img/produto1.jpg" class="img">
            <h3 class="titulo-produto">Controle sem fio Bluetooth OSTENT Gamepad Joystick</h3>
            <span class="span">R$142,49</span>
            <input type="submit" name="pro1" value="Adicionar ao Carrinho" class="submit">
        </div>

        
        <div class="container-produto">
            <img src="img/produto2.jpg" class="img">
            <h3 class="titulo-produto">Placa de Vídeo RX580 8GB GDDR5</h3>
            <span class="span">R$1.075,02</span>
            <input type="submit" name="pro2" value="Adicionar ao Carrinho" class="submit">
        </div>


        <div class="container-produto">
            <img src="img/produto3.jpg" class="img">
            <h3 class="titulo-produto">HEADSET GAMER HI-RES BLUETOOTH</h3>
            <span class="span">R$699,00</span>
            <input type="submit" name="pro3" value="Adicionar ao Carrinho" class="submit">
        </div>


        <div class="container-produto">
            <img src="img/produto4.jpg" class="img">
            <h3 class="titulo-produto">Teclado Mecanico Gamer Pc Led Rgb Usb C Switch Blue</h3>
            <span class="span">R$245,50</span>
            <input type="submit" name="pro4" value="Adicionar ao Carrinho" class="submit">
        </div>


        <div class="container-produto">
            <img src="img/produto5.jpg" class="img">
            <h3 class="titulo-produto">Mouse Gamer Sem Fio Logitech G502 X PLUS LIGHTSPEED</h3>
            <span class="span">R$680,00</span>
            <input type="submit" name="pro5" value="Adicionar ao Carrinho" class="submit">
        </div>


        <div class="container-produto">
            <img src="img/produto6.jpg" class="img">
            <h3 class="titulo-produto">Memória Ram 16gb (2x8gb) Asgard Loki W2 Rgb 3200mhz Ddr4</h3>
            <span class="span">R$594,00</span>
            <input type="submit" name="pro6" value="Adicionar ao Carrinho" class="submit">
        </div>


        <div class="container-produto">
            <img src="img/produto7.jpg" class="img">
            <h3 class="titulo-produto">Processador AMD Ryzen 9 7950X Box</h3>
            <span class="span">R$1.529,70</span>
            <input type="submit" name="pro7" value="Adicionar ao Carrinho" class="submit">
        </div>


        <div class="container-produto">
            <img src="img/produto8.jpg" class="img">
            <h3 class="titulo-produto">Gabinete Gamer Superframe Storm Sem Fan Mid Towe Rgb</h3>
            <span class="span">R$330,00</span>
            <input type="submit" name="pro8" value="Adicionar ao Carrinho" class="submit">
        </div>


        <div class="container-produto">
            <img src="img/produto9.jpg" class="img">
            <h3 class="titulo-produto">AKRacing AK RD Masters Series Pro Luxury Cadeira de jogos</h3>
            <span class="span">R$1.579,90</span>
            <input type="submit" name="pro9" value="Adicionar ao Carrinho" class="submit">
        </div>
    </form>
</body>
</html>
<?php
    include 'footer.html';
?>