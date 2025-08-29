package poo.aula1.modelo;

public class Cachorro extends Animal{
    private boolean guarda;

    public Cachorro() {}

    public Cachorro(String nome, int idade, String raca, char tamanho, boolean guarda) {
        super(nome, idade, raca, tamanho);
        this.guarda = guarda;
    }

    public boolean isGuarda() {
        return guarda;
    }

    public void setGuarda(boolean guarda) {
        this.guarda = guarda;
    }

    public void voz(){
        System.out.println(nome + " late: Au! Au! Au!");
    }

    public void brincar(){
        System.out.println("Dono pega a bolinha");
        voz();
        System.out.println("DOno joga a bolinha");
        System.out.println(nome + " corre até a bolinha e pega");
        System.out.println(nome + " devolve a bolinha");
        voz();
    }
}
