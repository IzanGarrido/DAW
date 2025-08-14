public class Pieza {

    String nombre;
    String color;

    public Pieza(String nombre, String color) {
        this.nombre = nombre;
        this.color = color;
    }

    double area(){
        return 1.0;
    }
    
    public boolean equals(Object o) {
        Pieza p = (Pieza) o;
        return this.color.equals(p.color) &&
        this.nombre.equals(p.nombre) &&
        this.area() == p.area();
        }
    
}
