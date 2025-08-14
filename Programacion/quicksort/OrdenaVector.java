import java.util.Arrays;
import lib.QuickSort;

public class OrdenaVector {

    public static void main(String[] args) {

        int num = 50;

        int[] list = new int[num];

        for (int i = 0; i < num; i++)
            list[i] = (int) (Math.random() * 100);

        System.out.println("Original:");
        System.out.println(Arrays.toString(list));

        QuickSort.quickSort(list);

        System.out.println("Ordenado:");
        System.out.println(Arrays.toString(list));

    }

}