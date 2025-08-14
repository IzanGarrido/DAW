public class Profesor extends Persona{
    
    private String ndespacho;

    public Profesor() {
        super();
    }

    public Profesor(String nombre, String apellidos, String nIF,String ndespacho) {
        super(nombre, apellidos, nIF);
        this.ndespacho = ndespacho;
    }
    
    public Profesor(String nombre, String apellidos, String nIF, Direccion direccion, String ndespacho) {
        super(nombre,apellidos,nIF,direccion);
        this.ndespacho = ndespacho;
    }
    public String getNdespacho() {
        return ndespacho;
    }

    public void setNdespacho(String ndespacho) {
        this.ndespacho = ndespacho;
    }

    @Override
    public String toString() {
        String res;
        if (direccion == null) {
            res = nombre+" "+apellidos+", NIF: "+nIF+", ndespacho: "+ndespacho;   
        } else {
            res = nombre+" "+apellidos+", NIF: "+nIF+", ndespacho: "+ndespacho + direccion.toString();
        }
        return res;
    }
    
}
