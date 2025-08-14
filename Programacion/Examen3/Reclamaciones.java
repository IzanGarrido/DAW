public class Reclamaciones extends Pedidos{
    
    private String texto;
    private String estado;

    public Reclamaciones () {
        super();
    }

    public Reclamaciones (String nombre, String texto) {
        cont++;
        this.nombre = nombre;
        this.texto = texto;
        this.estado = "abierta";
        this.id = "RE" + cont;

    }
    @Override
    public String toStringid() {
        return "id: " + this.id;
    }

    @Override
    public String toString() {
        return "ID: " + this.id +
                "\n Cliente: " + this.nombre +
                "\n Texto: " + this.texto +
                "\n Estado: " + this.estado;
    }

    public void cierra () {
        this.estado = "cerrada";
    }

}
