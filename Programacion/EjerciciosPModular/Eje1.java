import libreria.FNumDAW;

public class Eje1 {

    public static void main(String[] args) {

        int n = 0;
        boolean primo;

        for (int i = 0; i < 1000; i++) {
            primo = FNumDAW.esPrimo(i);
            if (primo) {
                System.out.println(i);
                n++;
            } 
        }
        System.out.println("Hay " + n + " primos.");

    }   
}