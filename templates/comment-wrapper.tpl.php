<?php
/**
 * We use <section> for the comment wrapper to branch the outline, to make the
 * comment articles distinct from the main article. The "Comments" title will be
 * hidden using the "element-invisible" class on forum nodes, but not removed,
 * we want to keep the heading for accessibility and the implied semantics.
 * @see html5_boilerplate_preprocess_comment_wrapper()
 */
?>
<section id="comments" class="<?php print $classes; ?>"<?php print $attributes; ?>>
  
  <?php print render($title_prefix); ?>
  <h2<?php print $title_attributes; ?>><?php print t('Comments'); ?></h2>
  <?php print render($title_suffix); ?>

  <?php print render($content['comments']); ?>

  <?php if ($content['comment_form']): ?>
    <h2><?php print t('Add new comment'); ?></h2>
    <?php print render($content['comment_form']); ?>
  <?php endif; ?>

</section>
