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

                    <form action="<?php echo esc_url(admin_url('admin-post.php')); ?>" method="post" class="form-nuevo-criterio"
                          enctype="multipart/form-data">

                        <?php if(isset($_GET['errormsg'])) : ?>
                            <div style="background-color: lightcoral; color:red; padding: 1em; margin-bottom: 1em; ">
                                <p style="margin:0;"><?php echo $_GET['errormsg'];?></p>
                            </div>
                        <?php endif;?>

                        <label for="nombrevideojuego">Nombre: </label>
                        <input type="text" id="nombrevideojuego" name="nombrevideojuego" placeholder="Minecraft" required>

                        <label for="anio">Año de lanzamiento: </label>
                        <input type="number" id="anio" name="anio" placeholder="2020" required>

                        <!--<p><input type="file"  accept="image/*" name="image" id="file"  onchange="loadFile(event)" style="display: none;" required></p>
                        <p><label for="file" style="cursor: pointer;">Cargar imagen</label></p>
                        <p><img id="output" width="200" /></p>

                        <script>
                            var loadFile = function(event) {
                                var image = document.getElementById('output');
                                image.src = URL.createObjectURL(event.target.files[0]);
                            };
                        </script>-->
                        <label for="fileToUpload">Imagen: </label>
                        <input type="file" name="fileToUpload" id="fileToUpload">


                        <input type="submit" value="Añadir">
                        <input type="hidden" name="action" value="nuevovideojuegoform">

                    </form>
                </div>

                </div>
            </div>
        </div>
    </div>
</section>


    <!-- End All Content -->
<?php get_footer(); ?>