/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package livro;
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
        Livro cadastrar = new Livro();
        Scanner leia = new Scanner(System.in);
        
        System.out.println("Informe o nome do Autor:");
        cadastrar.autor = leia.nextLine();
        System.out.println("Informe o Título:");
        cadastrar.titulo = leia.nextLine();
        System.out.println("Informe o Ano de Publicação:");
        cadastrar.anopub = leia.nextInt();
        
        
        cadastrar.exibir();
    }
    
}
