import java.util.Scanner;
import libreria.FNumDAW;

public class Eje4b {
    
    public static void main(String[] args) {
        
        Scanner sc = new Scanner(System.in);

        int num;
        boolean kaprekar;

        do {
            num = sc.nextInt();
            if (num != 0) {
                System.out.println(kaprekar = FNumDAW.kaprekar(num));
            }
        } while(num != 0);

        sc.close();
    }
}