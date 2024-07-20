/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package exececoesjava;

/**
 *
 * @author aluno
 */
public class Main {

    /**
     * @param args the command line arguments
     */
    public static void main(String[] args) {
        // TODO code application logic here
        int n1 = 10;
        int n2 = 0;
        float n3;
        try{
            n3 = n1/n2;
            System.out.println("Resultado: " + n3);
        }catch(ArithmeticException e){
            System.err.println("Não é possivel dividir por 0; " + e.getMessage());
        }
    }
    
}
