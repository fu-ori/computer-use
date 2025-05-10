<?php

function add_drifting_menu() {
    add_menu_page(
        'Designデザイン',
        'Computer-use',  
        'edit_pages',
        'drifting',
        'render',
        'dashicons-admin-generic',
        20
    );
}
add_action('admin_menu', 'add_drifting_menu');

function add_drifting_cta($post)
{
    $drifting_url = admin_url('admin.php?page=drifting&post_id=' . $post->ID);
    echo '<div style="text-align: center; padding: 20px;">';
    echo '<a href="' . esc_url($drifting_url) . '" class="button button-large" style="font-size: 28px; padding: 12px 24px;">D E S I G N</a>';
    echo '</div>';
}
function drifting_custom_editor(){add_action('edit_form_after_title', 'add_drifting_cta'); }
add_action('admin_init', 'drifting_custom_editor');

?>