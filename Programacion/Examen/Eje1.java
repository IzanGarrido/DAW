import java.util.Scanner;

public class Eje1 {

    public static void main (String[] args) {

        String contestacion;
        int años;
        boolean sigue = false;

        Scanner sc = new Scanner(System.in);

        System.out.print("Como te llamas? ");
        contestacion = sc.next();
        System.out.println("Hola " + contestacion);

        for (int i = 3; i > 0; i--) {

            System.out.print("Sabes programar? ");
            contestacion = sc.next();

            if (contestacion.equals("Si")) {
                
                i = 0;
                sigue = true;
                
            } else if (contestacion.equals("No") ) {
                
                System.out.println("Loooser!");
                i = 0;
                sigue = false;
                
            } 
            
            if (i == 1){ 
                
                System.out.println("Si no contestas bien me voy");
                sigue = false;
                
            }

        }

        while (sigue) {

            System.out.print("Cuantos años llevas programando? ");
            años = sc.nextInt();
            
            if (años <= 1) {
                
                System.out.println("Novato!");
                
            } else if (años <= 5 && años > 1) {
                
                System.out.println("Experto!");
              
                
            } else if (años > 5) {
                
                System.out.println("Oh maestro, te adoramos!");

            }
            sigue = false;

        }

        sc.close();
    }   
}   