package libFraccion;

public class Fraccion {
    
    private int numerador;
    private int denominador;

    public Fraccion() {
        this.numerador = 1;
        this.denominador = 1;
    }

    public int getNumerador() {
        return numerador;
    }

    public void setNumerador(int numerador) {
        this.numerador = numerador;
    }

    public int getDenominador() {
        return denominador;
    }

    public void setDenominador(int denominador) {
        this.denominador = denominador;
    }

    public void invertir () {
        int temp = this.numerador;
        this.numerador = this.denominador;
        this.denominador = temp;

    }
    public void simplificar () {    
        for (int i = 5; i >1; i--) {
            while (numerador%i == 0 && denominador%i == 0 ) {
                this.numerador= numerador/i;
                this.denominador= denominador/i;
                
            }
        }     
    }

    public void multiplicar (int a_numerador, int a_denominador) {
        this.numerador *= a_numerador;
        this.denominador *= a_denominador;
        
    }

    public void dividir (int a_numerador, int a_denominador) {
        this.numerador *= a_denominador;
        this.denominador *= a_numerador;
        
    }
}
