public class Eje3 {
    
    public static void main(String[]args) {

        char[][] campo = new char[20][20];
        int row;
        int col;
        int rowa;
        int rowp;
        int rowc;




        boolean repe;

        for (int i = 0; i < 20; i++) {
            
            for (int j = 0; j<20; j++) {

                campo[i][j] = '_';
        
            }
        }

        for (int i = 1; i<=50; i++) {

            do {
                repe = false;
            row = (int)Math.random()*20;
            col = (int)Math.random()*20;

            if (campo[row][col] == '*') repe = true;
            if ((row == 0 && col == 0) || (row == 0 && col == 1) ||
                (row == 1 && col == 0) || (row == 1 && col == 1))  repe = true;

            } while (repe);

            campo[row][col] = '*';

        }

        for (int i = 0; i < 20; i++) {
            
            for (int j = 0; j<20; j++) {

                campo[i][j] = '_';
        
            }

        System.out.println();

        }
        
    }

}
