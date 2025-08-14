import java.util.Scanner;

public class ejercicio22 {
	public static void main(String[] args) {

		float peso;
		float altura;
		double resultado;

		Scanner sc = new Scanner(System.in);

		System.out.print("Cual es tu peso (Kg): ");
		peso = sc.nextFloat()

		System.out.print("Cual es tu altura (m): ");
		altura = sc.nextFloat();
		resultado = peso / (Math.pow(altura, 2));
		
		System.out.printf("Tu indice de masa corporal es " + "%5.2f", resultado);

	}
}	