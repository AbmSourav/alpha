<?php get_header(); ?>

  <body <?php body_class(); ?>>
  <?php get_template_part( "/template-parts/common/hero" ); ?>

    <!-- Page Content -->
    <div class="container">

      <div class="row">

        <!-- Blog Entries Column -->
        <div class="col-md-8">

          <h1 class="my-4">
            <small></small>
          </h1>
          <?php while ( have_posts() ) : the_post(); 

              get_template_part( 'post-formats/post/content', get_post_format() );

          endwhile ?>


          <!-- Pagination -->
          <?php posts_nav_link( ' · ', 'Next page', 'Previous page' ); ?>

          <ul class="pagination justify-content-center mb-4">
            <li class="page-item">
                <?php the_posts_pagination( array(
                  'prev_text'          => 'Newer',
                  'next_text'          => 'Older',
                  'screen_reader_text' => ' ', 
                  ) );
                ?>          
            </li>
          </ul><!-- /Pagination -->

        </div>
        <!-- ./col-md-8 -->

        <!-- Sidebar Widgets Column -->
        <div class="col-md-4">
        <?php if(is_active_sidebar( 'sidebar-1' ) ){
              dynamic_sidebar( 'sidebar-1' );
            } ?>
        </div>

      </div>
      <!-- /.row -->

    </div>
    <!-- /.container -->

<?php get_footer(); ?>
