import libreria.FNumDAW;

public class Eje2 {
    
    public static void main(String[] args) {
     
        int n = 0;
        boolean capicua;

        for (int i = 1000; i < 9999; i++) {
            capicua = FNumDAW.esCapicua(i);
            if (capicua) {
                System.out.println(i);
                n++;
            } 
        }
        System.out.println("Hay " + n + " números capicúa.");  

    }
}
