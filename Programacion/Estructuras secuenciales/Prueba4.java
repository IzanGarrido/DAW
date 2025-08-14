import java.util.Scanner;

public class Prueba4 {
    
    public static void main (String[] args) {

        int mes;
        String texto = "";

        Scanner sc = new Scanner (System.in);

        System.out.print("Introduce un numero del mes: ");  
        mes = sc.nextInt();

        switch (mes) {

            case 1: texto = "enero"; break;

            case 2: texto = "Febrero"; break;

            case 3: texto = "Marzo"; break;
              
            case 4: texto = "Abril"; break;
              
            case 5: texto = "Mayo"; break;

            case 6: texto = "Junio"; break;

            case 7: texto = "Julio"; break;
        
            case 8: texto = "Agosto"; break;

            case 9: texto = "Septiembre"; break;
            
            case 10: texto = "Octubre"; break;

            case 11: texto = "Noviembre"; break;

            case 12: texto = "Diciembre"; break;
                
        }
        System.out.println(texto);

    }
}
