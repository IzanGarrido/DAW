public class Direccion {
    
    protected String calle;
    protected String ciudad;
    protected String codPostal;
    protected String pais;

    public Direccion(String calle, String ciudad, String codPostal, String pais) {
        this.calle = calle;
        this.ciudad = ciudad;
        this.codPostal = codPostal;
        this.pais = pais;
    }

    @Override
    public String toString() {
        return " [ calle: " + calle + ", ciudad: " + ciudad + ", codPostal: " + codPostal + ", pais: " + pais + " ]";
    }

    
}
