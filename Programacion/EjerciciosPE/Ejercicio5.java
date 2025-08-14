import java.util.Scanner;

public class Ejercicio5 {
    
    public static void main (String[] args) {

        Scanner sc = new Scanner (System.in);

        int n;
        int i;
        int j;
        int res;
       
        System.out.print("Dame un número positivo: ");
        n = sc.nextInt();

        for (i = 1; i <= n; i++) { 
                
            for (j = i; j <= n ; j++) {

                res = i+j+(i*j);
                System.out.println("PAR (" + i + "," + j + ") : " + i + "+" + j + "+" + i + "*" + j + " vale " + res);                

            }

        }
            
    }   
        
}


