<?php
/**
 * @file
 * Default theme implementation to display a single Drupal page.
 */

class :ef:front extends :x:element {

  attribute :ef:page_content;

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

  private function renderMainContent() {
    $slide1_url = check_plain(theme_get_setting('slide1_url','eggfont'));
    $slide2_url = check_plain(theme_get_setting('slide2_url','eggfont'));
    $slide3_url = check_plain(theme_get_setting('slide3_url','eggfont'));
    $r2 =
      <section class="front-r2">
        <a href={url($slide1_url)} class="front-r2">
          <img src={base_path() . drupal_get_path('theme', 'eggfont') . '/images/r2-thermostat.jpg'} />
        </a>
        <a href={url($slide2_url)} class="front-r2">
          <img src={base_path() . drupal_get_path('theme', 'eggfont') . '/images/r2-protector.jpg'} />
        </a>
      </section>;
    $r3 =
      <section class="front-r3">
        <div id="front-r3-1">
          <a href={url($slide1_url)} class="front-r3">
            <span>Saving Energy</span>
          </a>
        </div>
        <div id="front-r3-2">
          <a href={url($slide2_url)} class="front-r3">
            <span>Job</span>
          </a>
        </div>
        <div id="front-r3-3">
          <a href={url($slide3_url)} class="front-r3">
            <span>Mail</span>
          </a>
        </div>
      </section>;
    return
      <x:frag>
        {$r2}
        {$r3}
      </x:frag>;
  }
}
