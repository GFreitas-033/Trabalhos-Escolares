<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <title>Herança e Polimorfismo</title>
    </head>
    <body>
        <?php
        require_once './Conta.php';  //Inclui a classe Conta
        require_once './ContaCorrente.php';  //Inclui a classe ContaCorrente
        require_once './ContaPoupanca.php';  //Inclui a classe ContaPoupanca
        require_once './ContaSalario.php';  //Inclui a classe ContaSalario
        
        $cntCorr = new ContaCorrente(); //Instancia um objeto da classe ContaCorrente
        $cntCorr->setAgencia('7768-4'); //Atribui a Angência
        $cntCorr->setConta('11229-8'); //Atribui o número da conta
        $cntCorr->setSaldo(0.0); //Saldo inicial
        
        echo "Saldo Atual: {$cntCorr->getSaldo()}<br>";
        $cntCorr->depositar(100.0);
        echo "Saldo Atual: {$cntCorr->getSaldo()}<br>";
        $cntCorr->sacar(10.0);
        echo "Saldo Atual: {$cntCorr->getSaldo()}<br>";
        $cntCorr->sacar(100.0);
        echo "Saldo Atual: {$cntCorr->getSaldo()}<br>";
        ?>
    </body>
</html>
