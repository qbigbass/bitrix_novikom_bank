<?php
function getSelectedValueFromGet($getData, $code, $default = 'all') {
    return $getData[$code] ?? $default;
}
