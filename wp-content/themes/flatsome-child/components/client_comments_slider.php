<div id="client_comments_slider">
    <div class="swiper mySwiper">
        <div class="swiper-wrapper">
            <?php $client_comments = get_posts([
                'post_type' => 'client_comment',
                'post_status' => 'publish',
                'numberposts' => -1,
                'order'    => 'DESC'
            ]); ?>
            <?php foreach ($client_comments as $value) : ?>
                <?php $data = get_post_meta($value->ID); ?>
                <div class="swiper-slide">
                    <img class="image" src="<?= wp_get_attachment_image_url(@$data['image'][0], 'full') ?>" alt="">
                    <div class="name"><?= @$data['client_name'][0] ?></div>
                    <div class="position"><?= @$data['position'][0] ?></div>
                    <div class="content"><?= @$data['comment'][0] ?>
                    </div>
                </div>
            <?php endforeach ?>
            <?php foreach ($client_comments as $value) : ?>
                <?php $data = get_post_meta($value->ID); ?>
                <div class="swiper-slide">
                    <img class="image" src="<?= wp_get_attachment_image_url(@$data['image'][0], 'full') ?>" alt="">
                    <div class="name"><?= @$data['client_name'][0] ?></div>
                    <div class="position"><?= @$data['position'][0] ?></div>
                    <div class="content"><?= @$data['comment'][0] ?>
                    </div>
                </div>
            <?php endforeach ?>
        </div>
    </div>
</div>
<script>
    var swiper = new Swiper("#client_comments_slider .mySwiper", {
        slidesPerView: 1,
        spaceBetween: 50,
        centeredSlides: true,
        centeredSlidesBounds: true,
        loop: true,
        loopAdditionalSlides: 30,
        autoplay: {
            delay: 2000,
        },
        speed: 1500,
        breakpoints: {
            1023: {
            slidesPerView: 3,
            spaceBetween: 50
            }
        }
    });
</script>