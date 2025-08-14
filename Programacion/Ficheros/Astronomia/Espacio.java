import java.io.Serializable;

public class Espacio implements Serializable {
    private String object;
    private String con;
    private String ra;
    private String dec;
    private String mag;

    public Espacio(String object,String con, String ra, String dec, String mag) {
        this.object = object;
        this.con = con;
        this.ra = ra;
        this.dec = dec;
        this.mag = mag;
    }

    public String getObject() {
        return this.object;
    }

    public String getCon() {
        return this.con;
    }

    public String getmag() {
        return this.mag;
    }

    public String toStringobj() {
        return "Constelacion: " + con + ", Ascension recta: " + ra + ", Declinación: " + dec + ", Magnitud: " + mag;
    }
    
    public String toStringcon() {
        return "Objeto: " + object + ", Ascension recta: " + ra + ", Declinación: " + dec + ", Magnitud: " + mag; 
    }

    public String toStringmag() {
        return "Objeto: " + object + ", Constelacion: " + con + ", Ascension recta: " + ra + ", Declinación: " + dec; 
    }
    
}