<?php

/* **********************
 * v.1.1 - 10.11.2026 - implemento settings pagination, navigation; ed effetto cards
 ********************** */


namespace Drupal\uniud_swiper_formatter\Plugin\Field\FieldFormatter;

use Drupal\Core\Field\FieldItemListInterface;
use Drupal\image\Plugin\Field\FieldFormatter\ImageFormatter;
use Drupal\Core\Form\FormStateInterface;

/**
 * Plugin implementation of the 'uniud_swiper_formatter' formatter.
 *
 * @FieldFormatter(
 * id = "uniud_swiper_formatter",
 * label = @Translation("UniUD Swiper Slideshow"),
 * field_types = {
 * "image"
 * }
 * )
 */
class SwiperImageFormatter extends ImageFormatter {

  /**
   * {@inheritdoc}
   */
  public static function defaultSettings() {
    return [
      'effect' => 'slide',
      'speed' => 300,
      'autoplay' => TRUE,
      'delay' => 3000,
      'loop' => TRUE,
      'pagination' => TRUE,
      'navigation' => TRUE,
    ] + parent::defaultSettings();
  }

  /**
   * {@inheritdoc}
   */
  public function settingsForm(array $form, FormStateInterface $form_state) {
    $element = parent::settingsForm($form, $form_state);

    $element['effect'] = [
      '#type' => 'select',
      '#title' => $this->t('Transition effect'),
      '#options' => [
        'slide' => $this->t('Slide'),
        'fade' => $this->t('Fade'),
        'cube' => $this->t('Cube'),
        'coverflow' => $this->t('Coverflow'),
        'flip' => $this->t('Flip'),
        'cards' => $this->t('Cards'),
      ],
      '#default_value' => $this->getSetting('effect'),
    ];

    $element['speed'] = [
      '#type' => 'number',
      '#title' => $this->t('Transition speed (ms)'),
      '#default_value' => $this->getSetting('speed'),
      '#min' => 0,
    ];

    $element['autoplay'] = [
      '#type' => 'checkbox',
      '#title' => $this->t('Autoplay'),
      '#default_value' => $this->getSetting('autoplay'),
    ];

    $element['delay'] = [
      '#type' => 'number',
      '#title' => $this->t('Autoplay delay (ms)'),
      '#default_value' => $this->getSetting('delay'),
      '#min' => 0,
      '#states' => [
        'visible' => [
          ':input[name*="autoplay"]' => ['checked' => TRUE],
        ],
      ],
    ];

    $element['loop'] = [
      '#type' => 'checkbox',
      '#title' => $this->t('Infinite loop'),
      '#default_value' => $this->getSetting('loop'),
    ];

    $element['pagination'] = [
      '#type' => 'checkbox',
      '#title' => $this->t('Show pagination bullets'),
      '#default_value' => $this->getSetting('pagination'),
    ];
    
    $element['navigation'] = [
      '#type' => 'checkbox',
      '#title' => $this->t('Show navigation'),
      '#default_value' => $this->getSetting('navigation'),
    ];
    
    return $element;
  }

  /**
   * {@inheritdoc}
   */
  public function viewElements(FieldItemListInterface $items, $langcode) {
    // 1. Call parent method to generate images with Image Styles.
    $elements = parent::viewElements($items, $langcode);

    // 2. Prepare data for Swiper JS.
    $settings = $this->getSettings();
    $swiper_data = [
      'effect' => $settings['effect'],
      'speed' => (int) $settings['speed'],
      'autoplay' => $settings['autoplay'] ? ['delay' => (int) $settings['delay']] : FALSE,
      'loop' => $settings['loop'],
      'pagination' => (bool) $settings['pagination'],
      'navigation' => (bool) $settings['navigation'],
    ];

    // 3. Return the swiper template passing the rendered elements.
    return [
      '#theme' => 'swiper_image_formatter',
      '#items' => $elements,
      '#settings' => $settings,
      '#attached' => [
        'library' => ['uniud_swiper_formatter/swiper-init'],
        'drupalSettings' => [
          'uniud_swiper_formatter' => $swiper_data,
        ],
      ],
    ];
  }

}
