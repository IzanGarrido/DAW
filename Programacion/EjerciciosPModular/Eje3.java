import libreria.FNumDAW;
import java.util.Scanner;

public class Eje3 {

    public static void main(String[] args) {
        
        Scanner sc = new Scanner(System.in);

        String linea;
        char caracter = ' ';
        int casos;
        int carNum;
        int longCar;
        int suma = 0; 

        casos = sc.nextInt();

        for (int i = 0; i < casos; i++ ) {
            linea = sc.next();
            longCar = linea.length();
            for (int j = 0; j <longCar; j++) { 
                caracter = linea.charAt(j); 
                System.out.println(carNum = Character.getNumericValue(caracter));
                suma += carNum;
            }
        }
        System.out.println(FNumDAW.anteriorPrimo(suma));

        sc.close();
    }
}
