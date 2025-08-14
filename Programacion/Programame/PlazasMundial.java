import java.util.Scanner;

public class PlazasMundial {

    public static void main(String[] args) {
        
        Scanner sc = new Scanner(System.in);

        int casos;
        int equipos;
        int plazas = 0;
        int suma = 0;

        casos = sc.nextInt();

        for (int i = 0; i < casos; i++) {

            equipos = sc.nextInt();

            suma = 0;
            for (int j = 0; j < 6; j++) {

                plazas = sc.nextInt();
                suma +=plazas;

            }
            System.out.println(equipos - suma);

        }
    }
}