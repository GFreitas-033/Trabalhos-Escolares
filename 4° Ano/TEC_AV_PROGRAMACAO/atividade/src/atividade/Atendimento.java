package atividade;

import java.util.Scanner;

public class Atendimento {
    Scanner ler = new Scanner(System.in);
    public String curso;
    public String setor;
    public String superVisor;
    public String estagiario;
    public String modalidadeEstagio;
    public String status;
    public char listaEspera;
    public char retornaraAtendimento;
    public String observacao;

    //Cliente cliente = new Cliente();
    //Encaminhamento encaminhamento = new Encaminhamento();

    public void cadastrarAtendimento(){
        System.out.println("Curso:");
        curso = ler.nextLine();
        System.out.println("Setor:");
        setor = ler.nextLine();
        System.out.println("Supervisor:");
        superVisor = ler.nextLine();
        System.out.println("Estagiario:");
        estagiario = ler.nextLine();
        System.out.println("Modalidade do Estagio:");
        modalidadeEstagio = ler.nextLine();
        System.out.println("Status: 1-Finalizado/2-Em Andamento");
        int fa = ler.nextInt();
        if(fa==1){
            status = "Finalizado";
        }else if(fa==2){
            status = "Em Andamento";
        }else{
            status = "Ai vc complicou a gente!";
        }
        System.out.println("Lista de Espera: S-Sim/N-Não:");
        listaEspera = ler.next().charAt(0);
        System.out.println("Retornar ao Atendimento: S-Sim/N-Não:");
        retornaraAtendimento = ler.next().charAt(0);
        System.out.println("Observação:");
        observacao = ler.nextLine();

    }
}
