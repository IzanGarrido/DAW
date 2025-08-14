import java.util.Random;
import java.util.Scanner;

public class AdivinaElNumero {
    public static void main(String[] args) {
        // Generar un número aleatorio entre 1 y 100
        Random rand = new Random();
        int numeroSecreto = rand.nextInt(100) + 1;
        
        // Configurar el scanner para la entrada del usuario
        Scanner scanner = new Scanner(System.in);
        
        int intentos = 0;
        boolean haAdivinado = false;
        
        System.out.println("¡Bienvenido a Adivina el número!");
        System.out.println("Estoy pensando en un número entre 1 y 100.");
        
        while (!haAdivinado) {
            System.out.print("Introduce tu suposición: ");
            int suposicion = scanner.nextInt();
            intentos++;
            
            if (suposicion < numeroSecreto) {
                System.out.println("Demasiado bajo. ¡Intenta de nuevo!");
            } else if (suposicion > numeroSecreto) {
                System.out.println("Demasiado alto. ¡Intenta de nuevo!");
            } else {
                haAdivinado = true;
                System.out.println("¡Felicidades! Adivinaste el número en " + intentos + " intentos.");
            }
        }
        
        // Cerrar el scanner
        scanner.close();
    }
}

