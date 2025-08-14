import java.util.Scanner;

public class CalculadoraRPN {

    public static double[] rotar(double[] rotar) {
        for(int i = 1; i < rotar.length-1 ; i++) {
                    rotar[i] = rotar[i+1];
        }
        rotar[rotar.length-1] = 0;
        return rotar;
    }

    public static void main(String[] args) {

        Scanner sc = new Scanner(System.in);
        // Asignación de variables
        int numPila = 0;
        String operando = "";
        System.out.print("\033[H\033[2J"); /*Esto es un borrado de pantalla*/

        double[] pila;
        
        // Bucle para La interfaz
        do {
            System.out.print("Cuantas pilas quieres? (Entre 4 y 20 incluidos): ");
            numPila = sc.nextInt();
            pila = new double[numPila];
            if (numPila > 3 && numPila < 21) {
                // Pintar la Interfaz para la calculadora
                System.out.println("===================================================");
                System.out.println("Presione q para terminar el programa.");
                System.out.println("===================================================");
                System.out.println("==                CALCULADORA RPN                ==");
                System.out.println("===================================================");
                for (int i = numPila; i >= 1 && numPila > 3 && numPila < 21; i--) {
                    System.out.printf("==  Bloque %2d %20.3f               ==\n",i,pila[i - 1]);
                }
                System.out.println("===================================================");
            
            } else { System.out.print("\033[H\033[2J"); System.out.println("Numero de pilas incorrecto\n"); }
                
        } while(numPila < 4 || numPila > 20);
        System.out.print("\033[H\033[2J");
        // Bucle para operar
        do {
            System.out.println("===================================================");
            System.out.println("Presione q para terminar el programa.");
            System.out.println("===================================================");
            System.out.println("==                CALCULADORA RPN                ==");
            System.out.println("===================================================");
            for (int i = numPila; i >= 1 && numPila > 3 && numPila < 21; i--) {
                System.out.printf("==  Bloque %2d %20.3f               ==\n",i,pila[i - 1]);
            }
            System.out.println("===================================================");
            // Escribe tu número, o tu operación
            System.out.print(": ");
            operando = sc.next();
            // Si es un operando realiza este if
            if (operando.equals("+") || operando.equals("-") || operando.equals("*") || operando.equals("/")) {
                
                if (operando.equals("+")){ pila[0] = pila[1] + pila[0]; pila=rotar(pila);}
                if (operando.equals("-")){ pila[0] = pila[1] - pila[0]; pila=rotar(pila);}
                if (operando.equals("*")){ pila[0] = pila[1] * pila[0]; pila=rotar(pila);}
                if (operando.equals("/")){ pila[0] = pila[1] / pila[0]; pila=rotar(pila);}

            } else if (operando.equals("q")); /*q*/
            else { /*Si pones un número, realiza este if */
                // Rota
                for(int i = pila.length-1; i>0 ; i--) {
                    pila[i] = pila[i-1];
                }
                
                pila[0] = Double.parseDouble(operando);   
            
            }
            System.out.print("\033[H\033[2J"); /*Esto es un borrado de pantalla*/
        } while (!operando.equals("q")); /*Si pulsas q, se termina el programa*/
        System.out.println("Fin del programa");
        sc.close();
    }
}