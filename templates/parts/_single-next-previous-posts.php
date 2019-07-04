<?php
    echo '<nav class="single-post-nav clearfix">';

    $prevPost = get_previous_post(true);
        if($prevPost) :
            $args = array(
                'posts_per_page' => 1,
                'include' => $prevPost->ID
            );
            $prevPost = get_posts($args);
            foreach ($prevPost as $post) :
                setup_postdata($post);
    
    
        $prev = '<div class="post-previous">'
             .      '<a class="previous button green" href="' . get_the_permalink() . '">'
             .          '<i class="fa fa-arrow-left"></i> Previous Article'
             .      '</a>'
             . '</div> <!-- /.post-previous-->';
        
        echo $prev;

                wp_reset_postdata();
            endforeach; //end foreach
        endif; // end if
    
        echo '<a href="" class="button green">Back to news</a>';
    
    $nextPost = get_next_post(true);
        if($nextPost) {
            $args = array(
                'posts_per_page' => 1,
                'include' => $nextPost->ID
            );
            $nextPost = get_posts($args);
            foreach ($nextPost as $post) {
                setup_postdata($post);
    
        $next = '<div class="post-next">'
             .      '<a class="previous button green" href="' . get_the_permalink() . '">'
             .          '<i class="fa fa-arrow-right"></i> Next Article'
             .      '</a>'
             . '</div> <!-- /.post-next-->';
        
        echo $next;
    
                wp_reset_postdata();
            } //end foreach
        } // end if
    echo '</nav> <!-- /.single-post-nav -->';