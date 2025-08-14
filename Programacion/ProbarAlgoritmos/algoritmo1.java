import java.util.Scanner;

public class algoritmo1 {

        
    public static void main(String[] args) {
        int n1, n2, n3;
        Scanner sc = new Scanner(System.in);

        System.out.println("Cual es el numero 1");
        n1 = sc.nextInt();
        System.out.println("Cual es el numero 2");
        n2 = sc.nextInt();
        System.out.println("Cual es el numero 3");
        n3 = sc.nextInt();
        

        

        if (n1>=n2 && n1>=n3)  {
            int mayor, medio, menor;


            mayor = n1;
        

            if (n2>=n3) {
                medio = n2; 
                menor = n3;

            }   
            else if (n3>=n2) {
                medio = n3;
                menor = n2;

        }   

        else if (n2>=n1 && n2>=n3) {
            mayor = n2;
            if (n1>=n3) {
                medio = n1;
                menor = n3;
            }
            else if (n3>=n1) {
                medio = n3;
                menor = n1;
            }
        
        }
        else mayor = n3; {
            if (n1>=n2) {
                medio = n1;
                menor = n2;
            }

            else if (n2>=n1) {
                medio = n2;
                menor = n1;

            
        
        
        
        System.out.println(mayor);
        System.out.println(medio);
        System.out.println(menor);


        if (mayor==medio && mayor==menor) {
            System.out.println("Hay 3 iguales");
        }
        
        
        else if (mayor==medio || mayor==menor || medio==menor) {
        System.out.println("Hay 2 iguales");
        }
    
    }
}   
        }
    }
}