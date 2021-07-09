<?php

function captura_de_valores(){
    //Verificar campos obligatorios y validos
   /** if(!isset($_POST['nombre']) || empty($_POST['nombre'])):
    wp_redirect(add_query_arg(array('errormsg'=> 'Debes introducir un nombre'), get_home_url()."/obten-tu-ranking")); exit;
    endif;*/

    global $wpdb;
    $suma = $wpdb->get_var( "SELECT sum(peso) FROM wp_criterios" );
    $suma =  round($suma,2);

    if(isset($_POST['resetear']) && !empty($_POST['resetear'])){
        wp_redirect(add_query_arg(array('reseteado'=> '1'), get_home_url()."/obten-tu-ranking")); exit;
    }

    if(isset($_POST['nuevovideojuego']) && !empty($_POST['nuevovideojuego'])){
        wp_redirect( get_home_url()."/nuevo-videojuego"); exit;
    }

    if(isset($_POST['eliminarvideojuego']) && !empty($_POST['eliminarvideojuego'])){
        wp_redirect( get_home_url()."/elimina-videojuego"); exit;
    }

    if(isset($_POST['nuevocriterio']) && !empty($_POST['nuevocriterio'])){
        wp_redirect( get_home_url()."/nuevo-criterio"); exit;
    }

    if(isset($_POST['eliminarcriterio']) && !empty($_POST['eliminarcriterio'])){
        wp_redirect( get_home_url()."/elimina-criterio"); exit;
    }


    //Si la suma de los criterios no es uno no se puede hacer el ranking
    if(isset($_POST['obtenerranking']) && !empty($_POST['obtenerranking']) && $suma !=1  ){
        ?><script>
            alert('No se puede realizar el ranking. La suma de los pesos de los criterios debe de ser 1.');
            window.location.href=' <?php echo get_home_url()."/obten-tu-ranking"; ?>';
        </script><?php
    }

    if(isset($_POST['obtenerranking']) && !empty($_POST['obtenerranking']) && $suma ==1 ){
        wp_redirect( get_home_url()."/obtener-ranking"); exit;
    }



}
add_action('admin_post_nopriv_criteriosform','captura_de_valores');
add_action('admin_post_criteriosform','captura_de_valores');
