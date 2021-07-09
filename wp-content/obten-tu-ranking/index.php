<?php


echo "HOLAÁaaaaaaaabbdbnjewknfj3owjdiokpoqkwe";

$args = 'select * from wp_videojuegos';
echo $args;
$query = new WP_Query($args);
if ($query->have_posts()) {
    echo "Si hay filas";
}

while ($query->have_posts()) {
$query->the_post();
?>

<div class="related_posts">
    <div class="small_title">
							<span class="small_title_con">
								<span class="s_icon"><i class="fa fa-laptop"></i></span>
								<span
                                        class="s_text"><?php echo esc_attr($query['nombre']); ?></span>
							</span>
    </div>

<?php }
