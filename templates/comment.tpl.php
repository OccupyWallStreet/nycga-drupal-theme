<?php
/**
 * Comments are articles, so we wrap them in <article>, they are not sub-sections
 * of the main article, they are entities in themselves. They could be sections,
 * but I think that is too weak and misses out on enriching the semantics of our
 * document - its perfectly OK to nest articles within an article.
 */
?>
<article class="<?php print $classes; ?> clearfix"<?php print $attributes; ?>>

  <?php print $unpublished; ?>

  <header>
    <?php print render($title_prefix); ?>
    <?php if ($title): ?>
      <h3<?php print $title_attributes; ?>><?php print $title ?></h3>
    <?php endif; ?>
    <?php print render($title_suffix); ?>
    <?php if ($new): ?>
      <em><?php print $new ?></em>
    <?php endif; ?>
  </header>

  <?php
  /**
   * Similar to nodes we're using the <time> element and datetime and pubdate
   * attributes in the submitted meta data.
   * We're also doing something tricky with the permalink variable - instead of
   * printing this out all ugly fugly like core does, we're using an anchor on
   * $created with the permalink as the href attribute, this is old-school
   * Wordpress style and also from an example in microformats.org. The permalink
   * variable is still availble and print it if you want, you'll also get a nice
   * rel=bookmark with it :)
   * @see html5_boilerplate_preprocess_comment()
   */
  ?>
  <?php if ($picture || $submitted): ?>
    <footer>
      <?php print $picture; ?>
      <?php
        print t('Submitted by !username on !datetime', array(
          '!username' => $author,
          '!datetime' => '<time pubdate="pubdate" datetime="' . $datetime . '">' . $created . '</time>',
          )
        );
      ?>
    </footer>
  <?php endif; ?>

  <div<?php print $content_attributes; ?>>
    <?php
      hide($content['links']);
      print render($content);
      print $signature;
    ?>
  </div>

  <?php
  /**
   * See node.tpl.php for notes on use of the <menu> element for links.
   */
  ?>
  <?php if ($links = render($content['links'])): ?>
    <menu class="comment-links clearfix"><?php print $links; ?></menu>
  <?php endif; ?> 

</article>
