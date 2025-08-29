package br.edu.fateclins.tap.tratadores;

import java.text.ParseException;
import java.text.SimpleDateFormat;
import java.util.Date;

public class Pessoa {
    private String nome;
    private String email;
    private Date dataNascimento;
    private int idade;

    public Pessoa() {
    }

    public String getNome() {
        return nome;
    }

    public void setNome(String nome) {
        this.nome = nome;
    }

    public String getEmail() {
        return email;
    }

    public void setEmail(String email) {
        this.email = email;
    }

    public Date getDataNascimento() {
        return dataNascimento;
    }

    public void setDataNascimento(Date dataNascimento) {
        this.dataNascimento = dataNascimento;
    }

    public void setDataNascimento(String dataNascimento) {
        SimpleDateFormat sdf = new SimpleDateFormat("dd/MM/yyyy");
        try {
            sdf.setLenient(false);
            this.dataNascimento = sdf.parse(dataNascimento);
        } catch (ParseException ex){
            System.out.println(ex.getMessage());
        }
    }

    public int getIdade() {
        return calcularIdade();
    }

    private int calcularIdade(){
        if(this.dataNascimento == null) {
            return 0;
        }else{
            // calcular aqui
            return -1;
        }
    }

    public static void main(String[] args) {
        Pessoa p = new Pessoa();
        p.setDataNascimento("11/06/1998");

        System.out.println(p.getDataNascimento());
    }
}
