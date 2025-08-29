package poo.aula1.modelo;

public class Animal {
    protected String nome;
    protected int idade;
    protected String raca;
    protected char tamanho;

    public Animal(){}

    public Animal(String nome, int idade, String raca, char tamanho) {
        this.nome = nome;
        this.idade = idade;
        this.raca = raca;
        this.tamanho = tamanho;
    }

    public void setNome(String nome) {
        this.nome = nome;
    }

    public String getNome() {
        return nome;
    }

    public void setIdade(int idade) {
        this.idade = idade;
    }

    public int getIdade() {
        return idade;
    }

    public void setRaca(String raca) {
        this.raca = raca;
    }

    public String getRaca() {
        return raca;
    }

    public void setTamanho(char tamanho) {
        this.tamanho = tamanho;
    }

    public char getTamanho() {
        return tamanho;
    }

    public void voz(){
        System.out.println(this.getClass().getSimpleName()+" sem Voz definida");
    }
    public void brincar(){
        System.out.println(this.getClass().getSimpleName()+" não sabe Brincar!");
    }
    public void comer(){
        voz();
        System.out.println("Corre até o pote de comida e aguarda o dono.");
    }
    public void quemSouEu(){
        System.out.println("Meu nome é: " + this.nome);
        System.out.println("Eu sou um "+this.getClass().getSimpleName());
        System.out.println("Tenho " + this.idade + " anos de idade");
        System.out.println("Minha Raça é: " + this.raca);
        System.out.println("Tamanho: " + this.tamanho);
    }
}