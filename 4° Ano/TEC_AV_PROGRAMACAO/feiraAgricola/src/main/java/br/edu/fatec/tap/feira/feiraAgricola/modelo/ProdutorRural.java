package br.edu.fatec.tap.feira.feiraAgricola.modelo;
import jakarta.persistence.*;

import java.io.Serializable;
import java.util.ArrayList;
import java.util.List;
import java.util.Objects;

@Entity
public class ProdutorRural implements Serializable {
    @Id
    @GeneratedValue( strategy = GenerationType.AUTO)
    private Integer id;
    @Column(nullable = false, length = 80)
    private String nome;
    @Column(nullable = false, length = 50)
    private String municipio;
    @Column(length = 30)
    private String Bairro;
    @Column(length = 30)
    private String telefone;
    @Transient
    private List<FichaInscricao> inscricoes;

    public ProdutorRural() {
        inscricoes = new ArrayList<>();
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

    public String getMunicipio() {
        return municipio;
    }

    public void setMunicipio(String municipio) {
        this.municipio = municipio;
    }

    public String getBairro() {
        return Bairro;
    }

    public void setBairro(String bairro) {
        Bairro = bairro;
    }

    public String getTelefone() {
        return telefone;
    }

    public void setTelefone(String telefone) {
        this.telefone = telefone;
    }

    public List<FichaInscricao> getInscricoes() {
        return inscricoes;
    }

    public void setInscricoes(List<FichaInscricao> inscricoes) {
        this.inscricoes = inscricoes;
    }

    public String toString(){
        String msg = "("+this.getId()+") Produtor: "+this.getNome()+"\n";
        msg+="Contato: "+this.getMunicipio()+" - "+this.getBairro()+" Tel."+this.getTelefone();
        return msg;
    }

    public void exibirFichaInscricao(){
        if(this.getInscricoes().isEmpty()){
            System.out.println(this.getNome() + " não tem produtos inscritos");
        } else {
            System.out.println("Produtos inscritos para " + this.getNome());
            for(FichaInscricao ficha :getInscricoes()){
                System.out.println("Ficha de inscrição N. "+ficha.getIdInscricao()+"\n"+ficha.getProduto().toString());
            }
        }
    }

    @Override
    public boolean equals(Object o) {
        if (this == o) return true;
        if (o == null || getClass() != o.getClass()) return false;
        ProdutorRural that = (ProdutorRural) o;
        return Objects.equals(id, that.id);
    }

    @Override
    public int hashCode() {
        return Objects.hash(id);
    }
}
