<?php
/**
 * Blocks make most sense being marked up as <section>. <section> usually has a
 * title (but not necessarily), and is a self contained chunk of content. It
 * makes sense to branch the outline at the block level like this, rather than
 * at the region level like some other themes are doing (which makes no sense
 * at all). We could use <h1> for block title also, but I am using <h2> for
 * styling purposes (sounds weird but it should make them easier to target).
 * @see html5_boilerplate_preprocess_block()
 * @see block--menu.tpl.php
 * 
 */
?>
<section id="<?php print $block_html_id; ?>" class="<?php print $classes; ?>"<?php print $attributes; ?>>

  <?php print render($title_prefix); ?>
  <?php if ($block->subject): ?>
  <h2<?php print $title_attributes; ?>><?php print $block->subject; ?></h2>
  <?php endif; ?>
  <?php print render($title_suffix); ?>

  <div<?php print $content_attributes; ?>>
    <?php print $content ?>
  </div>

</section>
