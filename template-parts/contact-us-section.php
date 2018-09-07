<section class="contact-us-block">
    <div class="container">
        <section class="contact-us-banner">
            <div class="contact-banner-inner">
                <?php
                if ( have_rows('contact_us','option') ) :
                    while ( have_rows('contact_us','option') ) : the_row(); ?>
                        <div class="contact-banner-header">
                            <div class="contact-title-wrapper">
                                <h5><?php the_sub_field('upper_heading');?></h5>
                                <p class="contact-banner-title"><?php the_sub_field('heading'); ?></p>
                            </div>
                        </div>
                        <div class="contact-banner-sections">
                            <?php
                            if ( have_rows('fields') ) :
                                while ( have_rows('fields') ) : the_row();
                                    $icon = get_sub_field('icon');
                                    $type = get_sub_field('description'); ?>
                                    <div class="contact-item">
                                        <div class="icon">
                                            <img src="<?php echo $icon['url']; ?>" alt="<?php echo $icon['alt']; ?>">
                                        </div>
                                        <h4><?php the_sub_field('heading'); ?></h4>
                                        <?php
                                        if ($type == 'text') {
                                            $description = get_sub_field('text'); ?>
                                            <p><?php echo $description; ?></p>
                                            <?php
                                        } elseif($type == 'e-mail'){
                                            $description = get_sub_field('e_mail'); ?>
                                            <p><a href="mailto:<?php echo $description; ?>"><?php echo $description; ?></a></p>
                                            <?php
                                        } elseif($type == 'telephone'){
                                            $description = get_sub_field('telephone'); ?>
                                            <p><a href="tel:<?php echo $description; ?>">T: <?php echo $description; ?></a></p>
                                            <?php
                                        } ?>
                                    </div>
                                    <?php
                                endwhile;
                            endif; ?>
                        </div>
                        <?php
                    endwhile;
                endif; ?>
            </div>
        </section>
    </div>
</section>
