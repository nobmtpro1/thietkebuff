<?php get_header() ?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <div class="article-inner <?php flatsome_blog_article_classes(); ?>">
        <div class="page-title blog-featured-title featured-title no-overflow">
            <div class="page-title-bg fill">
                <div class="title-overlay fill" style="background-color: rgba(0,0,0,.5)"></div>
            </div>

            <div class="page-title-inner container  flex-row  dark is-large" style="min-height: 300px">
                <div class="flex-col flex-center text-center">
                    <h6 class="entry-category is-xsmall"><a href="http://localhost/thietkebuff/category/dich-vu/" rel="category tag"><?= @$term =  @get_the_terms(the_post(), 'project_category')[0]->name ?></a></h6>
                    <h1 class="entry-title"><?= the_title() ?></h1>
                    <div class="entry-divider is-divider small"></div>
                </div>
            </div>
        </div>
        <div class="entry-content single-page">
            <div class="fotorama-container">
                <?php
                $meta_data = get_post_meta($post->ID);
                ?>
                <div class="fotorama" data-maxheight="500" data-arrows="true" data-thumbwidth="" data-thumbheight="" data-loop="true" data-autoplay="4000" data-fit="contain" data-allowfullscreen="true" data-stopautoplayontouch="false" data-width="1200" data-ratio="1200/500" data-nav="thumbs">
                    <?php foreach (@$meta_data["images"] ?? [] as $image) : ?>
                        <img src="<?= wp_get_attachment_image_url(@$image, 'full') ?>" alt="image">
                    <?php endforeach ?>
                </div>
            </div>
            <br>
            <?php the_content(); ?>

            <?php
            wp_link_pages();
            ?>

            <?php if (get_theme_mod('blog_share', 1)) {
                // SHARE ICONS
                echo '<div class="blog-share text-center">';
                echo '<div class="is-divider medium"></div>';
                echo do_shortcode('[share]');
                echo '</div>';
            } ?>
        </div>
    </div>
</article>


<?php get_footer() ?>