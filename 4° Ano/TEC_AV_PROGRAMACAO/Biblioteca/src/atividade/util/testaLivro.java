package atividade.util;

import atividade.modelo.Livro;

public class testaLivro {
    public static void main(String[] args) {
        Livro novoLivro = new Livro();

        novoLivro.setTitulo("Piratas");
        novoLivro.setSubtitulo("do Caribe?");
        novoLivro.setAutor("Sla Algum Nome III");
        novoLivro.setEditora("MAPPA");
        novoLivro.setEdicao("Edição feita por Fã");
        novoLivro.setCidade("São Paulo");
        novoLivro.setAno(2000);
        novoLivro.setTombo("123");
        novoLivro.setSituacao("Emprestado");

        System.out.println("Título: "+novoLivro.getTitulo());
        System.out.println("SubTítulo: "+novoLivro.getSubtitulo());
        System.out.println("Autor: "+novoLivro.getAutor());
        System.out.println("Editora: "+novoLivro.getEditora());
        System.out.println("Edição: "+novoLivro.getEdicao());
        System.out.println("Cidade de Edição: "+novoLivro.getCidade());
        System.out.println("Ano: "+novoLivro.getAno());
        System.out.println("Número de Tombo: "+novoLivro.getTombo());
        System.out.println("Situação: "+novoLivro.getSituacao());
    }
}
