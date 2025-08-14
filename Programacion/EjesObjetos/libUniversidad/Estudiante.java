public class Estudiante extends Persona{
    
    private String iDEstudiante;

    public Estudiante (){
        super();
    }
    public Estudiante (String nombre, String apellidos, String nIF, Direccion direccion, String iDEstudiante){   
        super(nombre, apellidos, nIF,direccion);
        this.iDEstudiante = iDEstudiante;
    }
    public Estudiante (String nombre, String apellidos, String nIF, String iDEstudiante){   
        super(nombre,apellidos,nIF);
        this.iDEstudiante = iDEstudiante;
    }
    public String getiDEstudiante() {
        return iDEstudiante;
    }
    public void setiDEstudiante(String iDEstudiante) {
        this.iDEstudiante = iDEstudiante;
    }
    @Override
    public String toString() {
        String res;
        if (direccion== null) {
            res = nombre+" "+apellidos+", NIF: "+nIF+", iDEstudiante: "+iDEstudiante;   
        } else {
            res = nombre+" "+apellidos+", NIF: "+nIF+", iDEstudiante: "+iDEstudiante + direccion.toString();
        }
        return res;
    }
    

}
