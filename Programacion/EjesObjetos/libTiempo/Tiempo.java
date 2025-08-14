package libTiempo;

public class Tiempo implements Comparable<Tiempo>{

    private int horas;
    private int minutos;
    private int segundos;

    public Tiempo (int a_horas, int a_minutos, int a_segundos){
        this.horas = a_horas;
        this.minutos = a_minutos;
        this.segundos = a_segundos;
    }

    public int getHoras() {
        return horas;
    }

    public void setHoras(int a_horas) {
        this.horas = a_horas;
    }

    public int getMinutos() {
        return minutos;
    }

    public void setMinutos(int a_minutos) {
        this.minutos = a_minutos;
    }

    public int getSegundos() {
        return segundos;
    }

    public void setSegundos(int a_segundos) {
        this.segundos = a_segundos;
    }

    public void set(int a_horas, int a_minutos, int a_segundos) {
        this.horas = a_horas;
        this.minutos = a_minutos;
        this.segundos = a_segundos;

    }

    public String toString () {
        String res = horas + "h " + minutos + "m " + segundos + "s" ;
        return res;
    }

    public String suma (Tiempo unTiempo) {
        if (segundos + unTiempo.getSegundos() > 60) {
            this.segundos = (segundos + unTiempo.getSegundos()) - 60;
            this.minutos += 1;
        } else {
            this.segundos = segundos + unTiempo.getSegundos();
        }
        if (minutos + unTiempo.getMinutos() > 60) {
            this.minutos = (minutos + unTiempo.getMinutos()) - 60;
            this.horas += 1;
        } else {
            this.minutos = minutos + unTiempo.getMinutos();
        }
        this.horas = horas + unTiempo.getHoras();
        String res = toString();
        return res;
    }

    public String resta (Tiempo unTiempo) {
        String res;

        if (segundos - unTiempo.getSegundos() < 0) {
            this.segundos = (segundos - unTiempo.getSegundos()) + 60;
            this.minutos -= 1;
        } else {
            this.segundos = segundos - unTiempo.getSegundos();
        }
        if (minutos - unTiempo.getMinutos() < 0) {
            this.minutos = (minutos - unTiempo.getMinutos()) + 60;
            this.horas -= 1;
        } else {
            this.minutos = minutos - unTiempo.getMinutos();
        }
        if(horas - unTiempo.getHoras() < 0) {
            this.horas = 0;
            this.minutos = 0;
            this.segundos = 0;
            res = "0s";
        } else {
            this.horas -= unTiempo.getHoras();
            res = toString();
        }
        return res;
    }

    public int compareTo (Tiempo unTiempo) {
        int res;
        int temp = (this.getHoras() * 36000) + (this.getMinutos() * 60) + (this.getSegundos());
        int temp2 = (unTiempo.getHoras() * 36000) + (unTiempo.getMinutos() * 60) + (unTiempo.getSegundos());
        if  (temp > temp2)  res = 1;   
        else if (temp == temp2) res = 0;
        else res = -1;
        return res;
    }
    
}