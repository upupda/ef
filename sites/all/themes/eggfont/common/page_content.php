<?php
/**
 * @file
 * Default theme implementation to display a single Drupal page.
 */

class :ef:page_content extends :x:element {

  attribute
    string breadcrumb,
    string title,
    array tabs,
    array action_links,
    array page = array(),
    bool is_front = falsel;

  protected function render() {
    return
      <div id="page">
        {$this->renderSlides()}
        <div id="main-content">
          {$this->renderMainContent()}
        </div>
      </div>;
  }

  protected function  renderSlides() {
    if (!$this->getAttribute('is_front')) {
      return null;
    }

    theme_get_setting('slideshow_display','eggfont');
    $slide1_head = check_plain(theme_get_setting('slide1_head','eggfont'));
    $slide1_desc = check_markup(theme_get_setting('slide1_desc','eggfont'), 'full_html');
    $slide1_url = check_plain(theme_get_setting('slide1_url','eggfont'));
    $slide2_head = check_plain(theme_get_setting('slide2_head','eggfont'));
    $slide2_desc = check_markup(theme_get_setting('slide2_desc','eggfont'), 'full_html');
    $slide2_url = check_plain(theme_get_setting('slide2_url','eggfont'));
    $slide3_head = check_plain(theme_get_setting('slide3_head','eggfont'));
    $slide3_desc = check_markup(theme_get_setting('slide3_desc','eggfont'), 'full_html');
    $slide3_url = check_plain(theme_get_setting('slide3_url','eggfont'));

    return
      <div id="slidebox" class="flexslider">
        <ul class="slides">
          <li>
            <img src={base_path() . drupal_get_path('theme', 'eggfont') . '/images/slide-image-1.jpg'} />
              <div class="flex-caption">
                <h2>{HTML($slide1_head)}</h2>
                {HTML($slide1_desc)}
                <a class="frmore" href={url($slide1_url)}>
                  {t('READ MORE')}
                </a>
              </div>
          </li>
          <li>
            <img src={base_path() . drupal_get_path('theme', 'eggfont') . '/images/slide-image-2.jpg'} />
              <div class="flex-caption">
                <h2>{HTML($slide2_head)}</h2>
                {HTML($slide2_desc)}
                <a class="frmore" href={url($slide2_url)}>
                  {t('READ MORE')}
                </a>
              </div>
          </li>
          <li>
            <img src={base_path() . drupal_get_path('theme', 'eggfont') . '/images/slide-image-3.jpg'} />
              <div class="flex-caption">
                <h2>{HTML($slide3_head)}</h2>
                {HTML($slide3_desc)}
                <a class="frmore" href={url($slide3_url)}>
                  {t('READ MORE')}
                </a>
              </div>
          </li>
       </ul><!-- /slides -->
       <div class="doverlay"></div>
    </div>;
  }
  protected function renderMainContent() {
    if ($this->getAttribute('is_front')) {
      return null;
    }

    $breadcrumb = $this->getAttribute('breadcrumb');
    if (theme_get_setting('breadcrumbs')) {
      if ($breadcrumb) {
        $breadcrumb =
          <div id="breadcrumbs">
            {$breadcrumb}
          </div>;
      }
    }

    $page = $this->getAttribute('page');
    if (theme_get_setting('breadcrumbs')) {
      $content_top = null;
      if ($page['content_top']) {
        $content_top =
          <div id="content_top">
            {HTML(render($page['content_top']))}
          </div>;
      }
    }

    $title = $this->getAttribute('title');
    if ($title) {
      $title = <h1 class="page-title">{$title}</h1>;
    }

    $tabs = $this->getAttribute('tabs');
    $tab_xhp = null;
    if (!empty($tabs['#primary'])) {
      $tab_xhp =
        <div class="tabs-wrapper clearfix">
          {HTML(render($tabs))}
        </div>;
    }

    $action_links = $this->getAttribute('action_links');
    if ($action_links) {
      $action_links =
        <ul class="action-links">
          {HTML(render($action_links))}
        </ul>;
    }

    $sidebar_first = null;
    if ($page['sidebar_first']) {
      $sidebar_first =
        <aside id="sidebar" class="col-sm-4" role="complementary">
          {HTML(render($page['sidebar_first']))}
        </aside>;
    }
    return
      <div class="container">
        <div class="row">
          <div id="primary" class="content-area col-sm-8">
            <section id="content" role="main" class="clearfix">
              {$messages}
              {$content_top}
              <div id="content-wrap">
                {HTML(render($title_prefix))}
                {$title}
                {HTML(render($title_suffix))}
                {$tab_xhp}
                {HTML(render($page['help']))}
                {$action_links}
                {HTML(render($page['content']))}
              </div>
            </section>
          </div>
        {$sidebar_first}
      </div>
    </div>;
  }
}
