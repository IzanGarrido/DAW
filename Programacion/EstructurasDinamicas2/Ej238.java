import java.util.LinkedList;
import java.util.Scanner;
import java.util.Queue;
import java.util.Iterator;

public class Ej238 {
    public static void main(String[] args) {
        
        int Nbilletes;
        int personas;
        int billetes;
        Scanner sc = new Scanner(System.in);

        do {
            Integer prueba = 0;
            int suma = 0;
            LinkedList<Queue<Integer>> cantidad = new LinkedList<Queue<Integer>>();
            Nbilletes = sc.nextInt();
            personas = sc.nextInt();
            if (Nbilletes != 0 && personas != 0) {
                Queue<Integer> totalBill = new LinkedList<Integer>();
                    
                for (int i = 1; i <= Nbilletes; i++) {
                    billetes = sc.nextInt();
                    totalBill.add(billetes);
                }
                for (int i = 0; i < personas; i++) {
                    Queue<Integer> reparto = new LinkedList<Integer>();
                    cantidad.add(reparto);

                }
                while (prueba != null) {
                    for (int i = 0; i< personas; i++) {
                        if (prueba != null) { cantidad.get(i).add(totalBill.peek()); }
                        totalBill.poll();
                        prueba = totalBill.peek();
                    }
                }
                Iterator<Queue<Integer>> itq = cantidad.iterator();
                while (itq.hasNext()){ 
                    for (int i = 0; i< personas; i++) {
                        suma = 0;
                        for (int sumar : cantidad.get(i)) {
                            suma += sumar;
                        }
                        System.out.print(suma + ":");
                        itq.next();
                        for (int num :cantidad.get(i)) {
                            System.out.print(" "+num);
                            
                        } 
                        System.out.println();
                    } 
                }
            }
            System.out.println("---");
        } while (Nbilletes != 0 && personas != 0);    
        sc.close();
    }
}