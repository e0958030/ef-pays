<?php
/**
 * Template name: Pays
 *
 */
?>

<?php get_header(); ?>
<main class="main__pays">
<?php
if ( have_posts() ) : the_post(); ?>
<h2><?= get_the_title(); ?></h2>
<?php the_content();?>  
<?php endif;?>
</main><!-- #main -->
<?php
get_footer();