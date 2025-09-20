package br.edu.fateclins.tap.feira.arquivos;

import java.io.BufferedReader;
import java.io.FileReader;
import java.io.IOException;

public class LerArquivo {
    public static void main(String[] args) {
        String nomeArquivo = "dadosDigitados.txt";
        BufferedReader leitor = null;
        try{
            leitor = new BufferedReader(new FileReader(nomeArquivo));
            String linha;
            System.out.println("Conteúdo do arquivo '"+nomeArquivo+"'");
            while((linha = leitor.readLine()) != null){
                System.out.println(linha);
            }
        } catch (IOException ex){
            System.err.println("Erro ao ler o arquivo '"+nomeArquivo+"'");
            System.err.println(ex.getMessage());
        } finally {
            try{
                if(leitor != null){
                    leitor.close();
                }
            } catch (IOException e){
                System.err.println("Erro ao fechar o arquivo "+e.getMessage());
            }
        }
    }
}
