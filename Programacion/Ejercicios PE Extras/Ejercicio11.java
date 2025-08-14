public class Ejercicio11 {

    public static void main (String[] args) {

        int dado1;
        int dado2;
        int dado3;

        dado1 = (int) (Math.random()*6+1);
        System.out.println("Dado 1: " + dado1);
        dado2 = (int) (Math.random()*6+1);
        System.out.println("Dado 2: " + dado2);
        dado3 = (int) (Math.random()*6+1);
        System.out.println("Dado 3: " + dado3);

        System.out.println("La suma de los 3 dados es: " + (dado1 + dado2 + dado3));

    }

}