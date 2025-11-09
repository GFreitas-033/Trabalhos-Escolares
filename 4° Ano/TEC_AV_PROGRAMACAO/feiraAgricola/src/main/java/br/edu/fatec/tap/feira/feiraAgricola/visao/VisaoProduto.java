package br.edu.fatec.tap.feira.feiraAgricola.visao;

import br.edu.fatec.tap.feira.feiraAgricola.dao.txt.ProdutoDAO;
import br.edu.fatec.tap.feira.feiraAgricola.modelo.Produto;

import java.util.List;
import java.util.Scanner;

public class VisaoProduto {
    public static void main(String[] args) {
        Scanner teclado = new Scanner(System.in);
        ProdutoDAO dao = new ProdutoDAO();
        int opcaoMenu;

        do{
            System.out.println("\n---- Menu Produto ----");
            System.out.println("1. Inserir Produto");
            System.out.println("2. Listar Produto");
            System.out.println("3. Atualizar Produto");
            System.out.println("4. Excluir Produto");
            System.out.println("0. Sair");
            System.out.println("\n Escolha uma opção");
            opcaoMenu = teclado.nextInt();
            switch (opcaoMenu){
                case 1:
                    criarProduto(teclado,dao);
                    break;
                case 2:
                    listarProduto(dao);
                    break;
                case 3:
                    atualizarProduto(teclado, dao);
                    break;
                case 4:
                    excluirProduto(teclado, dao);
                    break;
                case 0:
                    System.out.println("Saindo do cadastro de produtos");
                    break;
                default:
                    System.out.println("Opção inválida!");
            }
        } while (opcaoMenu!=0);
        teclado.close();
    }

    private static void listarProduto(ProdutoDAO dao){
        System.out.println("\n --- Lista de Produtos ---");
        List<Produto> listaProdutos = dao.listar();
        if (listaProdutos.isEmpty()){
            System.out.println("Nenhum Produto Cadastrado");
        } else {
            for(Produto p : listaProdutos){
                System.out.println(p);
            }
        }
    }

    private static void criarProduto(Scanner teclado, ProdutoDAO dao){
        Produto p = new Produto();
        System.out.println("\n --- Cadastro de Produto ---");
        System.out.println("Id:");
        p.setId(teclado.nextInt());
        teclado.nextLine();
        System.out.println("Nome:");
        p.setNome(teclado.nextLine());
        System.out.println("Variedade:");
        p.setVariedade(teclado.nextLine());
        dao.criar(p);
    }

    private static void atualizarProduto(Scanner teclado, ProdutoDAO dao){
        Produto p = new Produto();
        System.out.println("\n --- Atualização de Produto ---");
        System.out.println("Novo Id:");
        p.setId(teclado.nextInt());
        teclado.nextLine();
        System.out.println("Nome:");
        p.setNome(teclado.nextLine());
        System.out.println("Novo Variedade:");
        p.setVariedade(teclado.nextLine());
        dao.atualizar(p);
    }

    private static void excluirProduto(Scanner teclado, ProdutoDAO dao){
        teclado.nextLine();
        System.out.println("\n --- Excluir produto ---");
        System.out.println("Informe o nome do produto a ser excluido: ");
        String termo =  teclado.nextLine();
        dao.excluir(termo);
    }
}

