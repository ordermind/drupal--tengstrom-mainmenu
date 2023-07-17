<?php

declare(strict_types=1);

namespace Drupal\tengstrom_mainmenu\HookHandlers\PreprocessHandlers;

use Ordermind\DrupalTengstromShared\HookHandlers\PreprocessHandlerInterface;

class PreprocessBlockHandler implements PreprocessHandlerInterface {

  public function preprocess(array &$variables): void {
    if ($variables['plugin_id'] !== 'responsive_menu_horizontal_menu' && $variables['plugin_id'] !== 'responsive_menu_toggle') {
      return;
    }

    $this->disableCache($variables);
  }

  protected function disableCache(array &$variables): void {
    $variables['#cache']['max-age'] = 0;
  }

}
