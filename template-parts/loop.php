<?php if (have_posts()) : ?>
<?php while (have_posts()) : the_post(); ?>

<article <?php post_class("card mb-4"); ?>>
    <div class="card-content">
        <h2 class="is-size-4 is-size-2-desktop card-header-title">
            <a href="<?php the_permalink() ?>" title="<?php the_title_attribute() ?>">
                <?php the_title(); ?>
            </a>
        </h2>
        <div>
            <?php ascendia_post_meta() ?>
        </div>
        <div class="entry-content">
            <?php the_excerpt(); ?>
        </div>

        <?php ascendia_read_more_link() ?>
    </div>
</article>

<?php endwhile; ?>

<?php the_posts_pagination() ?>

<?php else : ?>
<p>No posts found.</p>
<?php endif; ?>