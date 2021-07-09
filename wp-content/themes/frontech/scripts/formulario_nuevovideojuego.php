<?php

function captura_de_valores_nuevovideojuego(){


    //Saneamos los valores
      if($_POST['anio'] < 1900 || $_POST['anio'] > 2022 ){
          wp_redirect(add_query_arg(array('errormsg'=> 'Introduce un año válido'), get_home_url()."/nuevo-videojuego")); exit;
      }

    //Introducimos el nuevo videojuego en la BDD
        $nombre = $_POST['nombrevideojuego'];
        $anio = $_POST['anio'];
        $data = file_get_contents($_FILES['fileToUpload']['tmp_name']);

        global $wpdb;
        $wpdb->insert("wp_videojuegos", array(
            "nombre" => $nombre,
            "anio" => $anio,
            "imagen" => $data,
            "valor_rim" => 0,
        ));

    //Redirigimos a la página del ranking con mensaje de exito
    ?><script>
    alert('Se ha añadido el nuevo videojuego');
    window.location.href=' <?php echo get_home_url()."/obten-tu-ranking"; ?>';
    </script><?php

}

add_action('admin_post_nopriv_nuevovideojuegoform','captura_de_valores_nuevovideojuego');
add_action('admin_post_nuevovideojuegoform','captura_de_valores_nuevovideojuego');

