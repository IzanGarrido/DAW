package libreria;

public class FNumDAW {

    public static int potencia(int base, int potencia) {

        int resultado = 1;

        for(int i= potencia; i > 0; i--) {
            resultado = resultado*base;
        }

        return resultado;  
    }
    
    public static int cuentaDigitos(int numero) {

        int digitos;
        numero = Math.abs(numero);

        digitos = (int)(Math. log10(numero)+1);

        return digitos;
    }

    public static int voltea(int numero) {

        int resto;
        int invertido = 0;
        while (numero >0) {
            resto = numero % 10;
            invertido = invertido *10 + resto;
            numero /=10;
        }

        return invertido;

    }

    public static boolean esCapicua(int numero) {

        int invertido;
        boolean res;

        numero = Math.abs(numero);
        invertido = voltea(numero);
       
        if (numero != invertido) {
    
            res = false;
        } else res = true;

        return res;
    }

    public static boolean esPrimo(int numero) {

        int n = numero;
        int cont;
        boolean primo;
		cont = n - 1;
		
		if (n <= 0 || n == 1) primo = false;
		else                  primo = true;
		
		while(primo && cont > 1) {

			if (n%cont == 0) primo = false;
			cont--;
			
		}
        return primo;

    }

    public static int siguientePrimo(int numero) {

        boolean seguir;
		
        do {
            numero++;
            seguir = esPrimo(numero);
        } while (seguir!=true);

        return numero;
    }

    public static int anteriorPrimo(int numero) {

        boolean seguir;
		
        do {
            numero--;
            seguir = esPrimo(numero);
        } while (seguir!=true);

        return numero;
    }

    public static int digitoN (int numero, int posicion) {

        String num = Integer.toString(numero);
        char digitoChar = num.charAt(posicion);
        int digito = Character.getNumericValue(digitoChar);
        
        return digito;
    }

    public static int posicionDeDigito (int numero, int posicion) {

        String num;
        char digitoChar;
        int digito;
        num = Integer.toString(numero);

        if (posicion >= 0 && posicion < num.length()) {
            
            digitoChar = num.charAt(posicion);
            digito = Character.getNumericValue(digitoChar);
        } else digito = -1;

        return digito;
    }

    public static int parteNumero (int numero, int posInicial, int posFinal) {

        String numTxt;
        int trozo;
        numTxt = Integer.toString(numero);
        numTxt = numTxt.substring(posInicial, posFinal);
        trozo = Integer.parseInt(numTxt);

        return trozo;
    }

    public static int pegaNumeros (int num1, int num2) {

        String union = Integer.toString(num1) + Integer.toString(num2);
        int npegados = Integer.valueOf(union);

        return npegados;
    }

    public static boolean kaprekar (int numero) {

        boolean kaprekar;
        int suma = 0;
        int pot = numero * numero;

        if (numero > 3) {
            int digitos = FNumDAW.cuentaDigitos(pot);
            int num1 = FNumDAW.parteNumero(pot, 0, digitos / 2);
            int num2 = FNumDAW.parteNumero(pot, digitos / 2, digitos);
            suma = num1 + num2;    
        } else if (numero < 4) kaprekar = false;
        if (numero == suma) kaprekar = true;
        else kaprekar = false;

        return kaprekar;
    }
}