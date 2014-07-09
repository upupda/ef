<?php
/**
 * @file
 * Default theme implementation to display a single Drupal page.
 */

class InstallationController {
  public function getContent() {
    return <ef:installation />;
  }
}

class :ef:installation extends :x:element {

  attribute :ef:page_content;

  protected function render() {
    return
      <div id="page">
        <div id="main-content">
          {$this->renderMainContent()}
        </div>
      </div>;
  }

  protected function renderMainContent() {
    return <p> p ke </p>;
  }
}
