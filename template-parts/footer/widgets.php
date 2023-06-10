<div class="container is-fluid">

    <?php $footer_layout = "3,3,3,3";
    $columns = array_map('intval', explode(",", $footer_layout));
    $footer_bg = "dark";
    ?>

    <div class="columns">

        <?php foreach ($columns as $i => $column) : ?>

        <?php if (is_active_sidebar('footer-widget-' . $i + 1)) : ?>
        <section id="sidebar" class="widget-area column">
            <?php dynamic_sidebar('footer-widget-' . $i + 1); ?>
        </section>

        <?php endif; ?>

        <?php endforeach; ?>

    </div>

</div>