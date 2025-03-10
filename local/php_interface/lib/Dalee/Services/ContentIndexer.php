<?php

namespace Dalee\Services;

use Bitrix\Main\Context;
use Bitrix\Main\Loader;
use CSearch;

class ContentIndexer
{
    public static function index(string $content): void
    {
        $instance = new self();
        $instance->indexPage($instance->getCurrentUrl(), $content);
    }

    private function getCurrentUrl(): string
    {
        global $APPLICATION;
        $dir = $APPLICATION->GetCurPage();
        $request = Context::getCurrent()->getRequest()->getQueryList()->toArray();

        $filteredRequest = array_filter($request, function ($key) {
            return strpos($key, 'PAGEN') !== false;
        }, ARRAY_FILTER_USE_KEY);

        $urlWithoutAnchor = strtok($dir, '#');

        return $urlWithoutAnchor . (!empty($filteredRequest) ? '?' . http_build_query($filteredRequest) : '');
    }

    private function indexPage($url, $content): void
    {
        preg_match('/<title>(.*?)<\/title>/is', $content, $matches);
        $title = $matches[1] ?? '';
        $cleanedContent = $this->cleanContent($content);

        if (
            !Loader::includeModule('search')
            || $title == '404 Not Found'
            || empty($cleanedContent)
        ) {
            return;
        }

        $itemId = SITE_ID . '|' . $url;

        $fields = [
            "DATE_CHANGE" => ConvertTimeStamp(false, "FULL"),
            "MODULE_ID" => "main",
            "ITEM_ID" => $itemId,
            "CUSTOM_RANK" => 0,
            "USER_ID" => false,
            "ENTITY_TYPE_ID" => false,
            "ENTITY_ID" => false,
            "URL" => $url,
            "TITLE" => $title,
            "BODY" => $cleanedContent,
            "TAGS" => "",
            "PARAM1" => "",
            "PARAM2" => "",
        ];

        CSearch::Index('main', $itemId, $fields);
    }

    private function cleanContent($content): string
    {
        if (preg_match('/<!--\s*#WORK_AREA#\s*-*-->(.*?)<!--\s*#WORK_AREA#\s*-*-->/is', $content, $matches)) {
            $content = trim($matches[1]);
        } else {
            return '';
        }

        $content = strip_tags(preg_replace([
            '#<nav\b[^>]*>.*?</nav>#is',
            '#<script\b[^>]*>.*?</script>#is',
            '#<style\b[^>]*>.*?</style>#is',
            '#<aside\b[^>]*>.*?</aside>#is',
            '#<form\b[^>]*>.*?</form>#is',
            '#<div\b[^>]*class="[^"]*\bmodal\b[^"]*"[^>]*>.*?</div>\s*#is'
        ], '', $content));

        $content = preg_replace('/\s+/', ' ', $content);
        return trim($content);
    }
}
