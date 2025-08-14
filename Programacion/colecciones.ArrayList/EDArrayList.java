import java.util.ArrayList;
import java.util.Collections;
import java.util.Iterator;

public class EDArrayList {

    public static void main(String[] args) {
        
        ArrayList<String> diasSemana = new ArrayList<String>();
        ArrayList<Integer> numeros = new ArrayList<Integer>();
    
        diasSemana.add("Lunes");
        diasSemana.add("Martes");
        diasSemana.add("Miércoles");
        diasSemana.add("Jueves");
        diasSemana.add("Viernes");
        diasSemana.add("Sábado");
        diasSemana.add("Domingo");
        
        for (int i=1; i<=10;i++){
            numeros.add(i);
        }

        Iterator<String> ital = diasSemana.iterator();

        while (ital.hasNext()) {
            System.out.println(ital.next());
        }

        Iterator<Integer> ital1 = numeros.iterator();

        while (ital1.hasNext()) {
            System.out.println(ital1.next());
        }
        
        Collections.sort(diasSemana);
        Collections.sort(numeros,Collections.reverseOrder());

        for (String dia : diasSemana) {
            System.out.println(dia);
        }

        for (Integer numero : numeros) {
            System.out.print(numero);
        }
        
    }
}