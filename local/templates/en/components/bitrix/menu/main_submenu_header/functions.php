<?php

function modifyFirstLevelMainSubmenu(array $firstLevelMenu) : array {
    $modifiedFirstLevelMenu = [];
    foreach ($firstLevelMenu as $key => &$item) {
        if($key >= 5) {
            $item['JS_DESKTOP_MOVE_LINK'] = true;
        }

        if($key >= 7) {
            $modifiedFirstLevelMenu['HIDDEN'][] = $item;
        } else {
            $modifiedFirstLevelMenu['NOT_HIDDEN'][] = $item;
        }
    }
    return $modifiedFirstLevelMenu;
}
