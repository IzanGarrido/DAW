package libreria; //Se encuentra en la carpeta libreria

import java.util.Scanner;

public class Vector {

    public static String[] rellenaVectorStr(int numElem) {

        Scanner sc = new Scanner(System.in);

        String[] vecStr = new String[numElem];

        for (int i = 0; i < numElem; i++) {

            System.out.printf("Introduce el elemento %d:",i);
            vecStr[i]=sc.nextLine();

        }

        sc.close();
        return vecStr;

    }

    public static String devuelveValorStr (int pos, String[] v) {

        return v[pos];

    }

    public static boolean esigualStr (String[] a, String[] b) {

        boolean resultado = true;

        if (a.length == b.length) {
            for (int i = 1; i< a.length; i++) {    
                if (a[i] != b[i]) resultado = false;
            }
        } else resultado = false;

        return resultado;

    }
    
}
