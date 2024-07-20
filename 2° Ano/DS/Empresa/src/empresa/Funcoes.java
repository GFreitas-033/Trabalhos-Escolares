/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package empresa;


/**
 *
 * @author aluno
 */
public class Funcoes {
    private int escolha;
    
    public void menu() {
        System.out.println("Escolha uma Opção:");
        System.out.println("1 - Registrar Funcionário");
        System.out.println("2 - Registrar Departamento");
        System.out.println("3 - Aumento 10% para Departamento");
        System.out.println("4 - Transferir Funcionário");
        System.out.println("0 - Encerrar");
    }

    public int getEscolha() {
        return escolha;
    }

    public void setEscolha(int escolha) {
        this.escolha = escolha;
    }
}
