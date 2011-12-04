<?php
/**
 * We use <section> to markup profile category output, which makes sense as each
 * section has a title and forms a part of the greater document, yet is
 * self-contained. Note the use of drupal_html_class($title) to provide us with
 * a styling hook for each profile category section.
 */
?>
<section class="<?php print drupal_html_class($title); ?>">

  <?php if ($title) : ?>
    <h3><?php print $title; ?></h3>
  <?php endif; ?>

  <dl<?php print $attributes; ?>>
    <?php print $profile_items; ?>
  </dl>

</section>
