public class Vehiculo {

    private static int vehiculosCreados;
    private static int kilometrosTotales;
    private int kilometrosrecorridos;
    
    public Vehiculo() {
    }

    public void anda(int km) {
        vehiculosCreados++;
        kilometrosrecorridos += km;
        kilometrosTotales += km;
    }

    public int getKilometrosrecorridos() {
        return this.kilometrosrecorridos;
    }
        
    public int getKilometrosTotales () {
        return kilometrosTotales;
    }

    public int getVehiculosCreados () {
        return vehiculosCreados;
    }
    
}