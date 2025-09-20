package br.edu.fateclins.tap.feira.dao.txt;

import br.edu.fateclins.tap.feira.modelo.Produto;

import java.io.*;
import java.util.ArrayList;
import java.util.List;

public class ProdutoDAO {
    private static final String NOME_ARQUIVO = "produtos.txt";

    public void criar(Produto produto){
        try(BufferedWriter writer = new BufferedWriter(new FileWriter(NOME_ARQUIVO, true))){
            List<Produto> produtos = listar();
            boolean encontrado = false;
            for (Produto prod : produtos){
                if(prod.getId().equals(produto.getId())){
                    System.err.println("Id duplicado!");
                    encontrado = true;
                    break;
                }
            }
            if(!encontrado){
                String texto = produto.getId()+";"+produto.getNome()+";"+produto.getVariedade();
                writer.write(texto);
                writer.newLine();
                System.out.println("Produto "+produto.getNome()+" salvo com sucesso");
            }
        } catch (IOException e){
            System.err.println("Erro ao adicionar contato: "+e.getMessage());
        }
    }

    public List<Produto> listar(){
        List<Produto> produtos = new ArrayList<>();
        try(BufferedReader reader = new BufferedReader(new FileReader(NOME_ARQUIVO))){
            String linha;
            while((linha = reader.readLine()) != null){
                String[]dados = linha.split(";");
                if(dados.length == 3){
                    Produto p = new Produto(Integer.parseInt(dados[0]), dados[1], dados[2]);
                    produtos.add(p);
                }
            }
        } catch (FileNotFoundException e){
            System.err.println("Arquivo não encontrado");
        } catch (IOException e){
            System.err.println("Problemas ao acessar o arquivo");
        }
        return produtos;
    }

    public void atualizar (Produto novoProduto){
        List<Produto> produtos = listar();
        boolean encontrado = false;
        try(BufferedWriter writer = new BufferedWriter(new FileWriter(NOME_ARQUIVO))){
            for (Produto prod : produtos){
                if(prod.getId().equals(novoProduto.getId())){
                    String texto = novoProduto.getId()+";"+novoProduto.getNome()+";"+novoProduto.getVariedade();
                    writer.write(texto);
                    writer.newLine();
                    System.out.println("Produto "+novoProduto.getNome()+" alterado com sucesso");
                    encontrado = true;
                }else{
                    String texto = prod.getId()+";"+prod.getNome()+";"+prod.getVariedade();
                    writer.write(texto);
                    writer.newLine();
                }
            }
        }catch (IOException e){
            System.err.println("Erro ao atualizar produto "+ e.getMessage());
        }
        if(!encontrado){
            System.err.println("Produto não foi encontrado");
        }
    }

    public void excluir (int termoPesq){
        List<Produto> produtos = listar();
        boolean encontrado = false;
        try(BufferedWriter writer = new BufferedWriter(new FileWriter(NOME_ARQUIVO))){
            for (Produto prod : produtos){
                if(!prod.getId().equals(termoPesq)){
                    String texto = prod.getId()+";"+prod.getNome()+";"+prod.getVariedade();
                    writer.write(texto);
                    writer.newLine();
                }else{
                    System.out.println("Produto excluído com sucesso!");
                    encontrado = true;
                }
            }
        }catch (IOException e){
            System.err.println("Erro ao atualizar produto "+ e.getMessage());
        }
        if(!encontrado){
            System.err.println();
        }
    }
}
