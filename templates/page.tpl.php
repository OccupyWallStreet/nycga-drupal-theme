<div id="page">

  <?php
  /**
   * HTML5 gives a bunch of new elements we can use in the header,
   * for starters we can wrap the whole thing in <header>, use the
   * WAI ARIA role "banner", and group headings with <hgroup>.
   */
  ?>
  <header class="grid-24 clearfix" role="banner">

    <?php if ($logo): ?>
      <a href="<?php print $front_page; ?>" title="<?php print t('Home'); ?>" rel="home" id="logo">
        <img src="<?php print $logo; ?>" alt="<?php print t('Home'); ?>" />
      </a>
    <?php endif; ?>

    <?php
    /**
     * <hgroup> is a new grouping element, its unique in that only the first
     * heading will branch the outline, all subsequent headings are ingnored
     * in the outline. This makes it perfect for marking up the site name and
     * slogan as <h1> and <h2> respectivly. We can forget about a condition for
     * page titles also, in HTML5 it doesnt matter how many <h1> elements we
     * have in the page.
     */
    ?>
    <?php if ($site_name || $site_slogan): ?>
      <hgroup>
        <?php if ($site_name): ?>
          <h1>
            <a href="<?php print $front_page; ?>" title="<?php print t('Home'); ?>" rel="home">
              <?php print $site_name; ?>
            </a>
          </h1>
        <?php endif; ?>
        <?php if ($site_slogan): ?>
          <h2><?php print $site_slogan; ?></h2>
        <?php endif; ?>
      </hgroup>
    <?php endif; ?>
    
    <?php
    /**
     * Lets imagine a perfect world where Main menu and Secondary menu are
     * replaced by Menu Block module in core, so we just need some regions.
     * Notice I'm not going to wrap these in any markup, what region.tpl.php
     * spits out right now is just fine for styling purposes. We'll add
     * semantics at the block level.
     */
    ?>
    <?php print render($page['header']); ?>
    <?php print render($page['menu_bar']); ?>

  </header>

  <?php
  /**
   * Print a conditional wrapper to contain these page elements.
   */
  ?>
  <?php if ($messages || $page['help'] || $page['highlighted'] || $breadcrumb): ?>
    <div class="grid-24 clearfix">
      <?php print $messages; ?>
      <?php print render($page['help']); ?>

      <?php
      /**
       * Most regions don't need any additional markup, we can do everything we
       * need with region.tpl.php output. In my fantasy D8 world $breadcrumb no
       * longer exists and is now a block, but we'll print it for posterity.
       */
      ?>
      <?php if ($highlighted = render($page['highlighted'])): print $highlighted; endif; ?>
      <?php print $breadcrumb; ?>
    </div>
  <?php endif; ?>

  <?php
  /**
   * The wrapper <div> is for styling only, no need for a semantic element here,
   * remember <div> lost all its semantics in HTML5.
   */
  ?>
  <div id="main-wrapper" class="grid-24 clearfix">
 
    <?php if ($sidebar_first = render($page['sidebar_first'])): print $sidebar_first; endif; ?>

    <?php
    /**
     * Here we use <section> to branch the outline to create a new sectioned
     * content area for our main content. We can apply the WAI ARIA role
     * "main".
     */
    ?>  
    <section id="main-content" class="<?php print $page['sidebar_second'] ? 'grid-12' : 'grid-18 last-col' ; ?>" role="main">

      <?php print render($title_prefix); ?>
      <?php if ($title): ?>
        <h1 id="page-title"><?php print $title; ?></h1>
      <?php endif; ?>
      <?php print render($title_suffix); ?>

      <?php if ($tabs = render($tabs)): ?>
        <div class="tabs"><?php print $tabs; ?></div>
      <?php endif; ?>

      <?php if ($action_links = render($action_links)): ?>
        <ul class="action-links"><?php print $action_links; ?></ul>
      <?php endif; ?>

      <?php print render($page['content']); ?>
      <?php print $feed_icons; ?>

    </section>

    <?php if ($sidebar_second = render($page['sidebar_second'])): print $sidebar_second; endif; ?>

  </div>

  <?php
  /**
   * Much like the header we can add semantics to our page footer using the
   * new <footer> element and the WAI ARIA role "contetinfo" which fits
   * perfectly with what most footers contain - information about the site
   * such as copywrite notices and the company name. Using footer has nothing
   * to do with page layout (that its positioned at the "footer" of the page),
   * its all about the content of the element, not where it is.
   */
  ?>
  <?php if ($footer = render($page['footer'])): ?>
    <footer class="grid-24 clearfix" role="contentinfo"><?php print $footer; ?></footer>
  <?php endif; ?>

</div>
