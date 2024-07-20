/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package aluno;
import java.util.Scanner;
/**
 *
 * @author aluno
 */
public class Main {

    /**
     * @param args the command line arguments
     */
    public static void main(String[] args) {
        Aluno cadastrar = new Aluno();   
        Scanner leia = new Scanner(System.in);
        
        System.out.println("Informe o nome do Aluno:");
        cadastrar.nome = leia.nextLine();
        System.out.println("Informe o curso do Aluno:");
        cadastrar.curso = leia.nextLine();
        System.out.println("Informe a idade do Aluno:");
        cadastrar.idade = leia.nextInt();
        
        
        cadastrar.exibir();
    }
    
}
