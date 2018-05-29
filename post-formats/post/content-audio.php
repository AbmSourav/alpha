<!-- Blog Post -->
<div <?php post_class('card mb-4'); ?>>

    <!-- post content -->
        <!-- post thumbnail -->
    <?php if (has_post_thumbnail()) { ?>
        <a href="<?php the_permalink(); ?>">
            <?php the_post_thumbnail( 'medium-large', array( 'class'=>'card-img-top' ) ); ?>  
        </a>
    <?php } ?><!-- /post thumbnail -->
    
    <div class="card-body">
        <h2 class="card-title">
            <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
        </h2>

        <p class="card-text">
            <?php the_excerpt(); ?>
        </p>

        <a href="<?php the_permalink(); ?>" class="btn btn-info btn-sm">Read More</a>
    </div>
    <!-- /post content -->

    <div class="card-footer text-muted">

        <!-- Dash icons for differen post format -->
        <span class="dashicons dashicons-format-audio"></span>

        Posted on <?php the_time( 'jS F, Y' ); ?>
        by <a href="#"><?php the_author(); ?></a>

        <?php if ( has_tag() ) { ?>
            Tags: <a href="#"><?php echo get_the_tag_list( ' ', ', ', ' ', '' ); ?></a>
        <?php } ?>
    
    </div>

</div><!-- /Blog Post -->