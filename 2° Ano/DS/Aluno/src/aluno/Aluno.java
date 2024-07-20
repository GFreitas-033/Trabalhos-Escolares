/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package aluno;

/**
 *
 * @author aluno
 */
public class Aluno {
    public String nome;
    public int idade;
    public String curso;
    
    public void exibir(){
        System.out.println("Nome do Aluno: "+nome+", ele tem "+idade+" anos, e é do curso:"+curso);
    }
}
