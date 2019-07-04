<?php get_header(); 

/*
 * Error 404
 *************************************************************/

?>

    <section class="four-zero-four"> 
      <div class="wrapper">
        <div class="left-content">
            <h1>Oops!</h1>
            <p class="larger-text">We can't seem to find the page you're looking for</p>
            <p><span class="error-message">Error code: 404</span></p>
            <p>Perhaps searching would help:</p>
            <p><?php echo do_shortcode('[wpdreams_ajaxsearchlite]'); ?></p> 
        </div>
        <div class="right-content">
          <img src="<?php echo get_template_directory_uri(); ?>/assets/img/404.jpg">
        </div><!-- /.right-content -->
      </div><!-- /.wrapper -->
    </section>

<?php get_footer(); ?>