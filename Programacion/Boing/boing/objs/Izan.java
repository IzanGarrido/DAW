package boing.objs;
import java.util.ArrayList;

public class Izan extends Objeto {

    public Izan(Posicion pos, int dirx, int diry) {

        super(pos, dirx, diry);

    }

    public ArrayList<Posicion> forma() {

        ArrayList<Posicion> forma = new ArrayList<Posicion>();
        // I
        forma.add(new Posicion(0, 0));
        forma.add(new Posicion(-1, 0));
        forma.add(new Posicion(1, 0));
        forma.add(new Posicion(0, 1));
        forma.add(new Posicion(0, 2));
        forma.add(new Posicion(0, 3));
        forma.add(new Posicion(0, 4));
        forma.add(new Posicion(-1, 4));
        forma.add(new Posicion(1, 4));
        // Z
        forma.add(new Posicion(3, 0));
        forma.add(new Posicion(4, 0));
        forma.add(new Posicion(5, 0));
        forma.add(new Posicion(5, 1));
        forma.add(new Posicion(4, 2));
        forma.add(new Posicion(3, 3));
        forma.add(new Posicion(3, 4));
        forma.add(new Posicion(4, 4));
        forma.add(new Posicion(5, 4));
        // A
        forma.add(new Posicion(7, 4));
        forma.add(new Posicion(7, 3));
        forma.add(new Posicion(7, 2));
        forma.add(new Posicion(7, 1));
        forma.add(new Posicion(7, 0));
        forma.add(new Posicion(8, 0));
        forma.add(new Posicion(10, 0));
        forma.add(new Posicion(10, 1));
        forma.add(new Posicion(10, 2));
        forma.add(new Posicion(10, 3));
        forma.add(new Posicion(10, 4));
        forma.add(new Posicion(8, 2));
        forma.add(new Posicion(9, 2));
        forma.add(new Posicion(9, 0));

         // N
         forma.add(new Posicion(12, 0));
         forma.add(new Posicion(12, 1));
         forma.add(new Posicion(12, 2));
         forma.add(new Posicion(12, 3));
         forma.add(new Posicion(12, 4));
         forma.add(new Posicion(13, 1));
         forma.add(new Posicion(14, 2));
         forma.add(new Posicion(15, 3));
         forma.add(new Posicion(16, 4));
         forma.add(new Posicion(16, 1));
         forma.add(new Posicion(16, 2));
         forma.add(new Posicion(16, 3));
         forma.add(new Posicion(16, 4));
         forma.add(new Posicion(16, 0));


        return forma;

    }    
}