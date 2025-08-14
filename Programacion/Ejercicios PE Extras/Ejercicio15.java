import java.util.Scanner;

public class Ejercicio15 {
    
    public static void main(String[]args) {

        Scanner sc = new Scanner (System.in);
        int res;
        int i = 0;

        System.out.print("1. Qué es un int? \n 1: Un entero. \n 2: Un Doble.\n Respuesta: ");
        res = sc.nextInt();
        if (res==1) {
            i++;
        } else if (res==2) {
        } else System.out.println("Respuesta incorrecta.");
        
        System.out.print("2. Qué es un while? \n 1: Un si. \n 2: Un mientras.\n Respuesta: ");
        res = sc.nextInt();
        if (res==2) {
            i++;
        } else if (res==2) {
        } else System.out.println("Respuesta incorrecta.");

        System.out.print("3. Qué es más correcto para hacer un contador? \n 1: Un while. \n 2: Un for.\n Respuesta: ");
        res = sc.nextInt();
        if (res==2) {
            i++;
        } else if (res==2) {
        } else System.out.println("Respuesta incorrecta.");

        System.out.print("4. Cual es el elemento que soporta los componentes del PC? \n 1: Placa base. \n 2: Procesador.\n Respuesta: ");
        res = sc.nextInt();
        if (res==1) {
            i++;
        } else if (res==2) {
        } else System.out.println("Respuesta incorrecta.");

        System.out.print("5. Qué hace un boolean? \n 1: Dice si una variable es true o false. \n 2: Es para hacer un condición, cómo el while.\n Respuesta: ");
        res = sc.nextInt();
        if (res==1) {
            i++;
        } else if (res==2) {
        } else System.out.println("Respuesta incorrecta.");

        System.out.print("6. HTML para qué sirve? \n 1: Para hacer aplicaciones. \n 2: Para hacer páginas web.\n Respuesta: ");
        res = sc.nextInt();
        if (res==2) {
            i++;
        } else if (res==2) {
        } else System.out.println("Respuesta incorrecta.");

        System.out.print("7. Cuál es el cerebro de un ordenador? \n 1: CPU. \n 2: RAM.\n Respuesta: ");
        res = sc.nextInt();
        if (res==1) {
            i++;
        } else if (res==2) {
        } else System.out.println("Respuesta incorrecta.");

        System.out.print("8. Qué tipo de almacenamiento es mejor actualmente? \n 1: HDD. \n 2: SSD.\n Respuesta: ");
        res = sc.nextInt();
        if (res==2) {
            i++;
        } else if (res==2) {
        } else System.out.println("Respuesta incorrecta.");

        System.out.print("9. Qué guarda las aplicaciones de nuestro PC? \n 1: El disco duro. \n 2: La memoria RAM.\n Respuesta: ");
        res = sc.nextInt();
        if (res==1) {
            i++;
        } else if (res==2) {
        } else System.out.println("Respuesta incorrecta.");

        System.out.print("10. Qué tarjeta gráfica es mejor? \n 1: RTX 1080 Ti. \n 2: RTX 4090 Ti.\n Respuesta: ");
        res = sc.nextInt();
        if (res==2) {
            i++;
        } else if (res==2) {
        } else System.out.println("Respuesta incorrecta.");

        System.out.println("Tu puntuación es " + i);

    }

}
