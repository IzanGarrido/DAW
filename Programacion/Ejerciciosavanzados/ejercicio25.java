import java.util.Scanner;

public class ejercicio25 {
    public static void main(String[] args){

        int NumHuevosCazuela;
        int NumHuevosCocer;
        int lotes;
        int TiempoTotal;

        Scanner sc = new Scanner (System.in);

        System.out.print("Cuantos huevos caben en la cazuela: ");
        NumHuevosCazuela = sc.nextInt();
        System.out.print("Cuantos huevos quieres cocer: ");
        NumHuevosCocer = sc.nextInt();

        lotes = (NumHuevosCocer + NumHuevosCazuela - 1) / NumHuevosCazuela;
        TiempoTotal = lotes * 10;

        System.out.println("Para cocer " + NumHuevosCocer + " huevos en una cazuela que caben " + NumHuevosCazuela + " huevos se necesitan " + TiempoTotal + " minutos.");



    }

}