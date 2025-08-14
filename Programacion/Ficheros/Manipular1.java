import java.io.FileWriter;
import java.io.IOException;
import java.util.Scanner;

public class Manipular1 {
    public static void main(String[] args) {

        Scanner sc = new Scanner(System.in);
        while (true) {
            try {
                
                FileWriter pw = new FileWriter("file1.txt",true);
                pw.write(sc.nextLine()+"\n");
                pw.close();
                
            } catch (IOException e) {
                e.printStackTrace();
            }
        }
    }
}