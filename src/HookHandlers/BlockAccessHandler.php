<?php

declare(strict_types=1);

namespace Drupal\tengstrom_mainmenu\HookHandlers;

use Drupal\block\Entity\Block;
use Drupal\Core\Access\AccessResult;
use Drupal\Core\Session\AccountInterface;

class BlockAccessHandler {

  public function getAccess(Block $block, string $operation, AccountInterface $account): AccessResult {
    $blocks = [
      'responsive_menu_horizontal_menu' => 'responsive_menu_horizontal_menu',
      'responsive_menu_toggle' => 'responsive_menu_toggle',
    ];

    if ($operation !== 'view') {
      return AccessResult::neutral();
    }

    if (!in_array($block->getPluginId(), $blocks)) {
      return AccessResult::neutral();
    }

    return $account->hasPermission('tengstrom_mainmenu__view_main_menu_block') ? AccessResult::neutral() : AccessResult::forbidden();
  }

}
