<?php

namespace Drupal\marucha\Service;

class MaruchaService
{
  private $drinks = ['coffee', 'tea', 'milk', 'water'];

  public function getDrink()
  {
    return $this->drinks[array_rand($this->drinks)];
  }
}
