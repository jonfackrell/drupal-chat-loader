<?php
/**
 * @file
 * Contains Drupal\chatloader\Controller\SettingsController
 */

namespace Drupal\chatloader\Controller;

use Drupal\Core\Controller\ControllerBase;

class SettingsController extends ControllerBase
{
  public function content() {
    return array(
      '#type' => 'markup',
      '#markup' => t('Settings')
    );
  }
}
