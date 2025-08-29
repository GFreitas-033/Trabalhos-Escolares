package atividade;

import java.util.Scanner;

public class Cliente {
    Scanner ler = new Scanner(System.in);
    public String nome;
    public String responsavel;
    public char genero;
    public String dtNasc;
    public int idade;
    public String faixaEtaria;

    Contato novoContato = new Contato();

    public void cadastrarCliente(){
        System.out.println("Nome:");
        nome = ler.nextLine();
        System.out.println("Responsavel:");
        responsavel = ler.nextLine();
        System.out.println("Genero: M-Masculino/F-Feminino/O-Outro");
        genero = ler.next().charAt(0);
        System.out.println("Data de Nascimento: DD/MM/AAAA");
        dtNasc = ler.nextLine();
        System.out.println("Idade:");
        idade = ler.nextInt();
        if(idade <= 5){
            faixaEtaria = "Bebe";
        } else if(idade > 5 && idade <= 15) {
            faixaEtaria = "Criança";
        }else if(idade > 15 && idade <= 25){
            faixaEtaria = "Adolecente";
        }else if(idade > 25 && idade <= 60){
            faixaEtaria = "Adulto";
        }else if(idade > 60){
            faixaEtaria = "Idoso";
        }
        novoContato.cadastrarContato();
    }
}
