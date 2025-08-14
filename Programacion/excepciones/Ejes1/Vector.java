import java.util.Scanner;
public class Vector {
    public static void main(String[] args) {

        Scanner sc = new Scanner(System.in);
        int vector[] = new int[5];
        try {
            for (int i = 0; i <= 5; i++) {
                if (vector[i] > 4) throw new ArrayIndexOutOfBoundsException();
                vector[i] += sc.nextInt();
            }
        } catch (ArrayIndexOutOfBoundsException e) {
            System.out.println("Has intentado poner un numero en la posicion 5");
        }
        
    }
}