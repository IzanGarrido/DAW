import java.util.InputMismatchException;
import java.util.Scanner;

public class Division2 {
    public static void main(String[] args) {

        Scanner sc = new Scanner(System.in);
        Double a;
        Double v1;
        Double v2;
        try {
           a = (v1 = sc.nextDouble())/( v2 = sc.nextDouble());
           if (v2 == 0) throw new ArithmeticException();
           System.out.println(a);
        } catch (InputMismatchException e) { 
            System.out.println("Has introducido un dato no numerico");
        } catch (ArithmeticException e) {
            System.out.println("Has introducido un 0 en el denominador  ");
        } catch (Exception e) {
            System.out.println("Problemas con la division");
        } 
    
    }
}