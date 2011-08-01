<?php

/**
 * @file
 * The tee theme implementation to display a single Drupal page.
 */
?>
<!-- skip links begin -->
<ul id="skip-link">
  <li class="element-invisible element-focusable"><a href="#main-content"><?php print t('Skip to main content'); ?></a></li>
<?php if ($main_menu): ?>
  <li class="element-invisible element-focusable"><a href="#navigation"><?php print t('Skip to navigation'); ?></a></li>
<?php endif; ?>
</ul>
<!-- skip links end -->
<!-- header begin -->
<header id="page-header" role="banner">
<?php if ($logo): ?>
  <a href="<?php print $front_page; ?>" title="<?php print t('Home'); ?>" id="logo"><img src="<?php print $logo; ?>" alt="<?php print t('Home'); ?>" /></a>
<?php endif; ?>
<?php if ($site_name || $site_slogan): ?>
  <hgroup id="name-and-slogan">
<?php if ($site_name): ?>
    <h1 id="site-name"><a href="<?php print $front_page; ?>" title="<?php print t('Home'); ?>"><?php print $site_name; ?></a></h1>
<?php endif; ?>
<?php if ($site_slogan): ?>
    <h2 id="site-slogan"><?php print $site_slogan; ?></h2>
<?php endif; ?>
  </hgroup>
<?php endif; ?>
<?php print render($page['header']); ?>
</header>
<!-- header end -->
<?php if ($main_menu || $secondary_menu): ?>
<!-- navigation begin -->
<nav id="navigation" role="navigation">
  <?php print theme('links__system_main_menu', array('links' => $main_menu, 'attributes' => array('id' => 'main-menu', 'class' => array('links', 'inline', 'clearfix')), 'heading' => t('Main menu'))); ?>
  <?php print theme('links__system_secondary_menu', array('links' => $secondary_menu, 'attributes' => array('id' => 'secondary-menu', 'class' => array('links', 'inline', 'clearfix')), 'heading' => t('Secondary menu'))); ?>
</nav>
<!-- navigation end -->
<?php endif; ?>
<?php if ($breadcrumb): ?>
<!-- breadcrumb begin -->
<nav id="breadcrumb"><?php print $breadcrumb; ?></nav>
<!-- breadcrumb end -->
<?php endif; ?>
<?php if ($messages): ?>
<!-- messages begin -->
<?php print $messages; ?>
<!-- messages end -->
<?php endif; ?>
<!-- main begin -->
<section id="main" role="main">
<!-- content begin -->
  <div id="content">
<?php if ($page['highlighted']): ?>
    <div id="highlighted"><?php print render($page['highlighted']); ?></div>
<?php endif; ?>
    <a id="main-content"></a>
<?php print render($title_prefix); ?>
<?php if ($title): ?>
    <h1 class="title" id="page-title"><?php print $title; ?></h1>
<?php endif; ?>
<?php print render($title_suffix); ?>
<?php if ($tabs): ?>
    <div class="tabs"><?php print render($tabs); ?></div>
<?php endif; ?>
<!-- help begin -->
<?php print render($page['help']); ?>
<!-- help end -->
<?php if ($action_links): ?>
    <ul class="action-links"><?php print render($action_links); ?></ul>
<?php endif; ?>
<?php print render($page['content']); ?>
<?php print $feed_icons; ?>
  </div>
<!-- content end -->
<?php if ($page['sidebar_first']): ?>
<!-- sidebar first begin -->
<aside id="sidebar-first">
  <?php print render($page['sidebar_first']); ?>
</aside>
<!-- sidebar first end -->
<?php endif; ?>
<?php if ($page['sidebar_second']): ?>
<!-- sidebar second begin -->
<aside id="sidebar-second">
  <?php print render($page['sidebar_second']); ?>
</aside>
<!-- sidebar second end -->
<?php endif; ?>
</section>
<!-- main end -->
<!-- footer begin -->
<footer id="page-footer" role="contentinfo">
  <?php print render($page['footer']); ?>
</footer>
<!-- footer end -->
