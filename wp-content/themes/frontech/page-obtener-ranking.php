<?php
get_header();
get_template_part('breadcrumbs'); ?>
<section class="content_section">
    <div class="content">
            <?php
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

                <div class="hm_blog_full_list hm_blog_list clearfix">
                    <div class="post_title_con" id="introduce_criterios_title">
                        <h6 class="title"><?php the_title(); ?></h6>
                    </div>


                    <hr class="wp-block-separator is-style-wide">

                    <form action="<?php echo esc_url(admin_url('admin-post.php')); ?>" method="post" class="form-obtener-ranking">

                        <?php if(isset($_GET['errormsg'])) : ?>
                            <div style="background-color: lightcoral; color:red; padding: 1em; margin-bottom: 1em; ">
                                <p style="margin:0;"><?php echo $_GET['errormsg'];?></p>
                            </div>
                        <?php endif;?>

                        <!-- Matriz de valoraciones como entrada de datos -->

                        <?php  global $wpdb;
                        $result1 = $wpdb->get_results("SELECT * FROM wp_criterios");
                        $result = $wpdb->get_results("SELECT * FROM wp_videojuegos");
                        $xi = 1; //para los videojuegos
                        $xj = 1; //para los criterios
                        ?>
                         <div class="col-xl-12" style="margin-top:0px; padding-top:0px;"><?php

                        //Recorremos los videojuegos
                        foreach ($result as $res) {?>
                             <div class="col-xs-2 col-sm-2 col-md-2">
                            <label for="nombre-videojuego"><?php echo "$res->nombre"; ?></label><?php
                            foreach ($result1 as $res1) {
                                ?>
                                <p><?php echo "$res1->nombre"; echo" ["; echo "$res1->rango_trabajo_ini";
                                echo " , "; echo "$res1->rango_trabajo_fin"; echo"]"; ?></p>
                                <p><input type="number" id="pos" name="<?php echo"X";echo"$xi";echo"$xj";?>" required></p><?php
                                $xj++;
                            }?>
                             <hr class="wp-block-separator is-style-wide" id="hrranking">
                             </div>
                            <?php
                            $xi++;
                            $xj=1;
                        } ?>

                        <input type="submit" value="Obtener">
                        <input type="hidden" name="action" value="obtenerrankingform">
                         </div>
                    </form>
                </div>

                </div>

        </div>
    </div>
</section>


    <!-- End All Content -->
<?php get_footer(); ?>