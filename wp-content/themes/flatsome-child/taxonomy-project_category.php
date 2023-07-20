<?php get_header() ?>
<?php
// $term = get_term(get_queried_object()->term_id);
// dd($term);
?>
<div id="page-projects content-area page-wrapper">
    <div class="row row-main">
        <div class="large-12 col">
            <div class="col-inner">
                <div id="text-4226790221" class="text mt-50 mb-50">
                    <h2>Dự án đã thực hiện</h2>
                    <style>
                        #text-4226790221 {
                            font-size: 1.5rem;
                            text-align: center;
                            color: #15477e;
                        }

                        #text-4226790221>* {
                            color: #15477e;
                        }
                    </style>
                </div>
                <div id="home_projects">
                    <div class="categories">
                        <?php
                        $terms = get_terms([
                            'taxonomy' => 'project_category',
                            'hide_empty' => false,
                            'orderby' => 'id'
                        ]);
                        ?>
                        <?php foreach ($terms as $key => $value) : ?>
                            <a href="<?= get_term_link($value) ?>" class="category <?= get_queried_object()->term_id == $value->term_id ? "active" : "" ?>" data-categoryid="<?= @$value->term_id ?>">
                                <img src="<?= THEME_URL . '/assets/images/but.png' ?>" alt="but">
                                <span><?= @$value->name ?></span>
                            </a>
                        <?php endforeach ?>
                    </div>
                    <?php
                    $term = get_term(get_queried_object()->term_id);
                    $paged = intval(@$_GET['pag']) ?? 1;
                    if (!$term->term_id) {
                        $projects = new WP_Query([
                            'post_type' => 'project',
                            'orderby' => '-id',
                            'posts_per_page' => 32,
                            'paged' => $paged,
                        ]);
                    } else {
                        $projects = new WP_Query([
                            'post_type' => 'project',
                            'orderby' => '-id',
                            'posts_per_page' => 32,
                            'paged' => $paged,
                            'tax_query' => array(
                                array(
                                    'taxonomy' => 'project_category',
                                    'field' => 'term_id',
                                    'terms' => $term->term_id, /// Where term_id of Term 1 is "1".
                                    'include_children' => false
                                )
                            )
                        ]);
                    }
                    ?>
                    <div class="projects active">
                        <?php foreach ($projects->posts as $project) : ?>
                            <?php $data = get_post_meta($project->ID); ?>
                            <a href="<?= get_permalink($project) ?>" class="project">
                                <div class="image">
                                    <img src="<?= wp_get_attachment_image_url(@$data['images'][0], 'full') ?>" alt="project">
                                </div>
                                <div class="title">
                                    <?= @$project->post_title ?>
                                </div>
                                <div class="description">
                                    <?= @$data['description'][0] ?>
                                </div>
                            </a>
                        <?php endforeach ?>
                    </div>

                    <ul class="page-numbers nav-pagination links text-center">
                        <?php
                        $links = paginate_links([
                            'total' => $projects->max_num_pages,
                            'current' => max(1, intval(@$_GET['pag']) ?? 1),
                            'prev_text' => __('Prev'),
                            'next_text' => __('Next'),
                            'type' => 'array',
                            'format' => '?pag=%#%',
                        ]);
                        foreach ($links ?? [] as $link) :
                        ?>
                            <li>
                                <?= $link ?>
                            </li>
                        <?php endforeach ?>
                    </ul>
                    <br>
                </div>
            </div>
        </div>
    </div>
</div>
<?php get_footer() ?>