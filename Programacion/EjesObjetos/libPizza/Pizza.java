package libPizza;

public class Pizza {
    
    private String tamanyo;
    private String tipo;
    private String estado = "pedida";
    private static int Pedidas;
    private static int Servidas;

    public Pizza(String tipo, String tamanyo) {
        this.tamanyo = tamanyo;
        this.tipo = tipo;
        Pedidas++;
    }
    public String getTamanyo() {
        return tamanyo;
    }
    public void setTamanyo(String tamanyo) {
        this.tamanyo = tamanyo;
    }
    public String getTipo() {
        return tipo;
    }
    public void setTipo(String tipo) {
        this.tipo = tipo;
    }
    public String getEstado() {
        return estado;
    }
    public void setEstado(String estado) {
        this.estado = estado;
    }
    public String toString() {
        return "Pizza " + tipo + " " + tamanyo + ", " + estado;
    }

    public void sirve() {
        if (estado.equals("servida")) System.out.println("esa pizza ya se ha servido");
        else {
            this.estado = "servida";
            Servidas++;
        }
    }

    public static int getTotalPedidas() {
        return Pedidas;
    }

    public static int getTotalServidas() {
        return Servidas;
    }
}
