<?php


function captura_de_valores_eliminavideojuego(){

    $videojuego = $_POST['videojuego-seleccionado'];

    //Eliminamos el videoejugo de la BDD
    global $wpdb;
    $sql = "DELETE FROM wp_videojuegos WHERE nombre='$videojuego' ";
    $cc = $wpdb->get_results( $sql );

    //Redirigimos a la página del ranking con mensaje de exito
    ?><script>
        alert('Se ha eliminado con éxito el videojuego');
        window.location.href=' <?php echo get_home_url()."/obten-tu-ranking"; ?>';
    </script><?php
}

add_action('admin_post_nopriv_eliminavideojuegoform','captura_de_valores_eliminavideojuego');
add_action('admin_post_eliminavideojuegoform','captura_de_valores_eliminavideojuego');