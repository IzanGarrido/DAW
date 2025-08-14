package libreria;
import java.util.Arrays;

public class FVecDAW {

    public static int[] generaArrayInt (int tamaño, int min, int max) {

        int[] numAle = new int[tamaño];

        for (int i = 0 ; i < tamaño; i++) { 
            numAle[i] = (int)(Math.random()*(max-min+1)+min);
        }
        return numAle;  
    }

    public static int minimoArrayInt (int[] minimo) {

        int numMin;

        Arrays.sort(minimo, 0, minimo.length);
        numMin = minimo[0];

        return numMin;

    }

    public static int maximoArrayInt (int[] maximo) {

        int numMax;
        Arrays.sort(maximo, 0, maximo.length);
        numMax = maximo[maximo.length - 1];
        return numMax;
    }

    public static int mediaArrayInt (int[] mediaArray) {

        int media = 0;
        for (int i = 0; i < mediaArray.length; i++) {
            media += mediaArray[i];
        }
        media /= mediaArray.length;

        return media;
    }

    public static boolean estaEnArray (int[] esta, int num) {

        int a;
        boolean dentro = false;
        Arrays.sort(esta, 0, esta.length);
        a = Arrays.binarySearch(esta, num);
        if (a > 0) dentro = true;
        
        return dentro;
    }

    public static int posicionEnArray (int[] busca, int num) {
        
        int pos = -1;
        for (int i = busca.length -1; i >= 0; i--) {
            if (busca[i] == num) pos = i;
        }

        return pos;
    }
  
    public static int[] volteaArray (int[] voltear) {

        int voltear2[] = new int [voltear.length];
        int num = voltear.length - 1;
        for (int i = 0; i < voltear.length; i++) {
            voltear2[i] = voltear[num];
            num--;
        }
        return voltear2;

    }
}
