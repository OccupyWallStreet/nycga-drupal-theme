<?php
/**
 * After a lot of thought I made book nav a <footer>. While it looks like <nav>
 * and could just be a <div>, I think this type of navigation could be a good
 * use case for <footer> - its additional info/navigation for the article. Its
 * debatable and probably the most contentios markup in this whole theme.
 */
?>
<?php if ($tree || $has_links): ?>
  <footer id="book-navigation-<?php print $book_id; ?>" class="book-navigation">

    <?php print $tree; ?>

    <?php if ($has_links): ?>
    <div class="page-links clearfix">

      <?php if ($prev_url) : ?>
        <a href="<?php print $prev_url; ?>" class="page-previous" title="<?php print t('Go to previous page'); ?>"><?php print t('‹ ') . $prev_title; ?></a>
      <?php endif; ?>

      <?php if ($parent_url) : ?>
        <a href="<?php print $parent_url; ?>" class="page-up" title="<?php print t('Go to parent page'); ?>"><?php print t('up'); ?></a>
      <?php endif; ?>

      <?php if ($next_url) : ?>
        <a href="<?php print $next_url; ?>" class="page-next" title="<?php print t('Go to next page'); ?>"><?php print $next_title . t(' ›'); ?></a>
      <?php endif; ?>

    </div>
    <?php endif; ?>

  </footer>
<?php endif; ?>
