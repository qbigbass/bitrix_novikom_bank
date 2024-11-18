<?

class CNovicomSettings
{
    static private $arFields = false;
    public $LAST_ERROR = "";

    public static function GetFields()
    {
        $arResult = [];

        if (is_array(self::$arFields)) {
            $arResult = self::$arFields;
        } else {
            $arResult = [];

            $obCache = new CPHPCache;
            if ($obCache->InitCache(14400, 1, "novikom.settings")) {
                $arResult = $obCache->GetVars();
            } elseif ($obCache->StartDataCache()) {

                $arResult = self::__GetFields();
                $obCache->EndDataCache($arResult);
            }

            self::$arFields = $arResult;
        }

        return $arResult;
    }

    private static function __GetFields()
    {
        global $USER_FIELD_MANAGER;

        $arResult = [];

        $ID = 1;
        $entity_id = "NOVIKOM_SETTINGS";

        $arUserFields = $USER_FIELD_MANAGER->GetUserFields($entity_id, $ID, LANGUAGE_ID);

        foreach ($arUserFields as $FIELD_NAME => $arUserField) {
            $arResult[$FIELD_NAME] = $arUserField['VALUE'];
        }

        return $arResult;
    }

    public function Update($arFields)
    {
        $result = true;
        global $APPLICATION;

        $this->LAST_ERROR = "";

        $ID = 1;
        $entity_id = "NOVIKOM_SETTINGS";

        $APPLICATION->ResetException();
        $events = GetModuleEvents("novikom.settings", "OnBeforeSettingsUpdate");
        while ($arEvent = $events->Fetch()) {
            $bEventRes = ExecuteModuleEventEx($arEvent, [&$arFields]);
            if ($bEventRes === false) {
                if ($err = $APPLICATION->GetException()) {
                    $this->LAST_ERROR .= $err->GetString();
                } else {
                    $APPLICATION->ThrowException("Unknown error");
                    $this->LAST_ERROR .= "Unknown error";
                }

                $result = false;
                break;
            }
        }

        if ($result) {
            global $USER_FIELD_MANAGER;

            $USER_FIELD_MANAGER->Update($entity_id, $ID, $arFields);
            self::ClearCache();

            $events = GetModuleEvents("novikom.settings", "OnAfterSettingsUpdate");
            while ($arEvent = $events->Fetch()) {
                ExecuteModuleEventEx($arEvent, [&$arFields]);
            }
        }

        return $result;
    }

    public static function ClearCache()
    {
        $obCache = new CPHPCache();
        $obCache->CleanDir("novikom.settings");
    }
}

?>
