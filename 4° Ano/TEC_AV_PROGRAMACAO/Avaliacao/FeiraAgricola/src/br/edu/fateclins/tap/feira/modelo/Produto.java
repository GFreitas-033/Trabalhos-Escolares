package br.edu.fateclins.tap.feira.modelo;

import java.util.ArrayList;
import java.util.List;

public class Produto {
    private Integer id;
    private String nome;
    private String variedade;
    private List<FichaInscricao> inscricoes;

    public Produto() {
    }

    public Produto(Integer id, String nome, String variedade) {
        this.id = id;
        this.nome = nome;
        this.variedade = variedade;
    }

    public Integer getId() {
        return id;
    }

    public void setId(Integer id) {
        this.id = id;
    }

    public String getNome() {
        return nome;
    }

    public void setNome(String nome) {
        this.nome = nome;
    }

    public String getVariedade() {
        return variedade;
    }

    public void setVariedade(String variedade) {
        this.variedade = variedade;
    }

    public List<FichaInscricao> getInscricoes() {
        if(inscricoes==null){
            inscricoes = new ArrayList<>();
        }
        return inscricoes;
    }

    public void setInscricoes(List<FichaInscricao> inscricoes) {
        this.inscricoes = inscricoes;
    }

    @Override
    public String toString(){
        String msg = "("+this.getId()+") Produto: "+this.getNome()+"\n";
        msg += "Variedade: "+this.getVariedade();
        return msg;
    }

    public void exibirFichaInscricao(){
        if(this.getInscricoes().isEmpty()){
            System.out.println(this.getNome()+" não tem produtores inscritos");
        }else{
            System.out.println("Produtores inscritos com "+this.getNome());
            for(FichaInscricao ficha: getInscricoes()){
                System.out.println("Ficha de Inscrição N. ("+ficha.getIdInscricao()+")\n"
                        +ficha.getProdutorRural().toString());
            }
        }
    }
}
