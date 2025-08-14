public class Devoluciones extends Pedidos {
    
    public Devoluciones () {
        super();
    }
    
    public Devoluciones (String nombre, String producto, double precio) {
        super(nombre, producto, precio);
        this.id = "DE" + cont;
    }

    @Override
    public String toStringid() {
        return "id: " + this.id;
    }
    @Override
    public String toString() {
        return "\n ID: " + this.id +
                "\n Cliente: " + this.nombre +
                "\n Producto: " + this.producto +
                "\n Precio: " + this.precio;
    }

}
