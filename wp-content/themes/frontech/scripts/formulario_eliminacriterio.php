<?php


function captura_de_valores_eliminacriterio(){

    $criterioseleccionado =  $_POST['criterio-seleccionado'];
    //Eliminamos el criterio de la BDD
    global $wpdb;
    $sql = "DELETE FROM wp_criterios WHERE nombre='$criterioseleccionado' ";
    $cc = $wpdb->get_results( $sql );

    //Redirigimos a la página del ranking con mensaje de exito
    ?><script>
        alert('Se ha eliminado con éxito el criterio');
        window.location.href=' <?php echo get_home_url()."/obten-tu-ranking"; ?>';
    </script><?php

}


add_action('admin_post_nopriv_eliminacriterioform','captura_de_valores_eliminacriterio');
add_action('admin_post_eliminacriterioform','captura_de_valores_eliminacriterio');