<?php
/**
 * @file
 * Default theme implementation to display a single Drupal page.
 */

class :ef:node_page extends :x:element {

  attribute
    string breadcrumb,
    string title,
    array tabs,
    array action_links,
    array page = array(),
    bool is_front = false;

  protected function render() {
    return
      <div id="page">
        <div id="main-content">
          {$this->renderMainContent()}
        </div>
      </div>;
  }

  protected function renderMainContent() {
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
