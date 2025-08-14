import libreria.FNumDAW;
import java.util.Scanner;
import java.util.Arrays;

public class Eje4 {
    
    public static void main(String[] args) {
        
        Scanner sc = new Scanner(System.in);

        int[] ordenar = new int[3];
        int casos;
        int num;
        int res;

        casos = sc.nextInt();

        for (int i = 0; i < casos; i++) {
            num = sc.nextInt();
   //         for (int j = 0; j < 4; j++) {
  //              ordenar[j] = FNumDAW.digitoN(num, j);
                    
      //      }
            Arrays.sort(ordenar);
            for (int j = 0; j < 4; j++) {
                num = FNumDAW.pegaNumeros(num, j);
                    
            }
            
            res = num - FNumDAW.voltea(num);
            

        }
        sc.close();
    }
}
