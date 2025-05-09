<?php
    include 'zproteger.php';
    include 'header.html';
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mercado Express</title>
    <style>
        *{
            margin: 0 0;
            padding: 0 0;
        }

        .container{
            text-align: center;
            background-color: #ccc;
        }

        body{
            background-color: #ccc;
        }

        .titulo{
            font-size: 2rem;
        }

        .paragrafo{
            font-size: 1.3rem;
            margin-bottom: 1rem;
        }

        .colorbar{
            width: 100vw;
            height: 0.1rem;
        }

        @media screen and (min-width: 320px){
            .logo-quem{
                width: 300px;
                height: 300px;
            }
        }

        @media screen and (min-width: 720px){
            .logo-quem{
                width: 360px;
                height: 360px;
            }
        }

        @media screen and (min-width: 1200px){
            .logo-quem{
                width: 500px;
                height: 500px;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <img src="img/MercadoExpress.png" class="logo-quem">
        <h1 class='titulo'>Mercado Express: A Sua Loja Online de Confiança</h1>

        <p class="paragrafo">Bem-vindo ao Mercado Express, o seu destino online para todas as suas necessidades de compras. Somos um comércio eletrônico fictício dedicado a oferecer a você uma experiência de compra excepcional, conveniente e confiável.
        Fundado em 2020, o Mercado Express foi criado com a missão de tornar a compra online uma jornada simples e gratificante. Oferecemos uma variedade de produtos de alta qualidade, com foco nos eletrônicos. Nossa equipe trabalha incansavelmente para garantir que você encontre tudo o que precisa em um só lugar.</p>
        
        <img src="img/colorbar.gif" class="colorbar">
        <p class="paragrafo"><b><i>Por que escolher o Mercado Express:</b></i></p>

        <p class="paragrafo"><b>1.</b> Variedade: Com uma extensa gama de produtos, você pode explorar e encontrar tudo o que precisa, eletrônicos de última geração até produtos para o lar e muito mais. Temos algo para todos os tipos de Gamers.</p>
        <p class="paragrafo"><b>2.</b> Qualidade Garantida: No Mercado Express, a qualidade é nossa prioridade. Trabalhamos apenas com fornecedores confiáveis e produtos de alta qualidade para garantir que sua compra seja sempre satisfatória.</p>
        <p class="paragrafo"><b>3.</b> Experiência de Compra Simples: Navegar pelo nosso site é fácil e intuitivo. Nosso layout amigável e recursos de pesquisa eficazes tornam a busca por produtos uma tarefa simples.</p>
        <p class="paragrafo"><b>4.</b> Entrega Rápida e Confiável: Com a opção de entrega expressa, você pode receber os produtos no conforto da sua casa em um prazo mínimo. Priorizamos a entrega segura e pontual.</p>
        <p class="paragrafo"><b>5.</b> Atendimento ao Cliente de Excelência: Nossa equipe de atendimento ao cliente está pronta para atender às suas dúvidas, ajudar com problemas e garantir que sua experiência seja perfeita.</p>
        <p class="paragrafo"><b>6.</b> Promoções Especiais: Oferecemos promoções regulares, descontos e ofertas especiais para que você possa economizar ainda mais em suas compras.</p>
        <img src="img/colorbar.gif" class="colorbar">

        <p class="paragrafo">No Mercado Express, acreditamos que uma experiência de compra satisfatória é uma parte fundamental de nossas vidas cotidianas. 
            Estamos comprometidos em tornar suas compras online convenientes, acessíveis e seguras. Explore o Mercado Express hoje e descubra um mundo de opções de compras emocionantes. 
            Estamos ansiosos para servi-lo e garantir que sua jornada de compras seja nada menos do que excepcional. Muito obrigado por escolher o Mercado Express como seu destino de compras online preferido.</p>
    </div>
</body>
</html>

<?php
    include 'footer.html';
?>