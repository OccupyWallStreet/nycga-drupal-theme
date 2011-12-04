<?php
/**
 * Summary items are markup up as <section>.
 * TODO: explain why a bit better.
 */
?>
<section id="feed-<?php print drupal_html_class($title); ?>" class="feed">
  <h2 class="summary-title"><?php print $title; ?></h2>
  <?php print $summary_list; ?>
  <p class="read-more"><a href="<?php print $source_url; ?>"><?php print t('More'); ?></a></p>
</section>
