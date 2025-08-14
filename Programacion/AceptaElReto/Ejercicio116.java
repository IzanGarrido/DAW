import java.util.Scanner;

public class Ejercicio116 {
	public static void main(String[] args) {

		int n;
		int i;
		
		Scanner sc = new Scanner(System.in);
		
		System.out.print("Dime un numero del 0 al 5: ");
		n = sc.nextInt();
	
		if (n>0 & n<=5) {

			for (i = 0; i < n; i++)	{

				System.out.println("Hola mundo.");	

			}

		} else {

			System.out.println("Numero incorrecto");

		}

	}
	
}		