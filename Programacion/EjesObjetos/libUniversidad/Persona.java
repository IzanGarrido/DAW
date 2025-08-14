public class Persona {
    
    protected String nombre;
    protected String apellidos;
    protected String nIF;
    protected Direccion direccion;

    public Persona(){
    }
    public Persona(String nombre, String apellidos, String nIF, Direccion direccion) {
        this.nombre = nombre;
        this.apellidos = apellidos;
        this.nIF = nIF;
        this.direccion = direccion;
    }
    public Persona(String nombre, String apellidos, String nIF) {
        this.nombre = nombre;
        this.apellidos = apellidos;
        this.nIF = nIF;
    }
    public String toString() {
        return nombre+" "+apellidos+", NIF: "+nIF + ((direccion == null) ? "" : direccion.toString());
    }

}
