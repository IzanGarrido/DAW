public class Circulo extends Figura { 

    private double radio;

    public Circulo(double radio) {
        this.radio = radio;
    }
 
    public double area() {
        return 3.14 * radio * radio;
    }

    public double perimetro() {
        return 2 * 3.14 * radio;
    }
    
}