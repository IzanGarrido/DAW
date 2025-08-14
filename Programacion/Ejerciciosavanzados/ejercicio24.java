import java.util.Scanner;

public class ejercicio24 {
	public static void main(String[] args) {

		final int P_INSECTOS = 6;
		final int P_ARACNIDOS = 8;
		final int P_CRUSTACEOS = 10;
		final int P_CIENPIES = 2;
		final int P_MILPIES = 4;

		int insectos;
		int aracnidos;
		int crustaceos;
		int cienpies;
		int milpies;
		int seg_Cienpies;
		int seg_milpies;

		Scanner sc = new Scanner (System.in);

		System.out.print("Cuantos insectos hay ");
		insectos = sc.nextInt();
		System.out.print("Cuantos aracnidos hay ");
		aracnidos = sc.nextInt();
		System.out.print("Cuantos crustaceos hay ");
		crustaceos = sc.nextInt();
		System.out.print("Cuantos cienpies hay ");
		cienpies = sc.nextInt();
		System.out.print("Cuantos milpies hay ");
		milpies = sc.nextInt();
		System.out.print("Cuantos segmentos de cienpies hay ");
		seg_Cienpies = sc.nextInt();
		System.out.print("Cuantos segmentos de milpies hay ");
		seg_milpies	= sc.nextInt();
		
		System.out.println("Numero de patas " + ( insectos*P_INSECTOS
		 									  +   aracnidos*P_ARACNIDOS
											  +   crustaceos*P_CRUSTACEOS
											  +   cienpies*P_CIENPIES*seg_Cienpies
											  +   milpies*P_MILPIES*seg_milpies)
						  );

	}		
}	
		
	