import java.util.Stack;
import java.util.Iterator;
public class EDStack {
    public static void main(String[] args) {
        // Creamos Stack
        Stack<String> diasSemana = new Stack<String>();
        Stack<Integer> numeros = new Stack<Integer>();
        String dia;
        Integer numero;
        // Añadimos elementos a Stack
        diasSemana.push("Lunes");
        diasSemana.push("Martes");
        diasSemana.push("Miércoles");
        diasSemana.push("Jueves");
        diasSemana.push("Viernes");
        diasSemana.push("Sabado");
        diasSemana.push("Domingo");
        for (int i = 1; i <= 10; i++) {
            numeros.push(i);
        }
        // Iteramos
        System.out.println("Iteramos con Iterator");
        Iterator<String> its = diasSemana.iterator();
        while (its.hasNext()) {
            System.out.println(its.next());
        }
        System.out.println("Iteramos con Foreach");
        for (Integer num : numeros) {
            System.out.println(num);
        }
        // Buscamos un elemento
        dia = "Jueves";
        numero = 5;
        System.out.printf("El día de la semana %s está en la posición %d de la pila %s\n",
        dia, diasSemana.search(dia),diasSemana);
        System.out.printf("El número %d está en la posición %d de la pila %s\n", numero,
        numeros.search(numero),numeros.toString());
        // Obtenemos el primer elemento
        System.out.printf("El día de la semana en el tope de la pila es el %s\n",
        diasSemana.peek());
        System.out.printf("El número en el tope de la pila es el %s\n", numeros.peek());
        // Desapilamos elementos hasta dejar la pila vacía
        System.out.println("Desapilamos los elementos hasta vaciar la pila");
        while (!diasSemana.isEmpty()) {
            System.out.printf("Se va a eliminar el elemento %s\n", dia);
            diasSemana.pop();
            System.out.printf("La pila es: %s\n", diasSemana);
            if (!diasSemana.isEmpty()){
                dia = diasSemana.peek();
            }
        }
        while (!numeros.isEmpty()) {
            System.out.printf("Se va a eliminar el elemento %d\n", numero);
            numeros.pop();
            System.out.printf("La pila es: %s\n", numeros.toString());
            if (!numeros.isEmpty()){
                numero = numeros.peek();
            }
        }
    }
}