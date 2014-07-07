<?php
/**
 * @file
 * Default header implementation for each drupal page
 *
 */

class :ef:header extends :x:element {

  attribute
    string logo = null,
    string front_page = null,
    string site_name = null;

  protected function render() {
    $logo = $this->getAttribute('logo');
    $front_page = $this->getAttribute('front_page');
    $site_name = $this->getAttribute('site_name');

    $logo_xhp = null;
    // no logo
    if (0&&$logo) {
      $logo_xhp =
        <div id="site-logo">
          <a href={$front_page} title={t('Home')}>
            <img src={$logo} alt={t('Home')} />
          </a>
        </div>;
    }

    $logo_xhp =
      <div id="logo" class="site-branding col-sm-6">
        {$logo_xhp}
        <h1 id="site-title">
          <a href={$front_page} title={t('Home')}>
            {$site_name}
          </a>
        </h1>
      </div>;

    if (module_exists('i18n_menu')) {
      $main_menu_tree = i18n_menu_translated_tree(variable_get('menu_main_links_source', 'main-menu'));
    } else {
      $main_menu_tree = menu_tree(variable_get('menu_main_links_source', 'main-menu'));
    }

    return
      <header id="masthead" class="site-header container" role="banner">
        <div class="row">
          {$logo_xhp}
          <div class="col-sm-6 mainmenu">
            <div class="mobilenavi"></div>
            <nav id="navigation" role="navigation">
              <div id="main-menu">
                {HTML(drupal_render($main_menu_tree))}
              </div>
            </nav>
          </div>
        </div>
      </header>;
  }
}
?>
