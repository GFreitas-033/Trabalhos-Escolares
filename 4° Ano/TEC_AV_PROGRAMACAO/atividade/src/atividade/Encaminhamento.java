package atividade;

import java.util.Scanner;

public class Encaminhamento {
    Scanner ler = new Scanner(System.in);
    public boolean houveEncaminhamento;
    public String instituicaoOrigem;

    public void cadastrarEncaminhamento(){
        System.out.println("Instituição de Origem:");
        instituicaoOrigem = ler.nextLine();
    }
}
