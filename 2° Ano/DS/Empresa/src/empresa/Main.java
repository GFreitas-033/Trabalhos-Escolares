/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package empresa;
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
        // TODO code application logic here
        Scanner leia = new Scanner(System.in);
        Funcoes op = new Funcoes();
        Empresa empre = new Empresa();
        
        System.out.println("Bem-Vindo ao Sistema da "+empre.getNomeempresa());
       
        do{
            op.menu();
            op.setEscolha(leia.nextInt());
            if(op.getEscolha()==1){
                System.out.println("1");
            }else if(op.getEscolha()==2){
                System.out.println("2");
            }else if(op.getEscolha()==3){
                System.out.println("3");
            }else if(op.getEscolha()==4){
                System.out.println("4");
            }else if(op.getEscolha()!=0){
                do{
                    System.out.println("Opção Inválida!!!");
                    op.menu();
                    op.setEscolha(leia.nextInt());
                }while((op.getEscolha()!=1) && (op.getEscolha()!=2) && (op.getEscolha()!=3) && (op.getEscolha()!=4) && (op.getEscolha()!=0));
            }
        }while(op.getEscolha()!=0);
       
    }

}
 