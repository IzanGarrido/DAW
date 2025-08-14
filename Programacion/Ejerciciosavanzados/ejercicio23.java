import java.util.Scanner;

public class ejercicio23 {
	public static void main(String[] args){

		int a;
		int b;
		int c;

		Scanner sc = new Scanner(System.in);

		System.out.print("Cual es la a: ");
		a = sc.nextInt();
			
		System.out.print("Cual es la b: ");
		b = sc.nextInt();
			
		System.out.print("Cual es la c: ");
		c = sc.nextInt();									
		
		System.out.println (-b - (Math.sqrt (Math.pow (b, 2)) - 4 * a * c) / (2 * a));

	}
}