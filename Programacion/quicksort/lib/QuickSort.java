package lib;

public class QuickSort {

    public static void quickSort(int[] list, int izda, int dcha) {

        int contra = izda;
        int sentido = 1;
        int pivote = dcha;
        int aux;

        do {
            if ((list[contra] > list[pivote] && pivote > contra)
                    || (list[contra] < list[pivote] && pivote < contra)) {
                aux = list[contra];
                list[contra] = list[pivote];
                list[pivote] = aux;

                aux = contra;
                contra = pivote;
                pivote = aux;
                sentido = -sentido;

            }
            contra = contra + sentido;

        } while (contra != pivote);

        if (Math.abs(izda - dcha) > 1) {

            if (pivote - izda > 1)
                quickSort(list, izda, pivote - 1);
            if (dcha - pivote > 1)
                quickSort(list, pivote + 1, dcha);

        }

    }

    public static void quickSort(int[] list) {
        quickSort(list, 0, list.length - 1);
    }

}