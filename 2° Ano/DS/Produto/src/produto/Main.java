/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package produto;
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
        Produto cadastrar = new Produto();
        Scanner leia = new Scanner(System.in);
    
        System.out.println("Informe o nome do Produto:");
        cadastrar.setNome(leia.nextLine());
        
        System.out.println("Informe o tipo do Produto:");
        cadastrar.setTipo(leia.nextLine());
        
        System.out.println("Informe o preço do Produto:");
        cadastrar.setPreco(leia.nextFloat());
        
        
        System.out.println("Nome: '"+cadastrar.getNome()+"', tipo do produto: '"+cadastrar.getTipo()+
                "' e seu preço é: R$"+cadastrar.getPreco());
    }
}
