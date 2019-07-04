<?php 
$meta_boxes[] = array(
    'title'          => 'Welcome',
    'id'             => 'welcome',
    'settings_pages' => 'global_features',

    'fields' => array(
        array(
            'type' => 'custom_html',
            'std'  => '<p>From this area you are able to edit all of the global features of this website.</p>',
                        
        ),
        array(
            'type' => 'custom_html',
            'std'  => '<h3>Title</h3>
                        <p>Some Text</p>
                        <ul style="list-style: decimal-leading-zero;">
                            <li style="margin-left: 2em"><a href="'. admin_url( 'admin.php?page=global_titles' ) .'">Page link</a></li>
                        </ul>',
        ),
    ),
);