<!-- Footer -->
<footer class="py-5 bg-dark">
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <p class="m-0 text-left text-white">Copyright &copy; Your Website 2018</p>
            </div>
            <div class="col-md-6">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item active">
                        <?php wp_nav_menu( array(
                            'theme_location'    => 'footermenu',
                            'menu_id'           => 'footer-menu-container',
                            'menu_class'        => 'list-inline text-right',
                        ) ); ?>
                    </li>
                </ul>
            </div>
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container -->
</footer>

<?php wp_footer(); ?>
</body>

</html>