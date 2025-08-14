package libCafetera;

public class Cafetera {
    
    private int capacidadMaxima;
    private int cantidadActual;

    public Cafetera() {
        this.capacidadMaxima = 1000;
        this.cantidadActual = 0;
    }

    public Cafetera(int a_capacidadMaxima) {

        this.cantidadActual = a_capacidadMaxima;
        this.capacidadMaxima = a_capacidadMaxima;
    }
    public Cafetera(int a_capacidadMaxima, int a_cantidadActual) {

        this.cantidadActual = a_cantidadActual;
        this.capacidadMaxima = a_capacidadMaxima;
        if (cantidadActual > capacidadMaxima) this.capacidadMaxima = a_capacidadMaxima;

    }

    public int getCapacidadMaxima() {
        return capacidadMaxima;
    }

    public void setCapacidadMaxima(int capacidadMaxima) {
        this.capacidadMaxima = capacidadMaxima;
    }

    public int getCantidadActual() {
        return cantidadActual;
    }

    public void setCantidadActual(int cantidadActual) {
        this.cantidadActual = cantidadActual;
    }
    
    public void llenarCafetera() {
        this.cantidadActual = capacidadMaxima;
    }

    public void servirTaza(int capacidad) {
        if (capacidad > capacidadMaxima) {
            cantidadActual -= cantidadActual;
        } else {
            cantidadActual -= capacidad;
        }

    }

    public void vaciarCafetera() {
        cantidadActual = 0;
    }

    public void agregarCafe(int cantidad) {
        cantidadActual += cantidad;
    }
}
