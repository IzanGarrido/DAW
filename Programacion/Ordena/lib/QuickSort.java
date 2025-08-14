package lib;

public class QuickSort {

    public static void quickSort(int[] array) {
        quickSort(array, 0, array.length - 1);
    }

    private static void quickSort(int[] array, int min, int max) {
        if (min < max) {
            int saltarN = partir(array, min, max);
            quickSort(array, min, saltarN - 1);
            quickSort(array, saltarN + 1, max);
        }
    }

    public static int partir(int[] array, int min, int max) {
        int saltar = array[max];
        int i = min - 1;

        for (int j = min; j < max; j++) {
            if (array[j] <= saltar) {
                i++;
                cambiar(array, i, j);
            }
        }

        cambiar(array, i + 1, max);

        return i + 1;
    }

    public static void cambiar(int[] array, int i, int j) {
        int temp = array[i];
        array[i] = array[j];
        array[j] = temp;
    }
}
