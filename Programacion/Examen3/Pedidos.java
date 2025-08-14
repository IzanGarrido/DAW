public class Pedidos {

    protected String nombre;
    protected String id;
    protected String producto;
    protected double precio;
    protected static int cont = 0;

    public Pedidos () {
    }

    public Pedidos(String nombre, String producto, double precio) {
        cont++;
        this.nombre = nombre;
        this.id = "PE" + cont;
        this.producto = producto;
        this.precio = precio;  
    }

    public String toStringid() {
        return "id: " + id;
    }

    public String toString() {
        return "\n ID: " + this.id +
                "\n Cliente: " + this.nombre +
                "\n Producto: " + this.producto +
                "\n Precio: " + this.precio;
    }

    public void cierra () {
    }

}