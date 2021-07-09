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

                    <form action="<?php echo esc_url(admin_url('admin-post.php')); ?>" method="post" class="form-nuevo-criterio">

                        <?php if(isset($_GET['errormsg'])) : ?>
                            <div style="background-color: lightcoral; color:red; padding: 1em; margin-bottom: 1em; ">
                                <p style="margin:0;"><?php echo $_GET['errormsg'];?></p>
                            </div>
                        <?php endif;?>

                        <label for="nombrecriterio">Nombre: </label>
                        <input type="text" id="nombrecriterio" name="nombrecriterio" placeholder="Publicidad" required>

                        <label for="rango-ini">Rango de trabajo inicio: </label>
                        <input type="number" id="rango-ini" name="rango-ini" placeholder="0" required>

                        <label for="rango-fin">Rango de trabajo final: </label>
                        <input type="number" id="rango-fin" name="rango-fin" placeholder="10" required>

                        <label for="rango-ideal">Rango ideal (un sólo número): </label>
                        <input type="number" id="rango-ideal" name="rango-ideal" placeholder ="5" step="any" required>

                        <div class="slidecontainer">
                            <label for="myRange">Peso (0-1):</label>
                            <p>Recuerda que la suma de los pesos de todos los criterios debe de ser 1</p>
                            <input type="range" min="0" max="1" step="0.1" value="0.5" class="slider" id="myRange" name="peso">
                            <p>Valor: <span id="demo"></span></p>
                        </div>

                        <script>

                            var slider = document.getElementById("myRange");
                            var output = document.getElementById("demo");
                            output.innerHTML = slider.value;

                            slider.oninput = function() {
                                    output.innerHTML = this.value;
                            }
                        </script>

                        <input type="submit" value="Añadir">
                        <input type="hidden" name="action" value="nuevocriterioform">

                    </form>
                </div>

                </div>
            </div>
        </div>
    </div>
</section>


    <!-- End All Content -->
<?php get_footer(); ?>