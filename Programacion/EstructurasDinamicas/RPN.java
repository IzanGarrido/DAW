import java.util.Scanner;
import java.util.Stack;

public class RPN {
    public static void main(String[] args) {

        Stack<Double> rpn = new Stack<Double>();
        Double temp;
        Double temp2;
        Double n;
        String hacer;
        Scanner sc = new Scanner(System.in);
        System.out.print("\033[H\033[2J");
        System.out.flush();

        do {
            System.out.println(" _____________________________________ \n"  + 
                               "|                                     |\n" +
                               "|           CALCULADORA RPN           |\n" +
                               "|_____________________________________|\n"  );
            for (Double num : rpn) {
                System.out.printf("  %20.3f\n", num);
    
            }
            System.out.println(" _____________________________________ \n" +
                               "|                                     |\n" +
                               "|     1: Añadir un número             |\n" + 
                               "|     q: Finalizar el programa        |\n" + 
                               "|_____________________________________|\n"  );
            System.out.print(": ");
            hacer = sc.next();
            System.out.print("\033[H\033[2J");
            System.out.flush();
            switch (hacer) {
                case "1":  {
                    System.out.print("Número: ");
                    n = sc.nextDouble();
                    rpn.push(n);
                    break;

                } case "+": {
                    temp = rpn.peek();
                    rpn.pop();
                    temp2 = rpn.peek();
                    rpn.pop();
                    rpn.push(temp2 + temp);
                    break;

                } case "-": {
                    temp = rpn.peek();
                    rpn.pop();
                    temp2 = rpn.peek();
                    rpn.pop();
                    rpn.push(temp2 - temp);
                    break;

                } case "*": {
                    temp = rpn.peek();
                    rpn.pop();
                    temp2 = rpn.peek();
                    rpn.pop();
                    rpn.push(temp2 * temp);
                    break;
                    
                } case "/": {
                    temp = rpn.peek();
                    rpn.pop();
                    temp2 = rpn.peek();
                    rpn.pop();
                    rpn.push(temp2 / temp);
                    break;
                    
                } case "q":  {
                    System.out.println("Fin del programa");
                    break;

                } default: {
                    System.out.println("Opción no valida");
                    
                }
            }
        } while(!hacer.equals("q"));
        sc.close();
    }
}