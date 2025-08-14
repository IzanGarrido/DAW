import java.util.Scanner;

public class Menu {
  
    public static void menu() {
        System.out.print (
            "VEHÍCULOS\n" + 
            "=========\n" + 
            "1. Anda en bicicleta\n" + 
            "2. Anda en coche\n" + 
            "3. Ver kilometraje de la bicicleta\n" + 
            "4. Ver kilometraje del coche\n" + 
            "5. Ver kilometraje total\n" + 
            "6. Ver vehículos totales\n" + 
            "7. Salir\n" + 
            "Elige una opción (1-7): " 
        );
    }

    public static void main(String[] args) {
        Scanner sc = new Scanner (System.in);
        int opcion;
        Bicicleta bici = new Bicicleta(); 
        Coche dacia = new Coche();
        Vehiculo v = new Vehiculo();

        do {
            
            System.out.print("Opcion: " + (opcion = sc.nextInt()));
            switch (opcion) {
                case 1:
                    System.out.print("Km a andar: ");
                    bici.anda(sc.nextInt());
                    break;
                case 2:
                    System.out.print("Km a andar: ");
                    dacia.anda(sc.nextInt());
                    break;
                case 3:
                    System.out.println( bici.getKilometrosrecorridos() + " km.");
                    break;
                case 4:
                    System.out.println(dacia.getKilometrosrecorridos() + " km.");
                    break;     
                case 5:
                    System.out.println(v.getKilometrosTotales() + " km.");
                    break;
                case 6:
                    System.out.println(v.getVehiculosCreados() + " km.");
                    break;
                case 7:
                    System.out.println("Saliendo...");    
                    break;
            
                default:
                System.out.println("Opción incorrecta.");
            } 
            menu();
        } while(opcion != 7);
        

        sc.close();
    }
}


