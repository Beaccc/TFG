<?php

function captura_de_valores_nuevocriterio(){

    //Saneamos los valores
      if($_POST['rango-ini'] < 0 || $_POST['rango-fin'] < 0 || $_POST['rango-ideal'] < 0 ){
          wp_redirect(add_query_arg(array('errormsg'=> 'Los rangos no pueden ser negativos'), get_home_url()."/nuevo-criterio")); exit;
      }

      if($_POST['peso'] <0 || $_POST['peso'] >1 ){
          wp_redirect(add_query_arg(array('errormsg'=> 'El peso debe estar entre 0 y 1, incluyendo decimales'), get_home_url()."/nuevo-criterio")); exit;
      }

    //Aseguramos que la suma de los criterios no sea más de 1
    global $wpdb;
    $cc = $wpdb->get_var( "SELECT sum(peso) FROM wp_criterios" );
    $suma_actual =  round($cc,2);
    $suma_total = $_POST['peso'] + round($cc,2);
    $restante = 1 - $suma_actual;

    if($suma_total >1 ){
        wp_redirect(add_query_arg(array('errormsg'=> 'La suma de los pesos no puede ser mayor a 1. Actualmente tu suma es de '. $suma_actual.'. Tu nuevo criterio puede tener un peso de hasta: '.$restante), get_home_url()."/nuevo-criterio")); exit;
    }


    //Introducimos el nuevo criterio en la BDD
        $nombre =$_POST['nombrecriterio'];
        $rangoini=  $_POST['rango-ini'];
        $rangofin = $_POST['rango-fin'];
        $rangoideal= $_POST['rango-ideal'];
        $peso = $_POST['peso'];


        $wpdb->insert("wp_criterios", array(
            "nombre" => $nombre,
            "rango_trabajo_ini" => $rangoini,
            "rango_trabajo_fin" => $rangofin,
            "rango_ideal" => $rangoideal,
            "peso" => $peso,
        ));

    //Redirigimos a la página del ranking con mensaje de exito
    ?><script>
    alert('Se ha añadido el nuevo criterio');
    window.location.href=' <?php echo get_home_url()."/obten-tu-ranking"; ?>';
    </script><?php
   // wp_redirect(add_query_arg(array('nuevocriterio'=> '1'), get_home_url()."/obten-tu-ranking")); exit;


}

add_action('admin_post_nopriv_nuevocriterioform','captura_de_valores_nuevocriterio');
add_action('admin_post_nuevocriterioform','captura_de_valores_nuevocriterio');
