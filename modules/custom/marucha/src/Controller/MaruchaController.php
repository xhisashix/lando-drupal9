<?php

namespace Drupal\marucha\Controller;

use Drupal\Core\Controller\ControllerBase;

/**
 * Class MaruchaController.
 */
class MaruchaController extends ControllerBase {

  /**
   * Marucha index.
   *
   * @return array
   *   Return Hello string.
   */
  public function index() {
    return [
      '#markup' => $this->t('Hello, Marucha!')
    ];
  }

}
