<div id="home_projects">
    <div class="categories">
        <?php
        $terms = get_terms([
            'taxonomy' => 'project_category',
            'hide_empty' => false,
            'orderby' => 'id'
        ]);
        ?>
        <?php foreach ($terms as $value) : ?>
            <div class="category">
                <img src="<?= THEME_URL . '/assets/images/but.png' ?>" alt="but">
                <span><?= @$value->name ?></span>
            </div>
        <?php endforeach ?>
    </div>
    <?php foreach ($terms as $term) : ?>
        <?php
        $projects = get_posts(array(
            'post_type' => 'project',
            'numberposts' => -1,
            'tax_query' => array(
                array(
                    'taxonomy' => 'project_category',
                    'field' => 'term_id',
                    'terms' => $term->term_id, /// Where term_id of Term 1 is "1".
                    'include_children' => false
                )
            )
        ));
        ?>
        <div class="projects">
            <?php foreach ($projects as $project) : ?>
                <?php $data = get_post_meta($project->ID); ?>
                <a href="" class="project">
                    <div class="image">
                        <img src="<?= wp_get_attachment_image_url(@$data['images'][0], 'full') ?>" alt="project">
                    </div>
                    <div class="title">
                        <?= @$project->post_title ?>
                    </div>
                    <div class="description">
                        Beauty
                    </div>
                </a>
            <?php endforeach ?>
        </div>
    <?php endforeach ?>

</div>