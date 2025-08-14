import libreria.FNumDAW;
import libreria.FVecDAW;

public class probar {
    
    public static void main(String[] args) {

        int resultado;
        int[] resu = new int [10];
        boolean res;
        
        /*resultado = FNumDAW.potencia(2, 4);

        System.out.println(resultado);

        resultado = FNumDAW.cuentaDigitos(9801);
        System.out.println(resultado);

        resultado = FNumDAW.voltea(81);
        System.out.println(resultado);

        res = FNumDAW.esCapicua(-1234321);
        System.out.println(res);
        
        res = FNumDAW.esPrimo(5);
        System.out.println(res);
        
        resultado = FNumDAW.siguientePrimo(13);
        System.out.println(resultado);

        resultado = FNumDAW.anteriorPrimo(13);
        System.out.println(resultado);

        resultado = FNumDAW.digitoN(9801, 2);
        System.out.println(resultado);

        resultado = FNumDAW.posicionDeDigito(12345, 6);
        System.out.println(resultado);
        
        resultado = FNumDAW.pegaNumeros(12345, 77777);
        System.out.println(resultado);

        resultado = FNumDAW.parteNumero(123456789, 2, 7);
        System.out.println(resultado);

        res = FNumDAW.kaprekar(3);
        System.out.println(res);*/

        int [] newArray;

       
        newArray = FVecDAW.generaArrayInt(10, 1, 10);
        for (int i = 0; i < newArray.length; i++) {
            System.out.print(newArray[i] + " ");
        }
        System.out.println();
        //System.out.println(resultado = FVecDAW.minimoArrayInt(newArray));
        //System.out.println(resultado = FVecDAW.maximoArrayInt(newArray));
        //System.out.println(resultado = FVecDAW.mediaArrayInt(newArray));
        //System.out.println(res = FVecDAW.estaEnArray(newArray, 2));
        System.out.println(resultado = FVecDAW.posicionEnArray(newArray, 2));
        /*int [] array = {1, 2, 3, 4, 5, 6, 7};
        array = FVecDAW.volteaArray(array);
        for (int i = 0; i < array.length; i++) {
            System.out.print(array[i] + " ");
        }*/

      
    }
}
