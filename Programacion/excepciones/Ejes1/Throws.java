import java.util.InputMismatchException;
import java.util.Scanner;

public class Throws {

    public static void Arith(Double denom) throws ArithmeticException{
        try {
            if (denom == 0) {
                throw new ArithmeticException("Has introducido un 0 en el denominador");
            }
        } catch (ArithmeticException e){
            System.out.println(e.getMessage());
        }
        
    }
    
    public static void main(String[] args) {

        Scanner sc = new Scanner(System.in);
        Double a = 0.0;
        Double v1;
        Double v2;
        try {
           a = (v1 = sc.nextDouble())/( v2 = sc.nextDouble());
           Arith(v2);
           System.out.println(a);
           
        } catch (InputMismatchException e) { 
            System.out.println("Has introducido un dato no numerico");
        } catch (Exception e) {
            System.out.println("Problemas con la division");
        }
    
    }
}
