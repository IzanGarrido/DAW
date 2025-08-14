import libreria.Vector;
import java.util.Arrays;

public class Probar2 {

    public static void main(String[] args) {

        String[] vectorS;
        String[] x;
        //Llamamos a la función para rellenar el vector
        vectorS=Vector.rellenaVectorStr(4);
        x=Vector.rellenaVectorStr(4);
        System.out.println(Arrays.toString(vectorS));
        System.out.println(Arrays.toString(x));

        
        System.out.println(Vector.esigualStr(x,vectorS)?"Si":"No");
    }
}