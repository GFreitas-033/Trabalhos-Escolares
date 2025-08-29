<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <title>Classe, Atributos e Métodos</title>
    </head>
    <body>
        <?php
        require_once './Conta.php';  //Inclui a classe Conta
        $cnt = new Conta();   //Instancia um objeto da classe Conta

        //$cnt->agencia = '7768-4'; //Atribui a Agência
        //$cnt->conta = '11229-8'; //Atribui o número da conta
        //$cnt->saldo = 0.0; //Saldo inicial
        
        $cnt->setAgencia('7768-4'); //Atribui a Angência
        $cnt->setConta('11229-8'); //Atribui o número da conta
        $cnt->setSaldo(0.0); //Saldo inicial
        
        // echo "Saldo Atual: {$cnt->saldo()}<br>";
        // $cnt->depositar(100.0);
        // echo "Saldo Atual: {$cnt->saldo()}<br>";
        // $cnt->sacar(10.0);
        // echo "Saldo Atual: {$cnt->saldo()}<br>";
        // $cnt->sacar(100.0);
        // echo "Saldo Atual: {$cnt->saldo()}<br>";
        
        echo "Saldo Atual: {$cnt->getSaldo()}<br>";
        $cnt->depositar(100.0);
        echo "Saldo Atual: {$cnt->getSaldo()}<br>";
        $cnt->sacar(10.0);
        echo "Saldo Atual: {$cnt->getSaldo()}<br>";
        $cnt->sacar(100.0);
        echo "Saldo Atual: {$cnt->getSaldo()}<br>";

        //Copiando um objeto com o operador de atribuição - Errado
        $cnt2 = $cnt; 
        $cnt2->setSaldo(200.00);
        echo "<br>Saldo Conta original: {$cnt->getSaldo()}<br>";
        echo "Saldo Conta copiada: {$cnt2->getSaldo()}<br>";
                
        //Clonando um objeto com clone - Correto
        $cntClone = clone $cnt; 
        $cntClone->setSaldo(300.00);
        echo "<br>Saldo Conta original: {$cnt->getSaldo()}<br>";
        echo "Saldo Conta Clonada: {$cntClone->getSaldo()}<br>";        
        ?>
    </body>
</html>