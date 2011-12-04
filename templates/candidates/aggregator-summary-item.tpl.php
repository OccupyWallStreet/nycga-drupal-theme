<?php
// $Id: aggregator-summary-item.tpl.php,v 1.2 2008/05/15 21:27:32 dries Exp $

/**
 * @file
 * Default theme implementation to present a linked feed item for summaries.
 *
 * Available variables:
 * - $feed_url: Link to originating feed.
 * - $feed_title: Title of feed.
 * - $feed_age: Age of remote feed.
 * - $source_url: Link to remote source.
 * - $source_title: Locally set title for the source.
 *
 * @see template_preprocess()
 * @see template_preprocess_aggregator_summary_item()
 */
?>
<h3 class="feed-url"><a href="<?php print $feed_url; ?>"><?php print $feed_title; ?></a></h3>

<footer class="source">
  <time class="age" datetime="<?php print $item->timestamp; ?>"><?php print $feed_age; ?></time>
  <?php if ($source_url) : ?>
    <p class="feed-name">
      <?php print t('Feed'); ?>: <a href="<?php print $source_url; ?>"><?php print $source_title; ?></a>
    </p>
  <?php endif; ?>
</footer>
