<?php 

get_header();
?>

<main id="primary" class="site-main mainView">

<?php if ( have_posts() ) : ?>
    <header class="page-header sectionHeading centeredHeading modifiedHeading">
        <h1 class="page-title bigHeading">بانک مراجع حقوقی</h1>
    </header><!-- .page-header -->
    <div class="sourceCats">
        <?php
        $sourceCats = get_terms( array(
            'taxonomy' => 'source-cat',
            'hide_empty' => false
        ) );
        
        if ( !empty($sourceCats) ) :
            foreach ( $sourceCats as $cat ) {
                echo '<a class="generalLinkButton inlinedLink secondaryLinkButton" href="'.esc_url( get_term_link( $cat ) ).'">' . $cat->name . '</a>';
            }
        endif;
        ?>
    </div>
    <div class="sourceArchiveParent">
    <?php
    /* Start the Loop */
    while ( have_posts() ) :
        the_post();

        /*
         * Include the Post-Type-specific template for the content.
         * If you want to override this in a child theme, then include a file
         * called content-___.php (where ___ is the Post Type name) and that will be used instead.
         */
        get_template_part( 'template-parts/content', 'sources' );

    endwhile;

    // the_posts_navigation();

else :

    get_template_part( 'template-parts/content', 'none' );

endif;
?>
    
</div>
    <div class="archiveSourcePagination">
		<?php pagination_bar(); ?>
    </div>
</main><!-- #main -->

<?php
get_footer();