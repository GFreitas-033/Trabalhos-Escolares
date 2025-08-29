package atividade;

import java.util.Scanner;

public class Contato{
    Scanner ler = new Scanner(System.in);
    public String telefonePessoal;
    public String telefoneRecado;
    public String cidade;
    public String rua;
    public String numero;
    public String bairro;
    public String cep;

    public void cadastrarContato(){
        System.out.println("Telefone Pessoal:");
        telefonePessoal = ler.nextLine();
        System.out.println("Telefone de Recados:");
        telefoneRecado = ler.nextLine();
        System.out.println("Cidade:");
        cidade = ler.nextLine();
        System.out.println("Rua:");
        rua = ler.nextLine();
        System.out.println("Número:");
        numero = ler.nextLine();
        System.out.println("Bairro:");
        bairro = ler.nextLine();
        System.out.println("CEP:");
        cep = ler.nextLine();
    }
}
