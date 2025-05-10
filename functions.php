<?php

include 'engine/functions/phosphor-icons.php';
include 'engine/functions/wordpress-ui.php';
include 'engine/functions/design.php';
add_filter('use_block_editor_for_post', '__return_false', 10);

function render() 
{
    // default
    if (!isset($_GET['post_id'])) {
        echo '<h2>Escolha uma página</h2>';
        return;
    }
    $post_id = intval($_GET['post_id']);

    // Motor/blocks
    echo '<div id="motor">
    <p>design text</p>
    <ul>
        <li draggable="true" data-content="<p>Novo Parágrafo</p>">
        <i class="ph ph-paragraph"></i> Parágrafo</li>
        
        <li draggable="true" data-content="<h2>Título xNovo</h2>">
        <i class="ph ph-text-aa"></i> Título</li>
        
        <li draggable="true" data-content="<h2>Título xNovo</h2>">
        <i class="ph ph-text-aa"></i> Digital</li>
    </ul>
    </div>';

    // Design area
    echo '<div id="design" class="drop-area">
    <p>Arraste e solte os elementos aqui.</p></div>';

    // menu
    echo '<div id="menu"><ul>
    <li><button id="button-upload"><i class="ph ph-cloud-arrow-up"></i></button></li>
    </ul></div>';

    // enqueue
    wp_enqueue_style('ui', get_template_directory_uri() . '/engine/css/ui.css', array(), rand(), 'all');
    wp_enqueue_style('bulma', get_template_directory_uri() . '/engine/css/bulma-1.0.2.css', array(), rand(), 'all');
    wp_enqueue_style('style', get_template_directory_uri() . '/style.css', array(), rand(), 'all');
    wp_enqueue_script('motor', get_template_directory_uri() . '/engine/motor.js', array('jquery'), rand(), 'null, true');
}

?>