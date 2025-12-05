package br.edu.fatec.tap.feira.feiraAgricola.arquivos;

import java.io.BufferedWriter;
import java.io.FileWriter;
import java.io.IOException;
import java.util.Scanner;

public class EscreverArquivo {

    public static void main(String[] args) {
        Scanner entrada = new Scanner(System.in);
        BufferedWriter escritor = null;
        String nomeArquivo = "dadosDigitados.txt";
        try{
            escritor = new BufferedWriter(new FileWriter(nomeArquivo, true));
            String linha;
            System.out.println("Digite um texto ou 'sair' para encerrar.");
            do{
                System.out.println("> ");
                linha  = entrada.nextLine();
                if(!linha.equalsIgnoreCase("sair")) {
                    escritor.write(linha);
                    escritor.newLine();
                }
            } while (!linha.equalsIgnoreCase("sair"));
            System.out.println("\nArquivo '"+nomeArquivo+"' criado e conteúdo salvo com sucesso!");
        } catch (IOException e) {
            System.err.println("Erro ao escrever no arquivo: "+e.getMessage());
        } finally {
            try{
                if(escritor != null){
                    escritor.close();
                }
            } catch (IOException e){
                System.err.println("Erro ao fechar o arquivo: "+e.getMessage());
            }
            entrada.close();
        }
    }
}
