<?php

namespace Drupal\marucha\Plugin\Block;

use Drupal\Core\Block\BlockBase;

/**
 * Provides a 'MaruchBlock' block.
 *
 * @Block(
 *  id = "maruch_block",
 *  admin_label = @Translation("Maruch block"),
 * )
 */
class MaruchBlock extends BlockBase {

  /**
   * {@inheritdoc}
   */
  public function build() {
    return \Drupal::formBuilder()->getForm('Drupal\marucha\Form\MaruchaForm');
  }

}
