<?php

declare(strict_types=1);

namespace Drupal\tengstrom_mainmenu\HookHandlers;

class LibraryInfoAlterHandler {
    public function alter(array &$libraries, string $extension): void {
        $this->addToolbarLibraryDependency($libraries, $extension);
    }

    /**
     * Fixes issue with the responsive menu module causing a js error due to trying to use an object that doesn't
     * exist yet.
     */
    protected function addToolbarLibraryDependency(array &$libraries, string $extension): void {
        if($extension !== 'responsive_menu') {
            return;
        }

        if(empty($libraries['responsive_menu.toolbar'])) {
            return;
        }

        $libraries['responsive_menu.toolbar']['dependencies'][] = 'toolbar/toolbar';
    }
}