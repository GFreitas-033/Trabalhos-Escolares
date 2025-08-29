package atividade;

import java.util.Scanner;

public class Main {
    public static void main(String[] args){
        Scanner ler = new Scanner(System.in);
        int i=0;
        String opcao;

        while(i==0){
            System.out.println("Menu de Cadastros:");
            System.out.println("1 - Cadastrar Cliente");
            System.out.println("2 - Cadastrar Atendimento");
            System.out.println("3 - Cadastrar Encaminhamento");
            System.out.println("4 - Cadastrar Agendamento");
            System.out.println("X - Sair");
            opcao = ler.nextLine();

            switch (opcao){
                case "1":
                    Cliente novoCliente = new Cliente();
                    novoCliente.cadastrarCliente(); break;
                case "2":
                    Atendimento novoAtendimento = new Atendimento();
                    novoAtendimento.cadastrarAtendimento(); break;
                case "3":
                    Encaminhamento novoEncaminhamento = new Encaminhamento();
                    novoEncaminhamento.cadastrarEncaminhamento(); break;
                case "4":
                    Agendamento novoAgendamento = new Agendamento();
                    novoAgendamento.cadastrarAgendamento(); break;
                case "x": i=1; break;
                case "X": i=1; break;
                default: System.out.println("Opção Invalida!!!"); break;
            }
        }
    }
}
