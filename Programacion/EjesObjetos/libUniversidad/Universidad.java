public class Universidad {
    
    public static void main(String[] args) {
        // Crear la dirección para darsela a Izan
        Direccion dIzan = new Direccion("paco", "madrid", "21312", "españa");

        // Creo el estudiante Izan
        Estudiante Izan = new Estudiante("Izan","Garrido","342342", dIzan,"21012");

        // Creo la persona Maxi
        Persona Maxi = new Persona("Maxi","Lopez","643234");

        // Creo el profesor Ginés
        Profesor Gines = new Profesor("Gines", "Garcia","212312","3213");
        
        // Mostrar Izan
        System.out.println(Izan.toString());
        System.out.println("---");
        // Mostrar Maxi
        System.out.println(Maxi.toString());
        System.out.println("---");
        // Mostrar Gines
        System.out.println(Gines.toString());
        System.out.println("---");
        // Estableces nuevo despacho a Gines
        Gines.setNdespacho("42342");

        // Mostrar nuevo despacho de Gines
        System.out.println("Ndespacho" + Gines.getNdespacho());
        System.out.println("---");
        // Establacer nuevo id de estudiante a Izan
        Izan.setiDEstudiante("12345");

        // Mostrar nuevo id de Izan
        System.out.println("Id estudiantes " + Izan.getiDEstudiante());

    }
}
