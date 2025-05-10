<?php get_header(); ?>

<section class="section" id="index">
    <div class="columns">

        <div class="column">
            <img src="<?php echo get_template_directory_uri(); ?>/engine/720p.jpg">
        </div>

        <div class="column is-4">

            <?php if (!is_user_logged_in()) : ?>
            <div class="box">
                <form action="<?php echo esc_url(wp_login_url()); ?>" method="post">
                    <small>user</small>
                    <input type="text" class="input" name="log" id="user_login" required>
                    <div class="clear10x"></div>

                    <small>pass</small>
                    <input type="password" class="input" name="pwd" id="user_pass" required>
                    <input type="hidden" name="redirect_to" value="<?php echo esc_url(home_url()); ?>">
                    <div class="clear20x"></div>

                    <input type="submit" value="LOGIN" class="button is-dark is-small">
                </form>
            </div>
            <?php else : ?>

            <div class="has-text-left">
                <small>Hello, <?php echo esc_html(wp_get_current_user()->display_name); ?></small>
                <a class="tag is-dark" href="<?php echo esc_url(wp_logout_url(home_url())); ?>">LOGOFF</a>
                <div class="clear10x"></div>
            </div>
            <?php endif; ?>

            <h1 class="title is-3">About</h1>
            <p>
                Your special technique for WordPress.
                <br>Drifting is the page builder you need to create landing pages, websites, or blogs.
            </p>
        </div>

    </div>
</section>

<section class="hero is-light">
    <div class="hero-body">
        <div class="index-pages">
            <div class="columns">

                <div class="column">
                    <h1 class="title is-1 supra">Pages</h1>
                    <ul>
                        <?php

                        $pages = get_pages(array(
                            'sort_column' => 'post_title', 
                            'sort_order' => 'ASC' 
                        ));

                        foreach ($pages as $page) {
                            $page_link = get_permalink($page->ID);
                            $page_title = get_the_title($page->ID);
                            echo '<li>&#8594; <a href="' . esc_url($page_link) . '">' . esc_html($page_title) . '</a></li>';
                        }
                        ?>
                    </ul>
                </div>

                <div class="column">
                    <h1 class="title is-1 supra">Posts</h1>
                    <ul>
                        <?php
                        $posts = get_posts(array(
                            'numberposts' => -1, // Pega todos os posts
                            'orderby' => 'title',
                            'order' => 'ASC'
                        ));

                        foreach ($posts as $post) {
                            setup_postdata($post);
                            $post_link = get_permalink($post->ID);
                            $post_title = get_the_title($post->ID);
                            echo '<li>&#8594; <a href="' . esc_url($post_link) . '">' . esc_html($post_title) . '</a></li>';
                        }
                        wp_reset_postdata();
                        ?>
                    </ul>
                </div>

            </div>
        </div>
    </div>
</section>

<?php get_footer(); ?>