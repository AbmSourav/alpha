
<!-- Blog Post -->
<div class="card mb-4" <?php post_class(); ?>>

    <!-- post thumbnail -->
    <?php if ( has_post_thumbnail() ) { ?>
        
        <a href="<?php the_permalink(); ?>">
            <?php 
                $thumbnail_url = get_the_post_thumbnail_url( null, 'large' );
                //echo '<a href="'.$thumbnail_url.'" data-featherlight="image">';
                printf( '<a href="%s" data-featherlight="image">', $thumbnail_url );
                the_post_thumbnail( 'large', array( 'class'=>'card-img-top' ) ); 
                echo '</a>';
            ?> 
        </a>
    <?php } ?><!-- /post thumbnail -->
    
    <div class="card-body">
        <h2 class="card-title text-center">
            <?php the_title(); ?>
        </h2>
        <p class="card-text text-center">
            <?php the_content(); ?>
            
            <!-- post link -->
            <?php 
                wp_link_pages( array(
                    'before'    => '<p>',
                ) );
            ?>
        </p>

        <!-- comment template -->
        <?php if( comments_open() ): ?>
            <p class="card-text">
                <?php comments_template(); ?>
            </p>
        <?php endif; ?><!-- /comment template -->

    </div>

    <div class="card-footer text-muted">
        Posted on <?php the_time( 'jS F, Y' ); ?>
        by <a href="#"><?php the_author(); ?></a>

        <?php if ( has_tag() ) { ?>
            Tags: <a href="#"><?php echo get_the_tag_list( ' ', ', ', ' ', '' ); ?></a>
        <?php } ?>
    
    </div>
</div><!-- /Blog Post -->