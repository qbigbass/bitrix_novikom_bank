<?php

namespace Dalee\Helpers;

class TextHelper
{
    public static function getPluralForm(string $word)
    {
        $stem = preg_replace('/[ая]$/u', '', $word);
        $ending = '';

        // Определяем окончание в зависимости от рода и последней буквы
        if (preg_match('/[ая]$/u', $word)) {
            $ending = 'и'; // Женский род: специализация -> специализации
        } elseif (preg_match('/[оы]$/u', $word)) {
            $ending = 'а'; // Средний/мужской род: город -> города
        } elseif (preg_match('/[е]$/u', $word)) {
            $ending = 'й'; // Окончание "й"
        } else {
            $ending = 'ы'; // Общий случай
        }

        return $stem . $ending;
    }
}
