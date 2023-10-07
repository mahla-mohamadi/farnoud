<?php

get_header();

?>

<main id="primary" class="site-main mainView">


<div itemprop="mainEntity" itemscope itemtype="https://schema.org/Question" class="contentQuestion">
<?php

while ( have_posts() ) :

    the_post();



    get_template_part( 'template-parts/content', 'question' );



    // the_post_navigation(

    //     array(

    //         'prev_text' => '<span class="nav-subtitle">' . esc_html__( 'Previous:', 'torbatepaak' ) . '</span> <span class="nav-title">%title</span>',

    //         'next_text' => '<span class="nav-subtitle">' . esc_html__( 'Next:', 'torbatepaak' ) . '</span> <span class="nav-title">%title</span>',

    //     )

    // );



    // If comments are open or we have at least one comment, load up the comment template.

    if ( comments_open() || get_comments_number() ) :

        comments_template('/comments-question.php');

    endif;



endwhile; // End of the loop.

?>
</div>
</main><!-- #main -->



<?php

//get_sidebar();

get_footer();

