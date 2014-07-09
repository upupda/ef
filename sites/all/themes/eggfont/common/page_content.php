<?php
/**
 * @file
 * Default theme implementation to display a single Drupal page.
 */

include DRUPAL_ROOT . '/sites/all/themes/eggfont/static_pages/urimap.php';

class :ef:page_content extends :x:element {

  attribute
    string breadcrumb,
    string title,
    array tabs,
    array action_links,
    array page = array(),
    bool is_front = false;

  protected function render() {
    if ($this->getAttribute('is_front')) {
      include DRUPAL_ROOT . '/sites/all/themes/eggfont/static_pages/front.php';
      return <ef:front />;
    }

    $ret = $this->renderStaticPage();
    if ($ret) {
      return $ret;
    }

    // Render standard node
    include DRUPAL_ROOT . '/sites/all/themes/eggfont/common/node_page.php';
    return
      <ef:node_page
        page={$this->getAttribute('page')}
        breadcrumb={$this->getAttribute('breadcrumb')}
        title={$this->getAttribute('title')}
        tabs={$this->getAttribute('tabs')}
        action_links={$this->getAttribute('action_links')}
      />;
  }

  private function renderStaticPage() {
    $map = get_uri_map();
    $path = current_path();
    if (isset($map[$path])) {
      list($file, $class) = $map[$path];
      include DRUPAL_ROOT . '/sites/all/themes/eggfont/static_pages/'.$file;
      $controller = new $class();
      return $controller->getContent();
    }
    return null;
  }
}
