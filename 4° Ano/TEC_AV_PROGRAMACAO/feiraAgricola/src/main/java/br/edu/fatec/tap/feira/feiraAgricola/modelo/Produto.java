package br.edu.fatec.tap.feira.feiraAgricola.modelo;

import jakarta.persistence.*;

import java.io.Serializable;
import java.util.ArrayList;
import java.util.List;
import java.util.Objects;
import java.util.UUID;

@Entity
@Table(name = "Produto")
public class Produto implements Serializable {
    @Id
    @GeneratedValue(strategy = GenerationType.AUTO)
    private Integer id;
    @Column(name="nomeProduto", nullable = false, length = 50)
    private String nome;
    @Column(nullable = true, length =25 )
    private String variedade;
    @Transient
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
        String msg ="("+this.getId()+") Produto: "+ this.getNome()+"\n";
        msg +="Variedade: "+ this.getVariedade();
        return msg;
    }

    @Override
    public boolean equals(Object o) {
        if (this == o) return true;
        if (o == null || getClass() != o.getClass()) return false;
        Produto produto = (Produto) o;
        return Objects.equals(getId(), produto.getId());
    }

    @Override
    public int hashCode() {
        return Objects.hash(getId());
    }
}
