<?php
/**
 * The feed source is the perfect example of <aside> content - its closely
 * related to the main content of the feed but if it wasnt there we could still
 * grok the content. We also use <header> to markup the description and <footer>
 * to contain the feed source meta data.
 */
?>
<aside class="feed-source">

  <?php if ($source_description): ?>
    <header><?php print $source_description; ?></header>
  <?php endif; ?>

  <?php print $source_icon; ?>
  <?php print $source_image; ?>

  <footer>
    <p class="feed-url">
      <strong><?php print t('URL:'); ?></strong> <a href="<?php print $source_url; ?>"><?php print $source_url; ?></a>
    </p>
    <p class="feed-updated">
      <strong><?php print t('Updated:'); ?></strong> <?php print $last_checked; ?>
    </p>
  </footer>

</aside>
