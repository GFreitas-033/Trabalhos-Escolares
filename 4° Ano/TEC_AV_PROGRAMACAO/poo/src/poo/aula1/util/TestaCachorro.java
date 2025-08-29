package poo.aula1.util;

import poo.aula1.modelo.Animal;
import poo.aula1.modelo.Cachorro;
import poo.aula1.modelo.Gato;

public class TestaCachorro {

    public static void main(String[] args) {
        Animal c = new Cachorro();
        c.setNome("Rex");

        Animal c2 = new Animal();
        c2.setNome("John");

        Animal c3 = new Gato();
        c3.setNome("Cat");

//        c.setNome("Rex");
//        c.setIdade(5);
//        c.setRaca("Pit Bull");
//        c.setTamanho('G');

        c.voz();
        c2.voz();
        c3.voz();

        //c.comer();
        //for (int i=0; i<5; i++){
        //    c.brincar();
        //}
        //c.quemSouEu();
    }
}