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
                                <?php  global $wpdb;
                                $result = $wpdb->get_results("SELECT * FROM wp_videojuegos ORDER BY valor_rim desc");

                             ?><div class="icon_boxes_con style1 clearfix"><?php $i=1;
                                foreach ($result as $res) {?>
                                    <div class="service col-md-6">
                                        <div class="service_box">
                                            <h5><?php echo $i; echo "º";?></h5>

                                        <?php echo '<img height="200" width="300" src="data:image/jpeg;base64,'.base64_encode($res->imagen).'"/>';?>
                                        <h5 id="service-title-1"><?php  echo "$res->nombre";echo "  ("; echo "$res->anio"; echo")"?></h5>
                                            <h6 id="rim"><?php  echo "$res->valor_rim";?></h6>
                                            <?php

                                        $i ++;?>
                                       </div>
                                    </div>
                                <?php } ?>
                                </div>




                                        </div>


                                    </div>
                        <form action="<?php echo esc_url(admin_url('obten-tu-ranking')); ?>">
                            <input type="submit"  id="nuevoranking" value="Nuevo ranking" />
                        </form>
                                </div>
                            </div>
                        </div>
                    </div>


            </div></div></section>
    <!-- End All Content -->
<?php get_footer(); ?>