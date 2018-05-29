<?php get_header(); ?>

<body <?php body_class(); ?>>
<?php get_template_part( "/template-parts/common/hero" ); ?>
    <!-- Page Content -->
    <div class="container">
      <div class="row">
        <!-- Blog Entries Column -->
        <div class="col-md-12">
          <h1 class="my-4">
            <small></small>
          </h1>
          <?php while ( have_posts() ) : the_post();

            get_template_part( 'template-parts/page/content', 'page' );

          endwhile ?>
        </div>
        <!-- /col-md-8 -->

      </div>
      <!-- /.row --> 

    </div>
    <!-- /.container -->

<?php get_footer(); ?>
