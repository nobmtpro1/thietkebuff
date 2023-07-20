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
            <div class="category <?= $key == 0 ? "active" : "" ?>" data-categoryid="<?= @$value->term_id ?>">
                <img src="<?= THEME_URL . '/assets/images/but.png' ?>" alt="but">
                <span><?= @$value->name ?></span>
            </div>
        <?php endforeach ?>
    </div>
    <?php foreach ($terms as $key => $term) : ?>
        <?php
        $projects = get_posts(array(
            'post_type' => 'project',
            'numberposts' => 32,
            'orderby' => '-id',
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
        <div class="projects <?= $key == 0 ? "active" : "" ?>" data-categorycontentid="<?= @$term->term_id ?>">
            <?php foreach ($projects as $project) : ?>
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
    <?php endforeach ?>
</div>
<script>
    let categories = document.querySelectorAll("#home_projects .category")
    categories?.forEach(e => {
        e?.addEventListener("click", function(x) {
            categories?.forEach(e => {
                e?.classList?.remove("active")
            })
            e?.classList?.add("active")
            let id = e?.getAttribute("data-categoryid")
            let projects = document.querySelectorAll("#home_projects .projects")
            let categoryContent = document.querySelector(`.projects[data-categorycontentid="${id}"]`)
            console.log(id, projects, categoryContent)
            projects?.forEach(e => {
                e?.classList?.remove("active")
            })
            categoryContent?.classList?.add("active")
        })
    })
</script>