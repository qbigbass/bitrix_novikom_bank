<?php
namespace Galago\Frontend;

use Bitrix\Main\Page\Asset as BitrixAsset;

class Asset {
    private readonly array $manifest;

    private function __construct() {
        $filePath = $_SERVER['DOCUMENT_ROOT'] . '/frontend/build/assets-manifest.json';
        if(file_exists($filePath)) {
            $this->manifest = json_decode(file_get_contents($filePath), true);
        }
    }

    public static function getInstance() : Asset {
        return new Asset();
    }

    public function addJsAndCss(string $page) {
        if($this->isManifestNotEmpty()) {
            $this->includeJs($page);
            $this->includeCss($page);
        }
    }

    private function isManifestNotEmpty() : bool {
        return !empty($this->manifest);
    }

    private function includeJs(string $page) {
        foreach ($this->manifest[$page]['js'] as $jsFilePath) {
            BitrixAsset::getInstance()->addString('<script type="module" src="/frontend/build' . $jsFilePath . '">');
        }
    }

    private function includeCss(string $page) {
        foreach ($this->manifest[$page]['css'] as $cssFilePath) {
            BitrixAsset::getInstance()->addCss('/frontend/build' . $cssFilePath);
        }
    }
}
