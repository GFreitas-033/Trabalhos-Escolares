/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package livro;

/**
 *
 * @author aluno
 */
public class Livro {
    public String titulo;
    public String autor;
    public int anopub;
    
    
    public void exibir(){
        System.out.println("Título:"+titulo+"; Autor:"+autor+"; Ano de Publicação:"+anopub);
    }
}
