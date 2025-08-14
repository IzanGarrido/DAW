import java.util.HashMap;
import java.util.Scanner;

public class Ej709 {
    public static void main(String[] args) {
        
        int nVotos;
        Scanner sc = new Scanner(System.in);
        
        do {
            String pais;
            HashMap<String, Integer> Paises = new HashMap<String, Integer>();
            nVotos = sc.nextInt();

            for (int i = 1; i <=nVotos; i++) {
                pais=sc.next();

                if (Paises.containsKey(pais)) {
                    int num = Paises.get(pais);
                    num +=1;
                    Paises.put(pais, num);
                
                } else {
                    Paises.put(pais, 1);
                    
                }
            } 

            int num = 0;
            String res = " ";
            for (String voto : Paises.keySet()) {
                if (Paises.get(voto) == num) {
                    res = "EMPATE";  
                    Paises.remove(voto);

                } else if (Paises.get(voto) > num) {
                    num = Paises.get(voto);
                    res = voto;

                }
            }
            System.out.println(res);
            Paises.clear();
            
        } while (nVotos != 0);
        sc.close();
    }
}