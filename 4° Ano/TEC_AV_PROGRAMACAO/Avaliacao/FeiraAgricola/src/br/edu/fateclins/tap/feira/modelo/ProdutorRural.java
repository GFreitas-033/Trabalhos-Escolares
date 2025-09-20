package br.edu.fateclins.tap.feira.modelo;
import java.util.ArrayList;
import java.util.List;

public class ProdutorRural {
    private Integer id;
    private String nome;
    private String municipio;
    private String Bairro;
    private String telefone;
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

    @Override
    public String toString(){
        String msg = "("+this.getId()+") Produtor: "+this.getNome()+"\n";
        msg += "Contato: "+this.getMunicipio()+" - "+this.getBairro()+ " Tel."+this.getTelefone();
        return msg;
    }

    public void exibirFichaInscricao(){
        if(this.getInscricoes().isEmpty()){
            System.out.println(this.getNome()+" não tem produtos inscritos");
        }else{
            System.out.println("Produtos inscritos para "+this.getNome());
            for(FichaInscricao ficha: getInscricoes()){
                System.out.println("Ficha de Inscrição N. ("+ficha.getIdInscricao()+")\n"
                        +ficha.getProduto().toString());
            }
        }
    }
}
