import java.util.Scanner;

public class Division {
    public static void main(String[] args) {

        Scanner sc = new Scanner(System.in);
        Double a;   
        Double v1;
        Double v2;

        try {
           a = (v1 = sc.nextDouble()) / (v2 = sc.nextDouble());
           if (v2 == 0) throw new Exception();
           else System.out.println(a);
        } catch (Exception e) {
            System.out.println("Problemas con la division");
        }
    
    }
}
