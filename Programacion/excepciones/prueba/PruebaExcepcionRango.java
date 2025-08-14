public class PruebaExcepcionRango {

    public static void rango(int num) throws ExcepcionRango {
        if ((num > 100) || (num < 0)) {
            throw new ExcepcionRango("Número fuera del rango [0,100]");
        }
    }
    public static void main(String[] args) {

        try {

            System.out.println("Probamos con un número 50");
            rango(50);
            System.out.println("Probamos con un número 75");
            rango(75);
            System.out.println("Probamos con un número 100");
            rango(100);
            System.out.println("Probamos con un número -1");
            rango(-1);

        } catch (ExcepcionRango e) {

            System.out.println("Excepcion: " + e.getMessage());

        }
    }
}