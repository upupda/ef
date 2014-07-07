<?php
/**
 * @file
 * Default footer implementation for each drupal page
 *
 */

class :ef:footer extends :x:element {

  attribute
    string front_page = null,
    string site_name = null;

  protected function render() {
    $front_page = $this->getAttribute('front_page');
    $site_name = $this->getAttribute('site_name');

    $row =
      <div class="fcred col-sm-12">
        {t('Copyright')}
        &copy;
        {date("Y")}
        {' '}
        <a href={$front_page}>
          {$site_name}
        </a>.
        <span class="theme_by" style="float: right">
          {t('Theme by eggfont')}.
        </span>
      </div>;
    return
      <footer id="colophon" class="site-footer" role="contentinfo">
        <div class="container">
          <div class="row" style="padding: 0px 40px">
            {$row}
          </div>
        </div>
      </footer>;
  }
}

