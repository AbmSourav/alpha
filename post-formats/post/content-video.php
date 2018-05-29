<!-- Blog Post -->
<div <?php post_class('card mb-4'); ?>>

    <!-- post content -->
        <!-- post thumbnail -->
        <?php if ( '' !== get_the_post_thumbnail() && ! is_single() && empty( $video ) ) { ?>
            <a href="<?php the_permalink(); ?>">
                <?php the_post_thumbnail( 'medium-large', array( 'class'=>'card-img-top' ) ); ?>  
            </a>
        <?php } ?><!-- /post thumbnail -->
    
    <div class="card-body">

        <?php
            $content = apply_filters( 'the_content', get_the_content() );
            $video = false;

            // Only get video from the content if a playlist isn't present.
            if ( false === strpos( $content, 'wp-playlist-script' ) ) {
                $video = get_media_embedded_in_content( $content, array( 'video', 'object', 'embed', 'iframe' ) );
            }
        ?>

		<?php
            if ( ! is_single() ) {

                // If not a single post, highlight the video file.
                if ( ! empty( $video ) ) {
                    foreach ( $video as $video_html ) {
                        echo '<div class="entry-video">';
                            echo $video_html;
                        echo '</div>';
                    }
                }

            }

            if ( is_single() || empty( $video ) ) {

                /* translators: %s: Name of current post */
                the_content( sprintf(
                    __( 'Continue reading<span class="screen-reader-text"> "%s"</span>', 'twentyseventeen' ),
                    get_the_title()
                ) );
            }
        ?>

        <h2 class="card-title">
            <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
        </h2>

    </div>
    <!-- /post content -->

    <div class="card-footer text-muted">

        <!-- Dash icons for differen post format -->
        <span class="dashicons dashicons-video-alt3"></span>

        Posted on <?php the_time( 'jS F, Y' ); ?>
        by <a href="#"><?php the_author(); ?></a>

        <?php if ( has_tag() ) { ?>
            Tags: <a href="#"><?php echo get_the_tag_list( ' ', ', ', ' ', '' ); ?></a>
        <?php } ?>
    
    </div>

</div><!-- /Blog Post -->