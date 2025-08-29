package atividade;

import java.util.Scanner;

public class Agendamento {
    Scanner ler = new Scanner(System.in);
    public String dtInscricao;
    public String dtInicio;
    public String dtTermino;
    public String frequencia;

    //Atendimento novoAtendimento = new Atendimento();

    public void cadastrarAgendamento(){
        System.out.println("Data de Inscrição:");
        dtInscricao = ler.nextLine();
        System.out.println("Data de Inicio:");
        dtInicio = ler.nextLine();
        System.out.println("Data de Termino:");
        dtTermino = ler.nextLine();
        System.out.println("Frequencia:");
        frequencia = ler.nextLine();
    }
}
