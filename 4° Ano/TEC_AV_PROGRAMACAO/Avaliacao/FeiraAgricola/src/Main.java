import br.edu.fateclins.tap.feira.modelo.FichaInscricao;
import br.edu.fateclins.tap.feira.modelo.Produto;
import br.edu.fateclins.tap.feira.modelo.ProdutorRural;
import br.edu.fateclins.tap.feira.modelo.TipoProduto;

public class Main {
    public static void main(String[] args) {
        Produto p1, p2, p3;
        ProdutorRural pr1, pr2;
        FichaInscricao f1, f2, f3, f4, f5;

        p1 = new Produto(1, "Banana", "Maça");
        p2 = new Produto(2, "Maça", "Gala");
        p3 = new Produto(3, "Alface", "Americana");

        pr1 = new ProdutorRural();
        pr1.setId(1);
        pr1.setNome("Anderson Silva");
        pr1.setBairro("Algum AI");
        pr1.setMunicipio("Lins");
        pr1.setTelefone("(14)99999-9999");

        pr2 = new ProdutorRural();
        pr2.setId(2);
        pr2.setNome("Nome da Silva");
        pr2.setBairro("Algum AI II");
        pr2.setMunicipio("Sabino");
        pr2.setTelefone("(14)99999-8888");

        f1 = new FichaInscricao(1, pr1, p1, TipoProduto.ORGANICO);
        pr1.getInscricoes().add(f1);
        p1.getInscricoes().add(f1);
        f2 = new FichaInscricao(2, pr1, p1, TipoProduto.ORGANICO);
        pr1.getInscricoes().add(f2);
        p1.getInscricoes().add(f2);
        f3 = new FichaInscricao(3, pr2, p2, TipoProduto.ORGANICO);
        pr2.getInscricoes().add(f3);
        p2.getInscricoes().add(f3);
        f4 = new FichaInscricao(4, pr2, p1, TipoProduto.CONVENCIONAL);
        pr2.getInscricoes().add(f4);
        p1.getInscricoes().add(f4);
        f5 = new FichaInscricao(5, pr2, p3, TipoProduto.ORGANICO);
        pr2.getInscricoes().add(f5);
        p3.getInscricoes().add(f5);
        //=================================================
//        System.out.println(p1.toString());
//        System.out.println(p2.toString());
//        System.out.println(p3.toString());
//
//        System.out.println(pr1.toString());
//        System.out.println(pr2.toString());
//
//        pr1.exibirFichaInscricao();

        p1.exibirFichaInscricao();
    }
}