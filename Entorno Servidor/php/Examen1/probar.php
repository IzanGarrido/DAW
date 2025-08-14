<?php 

$tablero = array(
        array(" ", " ", " "),
        array(" ", "s", " "),
        array("s", " ", " ")
    );

    for ($i=0; $i < count($tablero); $i++) { 
        for ($j=0; $j < count($tablero[$i]); $j++) { 
            printf("%2s",$tablero[$i][$j]);
            if ($j < count($tablero[$i]) - 1) {
                printf(" |");
            } 
        }
        echo "\n";
        if ($i < count($tablero) - 1) {
            echo "---|---|---\n";
        }
    }
?>