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
                        </div>

                        <hr class="wp-block-separator is-style-wide">

                        <form action="<?php echo esc_url(admin_url('admin-post.php')); ?>" method="post"
                              id="form-elimina-criterio" class="form-elimina-criterio">

                            <label for="nombrecriterio">Selecciona el criterio que deseas eliminar: </label>
                            <select id="criterios" name="criterio-seleccionado" form="form-elimina-criterio">
                                <?php

                                    global $wpdb;
                                    $result = $wpdb->get_results("SELECT * FROM wp_criterios");

                                    foreach ($result as $res) {
                                        ?>  <option name="<?php echo "$res->nombre"; ?>" value="<?php echo "$res->nombre"; ?>"><?php echo "$res->nombre"; ?></option><?php
                                    } ?>
                            </select>

                            <input type="submit" value="Eliminar">
                            <input type="hidden" name="action" value="eliminacriterioform">

                        </form>
                    </div>

                </div>
            </div>
        </div>
        </div>
    </section>


    <!-- End All Content -->
<?php get_footer(); ?>