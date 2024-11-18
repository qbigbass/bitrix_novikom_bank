<? use Bitrix\Main\Config\Option;

if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();

class CBPNovicom_Settings_SetVariableActivity
    extends CBPActivity
{
    public function __construct($name)
    {
        parent::__construct($name);
        $this->arProperties = [
            "Title" => "",
            "VariableValueFrom" => [],
        ];
    }

    public static function GetPropertiesDialog($documentType, $activityName, $arWorkflowTemplate, $arWorkflowParameters, $arWorkflowVariables, $arCurrentValues = null, $formName = "")
    {
        $runtime = CBPRuntime::GetRuntime();

        if (!is_array($arWorkflowParameters))
            $arWorkflowParameters = [];
        if (!is_array($arWorkflowVariables))
            $arWorkflowVariables = [];

        if (!is_array($arCurrentValues)) {
            $arCurrentValues = [
                "variable_value_from" => [],
            ];

            $arCurrentActivity = &CBPWorkflowTemplateLoader::FindActivityByName($arWorkflowTemplate, $activityName);
            if (is_array($arCurrentActivity["Properties"])) {
                $arCurrentValues["variable_value_from"] = $arCurrentActivity["Properties"]["VariableValueFrom"];

            }
        }

        return $runtime->ExecuteResourceFile(
            __FILE__,
            "properties_dialog.php",
            [
                "arCurrentValues" => $arCurrentValues,
                "formName" => $formName,
                "arWorkflowVariables" => $arWorkflowVariables,
            ]
        );
    }

    public static function GetPropertiesDialogValues($documentType, $activityName, &$arWorkflowTemplate, &$arWorkflowParameters, &$arWorkflowVariables, $arCurrentValues, &$arErrors)
    {
        $arErrors = [];

        $runtime = CBPRuntime::GetRuntime();

        $arProperties = [
            "VariableValueFrom" => $arCurrentValues["variable_value_from"],
        ];

        if (!is_array($arProperties["VariableValueFrom"])) {
            $arProperties["VariableValueFrom"] = [];
        }

        foreach ($arProperties["VariableValueFrom"] as $key => $value) {
            if (mb_strlen($value) <= 0) {
                unset($arProperties["VariableValueFrom"][$key]);
            }
        }

        $arErrors = self::ValidateProperties($arProperties, new CBPWorkflowTemplateUser(CBPWorkflowTemplateUser::CurrentUser));
        if (count($arErrors) > 0)
            return false;

        $arCurrentActivity = &CBPWorkflowTemplateLoader::FindActivityByName($arWorkflowTemplate, $activityName);
        $arCurrentActivity["Properties"] = $arProperties;

        return true;
    }

    public static function ValidateProperties($arTestProperties = [], CBPWorkflowTemplateUser $user = null)
    {
        $arErrors = [];

        if (!$arTestProperties["VariableValueFrom"]) {
            $arErrors[] = [
                "code" => "EMPTY_VARIABLE_CODE",
                "message" => GetMessage("NOVIKOM_SETTINGS_EMPTY_VARIABLE_CODE"),
            ];
        }

        return array_merge($arErrors, parent::ValidateProperties($arTestProperties, $user));
    }

    public function Execute()
    {
        $arVar = $this->getRawProperty('VariableValueFrom');
        if (is_array($arVar)) {
            foreach ($arVar as $variable => $from) {
                $value = Option::get("novikom.settings", $from);
                $this->SetVariable($variable, $value);
            }
        }

        return CBPActivityExecutionStatus::Closed;
    }
}

?>
