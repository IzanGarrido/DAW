import libMesa.Mesa;

public class pruebaMesa {
    public static void main(String[] args) {
        
        Mesa miMesa = new Mesa();

        System.out.println(miMesa.getColor());

        miMesa.setcolor("Amarillo");
        System.out.println("Nuevo color: " + miMesa.getColor());
        System.out.println("Area: " + miMesa.area());
        System.out.println(" - - - ");

        Mesa otraMesa = new Mesa("Azul", 3, 50, 60, "Acero");
        System.out.println("Nuevo color: " + otraMesa.getColor());
        System.out.println("Otra Area: " + otraMesa.area());
        System.out.println("Otra Area m: " + otraMesa.area("m"));
        System.out.println("Otra Area in: " + otraMesa.area("in"));
        System.out.println("Otra Area x: " + otraMesa.area("x"));



    }
}
