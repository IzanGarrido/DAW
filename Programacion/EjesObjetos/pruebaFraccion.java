import libFraccion.Fraccion;

public class pruebaFraccion {
    public static void main(String[] args) {
    
        Fraccion miFraccion = new Fraccion();

        System.out.println("Numerador: "+miFraccion.getNumerador());
        System.out.println("Denominador: "+miFraccion.getDenominador());

        System.out.println("---");
       
        miFraccion.setNumerador(20);
        miFraccion.setDenominador(40);
        miFraccion.invertir();
        System.out.println("Numerador invertido: " + miFraccion.getNumerador());
        System.out.println("Denominador invertido: " + miFraccion.getDenominador());

        System.out.println("---");

        miFraccion.simplificar();

        System.out.println("Numerador Simplificado:" + miFraccion.getNumerador());
        System.out.println("Denominador Simplificado:" + miFraccion.getDenominador());
        System.out.println("---");
        miFraccion.setNumerador(5);
        miFraccion.setDenominador(10);

        miFraccion.multiplicar(3, 2);
        System.out.println("Numerador Multiplicado: " + miFraccion.getNumerador());
        System.out.println("Denominador Multiplicado: " + miFraccion.getDenominador());
        System.out.println("---");
        miFraccion.setNumerador(5);
        miFraccion.setDenominador(10);

        miFraccion.dividir(3, 2);
        System.out.println("Numerador Dividido: " + miFraccion.getNumerador());
        System.out.println("Denominador Dividido: " + miFraccion.getDenominador());
        
    }
}