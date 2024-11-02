<?php

namespace Dalee\Services;

use SoapClient;
use SoapFault;

class CBR
{
    private string $url = "https://www.cbr.ru/DailyInfoWebServ/DailyInfo.asmx?WSDL";

    private SoapClient $client;

    /**
     * @throws SoapFault
     */
    public function __construct()
    {
        $this->client = new SoapClient($this->url, [
            'trace' => 1,
            'exceptions' => true,
        ]);
    }

    /**
     * @return float|null
     * @throws SoapFault
     */
    public function getKeyRate(): ?float
    {
        $response = $this->client->__soapCall('MainInfoXML', []);
        $xmlContent = (string)$response->MainInfoXMLResult->any;

        $xmlObject = simplexml_load_string($xmlContent);

        if ($xmlObject && isset($xmlObject->keyRate)) {
            return (float)$xmlObject->keyRate;
        } else {
            echo "Ошибка: Ключевая ставка не найдена в XML.";
            return null;
        }
    }
}
