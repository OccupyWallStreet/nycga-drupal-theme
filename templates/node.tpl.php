<?php
/**
 * Nodes are articles, as in "article of something", not as in "news article".
 * We use the new <article> element to wrap nodes, with an ID and class, and
 * the WAI ARIA role "article". Roles could be added via $attributes, so really
 * we need to add more $attributes in more places so we can do this everywhere,
 * and not just sometimes, which is why I have chosen to hard code them in the
 * templates all the time, to be consistant.
 */
?>
<article id="article-<?php print $node->nid; ?>" class="<?php print $classes; ?> clearfix" role="article"<?php print $attributes; ?>>

  <?php print $unpublished; ?>

  <?php
  /**
   * We can resue the <header> element to wrap our node header content, for now
   * thats just the title in an <h1>, but we could have other stuff here. Using
   * <h1> is pefectly fine in HTML5, you can have as many as you like.
   */
  ?>
  <?php if ($title && !$page): ?>
    <header>
      <?php print render($title_prefix); ?>
      <?php if ($title): ?>
        <h1<?php print $title_attributes; ?>>
          <a href="<?php print $node_url; ?>" rel="bookmark"><?php print $title; ?></a>
        </h1>
      <?php endif; ?>
      <?php print render($title_suffix); ?>
    </header>
  <?php endif; ?>

  <?php
  /**
   * <footer> is not for marking up the thing at the bottom of the page, its for
   * wrapping meta data that pertains to the entity or page. There is a possible
   * use case for role="contentinfo" here, but we should be mindful not to over-
   * load Assistive Technology with too many roles and the spec clearly states
   * we should not use contentinfo more than once on the page, we'll see how
   * that plays out in real life...
   */
  ?>
  <?php if ($display_submitted): ?>
    <footer class="submitted">
      <?php print $user_picture; ?>
      <?php
      /**
       * $submitted is heavily modified to use the new <time> element with the
       * datetime and pubdate attributes.
       * @see html5_boilerplate_preprocess_node().
       */
      ?>
      <?php print $submitted; ?>
    </footer>
  <?php endif; ?>

  <div<?php print $content_attributes; ?>>
    <?php
      hide($content['comments']);
      hide($content['links']);
      print render($content);
    ?>
  </div>
  <?php
  /**
   * We're wrapping links in <menu> element, which is probalby a bit
   * controversial because <menu> is really meant for building toolbars and
   * contextual menus, however <menu> takes a type attribute with 3 possible
   * values - context, toolbar and list (default is list). Links are a list, and
   * I think a little bit like a context menu, meaning links are contextual to
   * the node or comment you are viewing, however they are not true contextual
   * links because you do not have to click anything to make them appear.
   */
  ?>
  <?php if ($links = render($content['links'])): ?>
    <menu class="node-links clearfix"><?php print $links; ?></menu>
  <?php endif; ?> 

  <?php print render($content['comments']); ?>

</article>
