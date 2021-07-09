<?php

function captura_de_valores_matriz()
{

    /*foreach($_POST as $campo => $valor){
        echo "  ". $campo ." = ". $valor."  " ;
    }*/

    global $wpdb;
    $numfilas = $wpdb->get_var("SELECT COUNT(nombre) FROM wp_videojuegos");
    $numcolumnas = $wpdb->get_var("SELECT COUNT(nombre) FROM wp_criterios");


    //Creamos matriz de valoraciones
    $matriz_valoraciones = array ();

        for ($i = 1; $i <= $numfilas; $i++) {
            $matriz_valoraciones [$i]= array();
                for ($j = 1; $j <= $numcolumnas; $j++) {
                    $pos = "X". strval($i) . strval($j);
                    //echo "pos actual = "; echo $pos;
                    $matriz_valoraciones[$i][$j] =  $_POST[$pos];
                }
        }


    //Normalizar los valores de la matriz a partir del ideal de referencia

    //Obtenemos los criterios y los ordenamos por su peso
    $criterios = $wpdb->get_results("SELECT * FROM wp_criterios ORDER BY peso desc");

    //Obtenemos los videojuegos
    $videojuegos = $wpdb->get_results("SELECT * FROM wp_videojuegos");

    for ($i = 0; $i < $numfilas; $i++) {
        for ($j = 0; $j< $numcolumnas; $j++) {

            //Obtenemos el rango de trabajo del criterio $j
            //print_r($criterios[$j]->nombre); echo " rango ideal = [0,"; print_r($criterios[$j]->rango_ideal); echo"]  ";
            //echo $matriz_valoraciones [$i+1][$j+1] ;
            if( $matriz_valoraciones [$i+1][$j+1] >= 0 && $matriz_valoraciones[$i+1][$j+1]<= $criterios[$j]->rango_ideal  ){
                $matriz_valoraciones [$i+1][$j+1] = 1;
                // echo "X"; echo $i+1; echo $j+1; echo "  vale 1  ";
            }
            elseif ($matriz_valoraciones [$i+1][$j+1] >= $criterios[$j]->rango_trabajo_ini &&
                $matriz_valoraciones [$i+1][$j+1] <= $criterios[$j]->rango_trabajo_fin &&
                ($criterios[$j]->rango_trabajo_ini != 0)){
                $min = min(abs($matriz_valoraciones [$i+1][$j+1] - 0),
                    abs($matriz_valoraciones [$i+1][$j+1] - $criterios[$j]->rango_ideal ));
                    $matriz_valoraciones [$i+1][$j+1] = 1 - ($min/abs($criterios[$j]->rango_trabajo_ini - 0));
            }

            elseif ($matriz_valoraciones [$i+1][$j+1] >= $criterios[$j]->rango_ideal &&
                $matriz_valoraciones [$i+1][$j+1] <= $criterios[$j]->rango_trabajo_fin &&
                ($criterios[$j]->rango_ideal != $criterios[$j]->rango_trabajo_fin)){
                $min = min(abs($matriz_valoraciones [$i+1][$j+1] - 0),
                    abs($matriz_valoraciones [$i+1][$j+1] - $criterios[$j]->rango_ideal ));
                $matriz_valoraciones [$i+1][$j+1] = 1 - ($min/abs($criterios[$j]->rango_ideal -$criterios[$j]->rango_trabajo_fin));
            }
        }
    }



    //Añadir los pesos a los valores de la matriz
    for ($i = 0; $i < $numfilas; $i++) {
        for ($j = 0; $j< $numcolumnas; $j++) {
            $matriz_valoraciones [$i+1][$j+1] = $matriz_valoraciones [$i+1][$j+1] * $criterios[$j]->peso;
        }
    }

    $ranking = array();
    //Por cada videojuego, calcular la variación con la referencia ideal
    for ($i = 0; $i < $numfilas; $i++) {
        $sumatoriapositiva = 0;
        $sumatorianegativa = 0;
        for ($j = 0; $j< $numcolumnas; $j++) {
            $sumatoriapositiva += pow($matriz_valoraciones [$i+1][$j+1] - $criterios[$i]->peso,2);
            $sumatorianegativa += pow($matriz_valoraciones [$i+1][$j+1],2);

        }

        $variacionpositiva = sqrt($sumatoriapositiva);
        $variacionnegativa = sqrt($sumatorianegativa);
        $referencia = $variacionnegativa / ($variacionpositiva + $variacionnegativa);




        $sql = "UPDATE wp_videojuegos SET valor_rim =";
        $sql =  $sql . $referencia; $sql =  $sql ." WHERE nombre ='";
        $sql =  $sql . $videojuegos[$i]->nombre ;
        $sql = $sql . "'";
        //print_r($sql);

        $wpdb->get_results($sql);
    }

    wp_redirect(get_home_url()."/ranking");  exit;
}

add_action('admin_post_nopriv_obtenerrankingform','captura_de_valores_matriz');
add_action('admin_post_obtenerrankingform','captura_de_valores_matriz');

