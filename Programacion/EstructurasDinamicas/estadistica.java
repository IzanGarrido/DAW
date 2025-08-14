import java.util.Scanner;
import java.util.ArrayList;
public class estadistica {

    public static Double media (ArrayList<Double> numeros) {
        Double suma = 0.0;
        for (Double numero : numeros) {
                suma = suma + numero; 

            }
            suma = suma / numeros.size();

        return suma;
    }
    public static double desviacion (ArrayList<Double> numeros) {
        ArrayList<Double> desv = new ArrayList<Double>();
        double suma = 0.0;
        for (Double numero : numeros) {
            desv.add((numero-media(numeros))*(numero-media(numeros)));
        }
        numeros.clear();
        for (Double numero : desv) {
            suma = suma + numero;
        }
        suma = Math.sqrt(suma / desv.size());
        return suma;
    }
    public static void main(String[] args) {
        ArrayList<Double> numeros = new ArrayList<Double>();
        String n;
        Double num;

        Scanner sc = new Scanner(System.in);

        do {
            System.out.print("\033[H\033[2J");
            System.out.flush();
            System.out.println("Pulsa q para finalizar.");
            System.out.print("Número: ");
            n = sc.next();
            
            if (n.equals("q")) {
                System.out.println("Media = " + media(numeros) + " Desviación típica= " + desviacion(numeros));

            } else {
                num = Double.parseDouble(n);
                numeros.add(num);

            }
        } while (!n.equals("q"));
        sc.close();
    }
}