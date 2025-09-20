package br.edu.fateclins.tap.feira.modelo;

import java.util.ArrayList;
import java.util.List;

public class FichaInscricao {
    private Integer idInscricao;
    private ProdutorRural produtorRural;
    private Produto produto;
    private TipoProduto tipo;
    private List<Julgamento> julgamentos;

    public FichaInscricao() {
    }

    public FichaInscricao(Integer idInscricao, ProdutorRural produtorRural, Produto produto, TipoProduto tipo) {
        this.idInscricao = idInscricao;
        this.produtorRural = produtorRural;
        this.produto = produto;
        this.tipo = tipo;
        this.julgamentos = new ArrayList<>();
    }

    public Integer getIdInscricao() {
        return idInscricao;
    }

    public void setIdInscricao(Integer idInscricao) {
        this.idInscricao = idInscricao;
    }

    public ProdutorRural getProdutorRural() {
        return produtorRural;
    }

    public void setProdutorRural(ProdutorRural produtorRural) {
        this.produtorRural = produtorRural;
    }

    public Produto getProduto() {
        return produto;
    }

    public void setProduto(Produto produto) {
        this.produto = produto;
    }

    public TipoProduto getTipo() {
        return tipo;
    }

    public void setTipo(TipoProduto tipo) {
        this.tipo = tipo;
    }

    public List<Julgamento> getJulgamentos() {
        return julgamentos;
    }

    public void setJulgamentos(List<Julgamento> julgamentos) {
        this.julgamentos = julgamentos;
    }
}
