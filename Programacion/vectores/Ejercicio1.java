public class Ejercicio1 {

    public static void main(String[] args) {

        int[] a = new int[10];

        for(int i = 0; i < 10; i++) {
        
            a[i] = i*10;

            System.out.println("Posición "+i+": "+a[i]);

        }

        for(int i = 9; i >= 0; i--) {
        
            a[i] = i*10;

            System.out.println("Posición " + i + ": " + a[i]);

        }

    }

}