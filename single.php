<?php get_header(); ?>
<?php get_template_part( "/template-parts/common/hero" ); ?>

    <!-- Single Page Content -->
    <div class="container">

      <div class="row">

        <!-- Blog Entries Column -->
        <div class="col-md-8">
          <h1 class="my-4">
            <small></small>
          </h1>
          <?php while ( have_posts() ) : the_post();

            get_template_part( 'template-parts/page/content', 'single' );

          endwhile ?>

          <!-- Pagination -->        
          <!-- <ul class="pagination justify-content-center mb-4">
            <li class="page-item">
                       
            </li>
          </ul> -->
          <!-- /Pagination -->
        </div>
        <!-- /col-md-8 -->

        <!-- right-sidebar -->
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
