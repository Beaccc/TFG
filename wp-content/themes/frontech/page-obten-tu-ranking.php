<?php
get_header();
get_template_part('breadcrumbs'); ?>
 <section class="content_section">
    <div class="content">
    <div class="internal_post_con clearfix"><?php
    $kyma_theme_options = kyma_theme_options();
	$frontech_img_class = array('class' => 'img-responsive');
    $frontech_post_layout = $kyma_theme_options['post_layout'];
    $frontech_imageSize = $frontech_post_layout == "postfull" ? 'kyma_single_post_full' : 'kyma_single_post_image';
    if ($frontech_post_layout == "postleft") {
        get_sidebar();
        $frontech_float = "f_right";
    } elseif ($frontech_post_layout == "postfull") {
        $frontech_float = "";
    } elseif ($frontech_post_layout == "postright") {
        $frontech_float = "f_left";
        $frontech_imageSize = 'kyma_single_post_image';
    } else {
        $frontech_float = "f_left";
    }
    ?>
    <!-- All Content --><?php
    if ($frontech_post_layout == "postleft" || $frontech_post_layout == "postright"){
    ?>
    <div class="content_block col-md-9 <?php echo esc_attr($frontech_float); ?> "><?php
    } ?>
    <div class="hm_blog_full_list hm_blog_list clearfix">

			<div class="post_title_con">
                <h6 class="title"><?php the_title(); ?></h6>
                    <div class="blog_grid_con">
                    <p>Actualmente existen una gran variedad de clasificadores de videojuegos pero… no hemos encontrado ninguno que tengan en cuenta los detalles que nosotros te ofrecemos. Si te preocupas por la publicidad que pueda aparecer en el juego, el tiempo de la misma, la posibilidad de saltarla, las compras que ofrece, la cantidad de violencia que aparece o la aparición de juegos de azar y apuestas… este es tu clasificador.</p>
                    </div>
            </div>
        <hr class="wp-block-separator is-style-wide" id="hrranking">

        <p class="titulo2"> INTRODUCE TUS VIDEOJUEGOS Y TUS CRITERIOS PARA OBTENER UN RANKING PERSONALIZADO</p>

        <div class="col-lg-12" style="margin-top:0px; padding-top:0px;">

            <div class="col-xs-6 col-sm-6 col-md-6">
                <form action="<?php echo esc_url(admin_url('admin-post.php')); ?>" method="post">
                    <input type="hidden" name="action" value="criteriosform">
                    <input type="submit" value="Añadir nuevo videojuego" name="nuevovideojuego">
                </form>
            </div>
            <div class="col-xs-6 col-sm-6 col-md-6">
                <form action="<?php echo esc_url(admin_url('admin-post.php')); ?>" method="post">
                    <input type="hidden" name="action" value="criteriosform">
                    <input type="submit" value="Añadir nuevo criterio" name="nuevocriterio">
                </form>
            </div>


            <hr class="wp-block-separator is-style-wide" id="hrranking">
        <div class="col-xs-6 col-sm-6 col-md-6" id="listado" style="background-color: #FFD3D3;">
        <h5>LISTADO DE CRITERIOS: </h5>

        <form action="<?php echo esc_url(admin_url('admin-post.php')); ?>" method="post">

            <?php if(isset($_GET['errormsg'])) : ?>
            <div style="background-color: lightcoral; color:red; padding: 1em; margin-bottom: 1em; ">
                <p style="margin:0;"><?php echo $_GET['errormsg'];?></p>
            </div>
            <?php endif;

            global $wpdb;
            $result = $wpdb->get_results("SELECT * FROM wp_criterios");

            ?><ul><?php
            foreach ($result as $res) {
                $rango_trabajo_ini= $res->rango_trabajo_ini;
                $rango_trabajo_fin = $res->rango_trabajo_fin;
                $rango_ideal = $res->rango_ideal;
                $peso = $res->peso;

                ?>
                <li><b><?php echo $res->nombre?></b>:<br> Rango de trabajo=[<?php echo $rango_trabajo_ini?>,<?php echo $rango_trabajo_fin?>]
                , Rango ideal=[0,<?php echo $rango_ideal?>], Peso=<?php echo $peso?></li>

                <?php } ?>
            </ul>

        </div>
            <div class="col-xs-6 col-sm-6 col-md-6" id="listado" style="background-color:lavenderblush;">
                <h5>LISTADO DE VIDEOJUEGOS: </h5>

                <form action="<?php echo esc_url(admin_url('admin-post.php')); ?>" method="post">

                    <?php if(isset($_GET['errormsg'])) : ?>
                        <div style="background-color: lightcoral; color:red; padding: 1em; margin-bottom: 1em; ">
                            <p style="margin:0;"><?php echo $_GET['errormsg'];?></p>
                        </div>
                    <?php endif;

                    global $wpdb;
                    $result = $wpdb->get_results("SELECT * FROM wp_videojuegos");

                    ?><ul><?php
                        foreach ($result as $res) {?>
                            <li><b><?php echo $res->nombre?></b>:<br> Año de lanzamiento: <?php echo $res->anio?></li>
                        <?php } ?>
                    </ul>

            </div>


            <div class="col-xs-12 col-sm-12 col-md-12"></div>

            <div class="col-xs-3 col-sm-3 col-md-3">
            <input type="submit" id="btn-reset" name="obtenerranking" value="Obtener ranking">
            </div>
            <!--<div class="col-xs-3 col-sm-3 col-md-3">
            <input type="submit" value="Resetear criterios" id="btn-elim" name="resetear">
            </div>-->
            <div class="col-xs-3 col-sm-3 col-md-3">
            <input type="submit" value="Eliminar criterio" id="btn-elim" name="eliminarcriterio">
            </div>
            <div class="col-xs-3 col-sm-3 col-md-3">
                <input type="submit" value="Eliminar videojuego" id="btn-elim" name="eliminarvideojuego">
            </div>


            <input type="hidden" name="action" value="criteriosform">

        </form>
    </div>
    </div>

    </div>
    </section>
    <!-- End All Content -->
    <?php get_footer(); ?>