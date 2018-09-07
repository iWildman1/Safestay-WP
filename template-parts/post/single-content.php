<?php
$img_id = get_post_thumbnail_id();
$alt = get_post_meta( $img_id, '_wp_attachment_image_alt', true  );
$cities = get_the_category();
$hashtags = wp_get_post_terms( $post->ID, 'hashtags');
$locations = wp_get_post_terms( $post->ID, 'locations');

$content = get_the_content();
$excerpt = wp_trim_words($content,10);
if ( $wp_query->current_post == 0 && !is_paged() ) {
    $class = "explorer-featured";
} else {
    $class = "explorer-grid-item";
    $description = "<p><?php echo $excerpt; ?></p>";
} ?>

<div class="post <?php echo $class; ?>" data-city="<?php
    foreach ( $locations as $location ) :
        if ( $id == $location->parent ) :
            echo $location->slug;
        endif;
        $id = $location->term_id;
    endforeach;
    ?>" data-hashtag="<?php foreach( $hashtags as $hastag ) { echo $hastag->slug; }?>">
    <a href="<?php the_permalink(); ?>">
        <img src="<?php the_post_thumbnail_url('large'); ?>" alt="<?php echo $alt; ?>">
        <div class="item-inner">
            <div class="location loc-<?php
                foreach( $locations as $location ) {
                    if ( $location->parent == 0 ) {
                        echo $location->slug;
                    }
                }
                ?>">
                <span><?php
                foreach( $locations as $location ) {
                    if ( $location->parent != 0 ) {
                        echo $location->name;
                    }
                }
                ?></span>
            </div>
            <div class="title">
                <span class="tag-inspiration">#<?php foreach( $hashtags as $hastag ) { echo $hastag->name; }?></span>
                <p><?php the_title(); ?></p>
                <?php
                echo $description; ?>
            </div>
        </div>
    </a>
</div>
