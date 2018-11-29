<?php

declare(strict_types=1);

namespace Tests\Prometee\VIESClient\Test\Soap\Client;

use DateTime;
use PHPUnit\Framework\TestCase;
use Prometee\VIESClient\Soap\Client\ViesSoapClient;
use Prometee\VIESClient\Soap\Model\CheckVatApproxRequest;
use Prometee\VIESClient\Soap\Model\CheckVatApproxResponse;
use Prometee\VIESClient\Soap\Model\CheckVatRequest;
use Prometee\VIESClient\Soap\Model\CheckVatResponse;

class ViesSoapClientTest extends TestCase
{
    /** @test */
    public function checkVatResponse()
    {
        $vat = ['FR', '12345678987'];
        $checkVatRequest = new CheckVatRequest();
        $checkVatRequest->setFullVatNumber(implode('', $vat));

        $viesSoapClient = new ViesSoapClient();
        $checkVatResponse = $viesSoapClient->checkVat($checkVatRequest);

        $checkVatResponseMock = new CheckVatResponse();
        $checkVatResponseMock->setCountryCode($vat[0]);
        $checkVatResponseMock->setVatNumber($vat[1]);
        $date = new Datetime();
        $checkVatResponseMock->setRequestDate($date->format('Y-m-d+01:00'));
        $checkVatResponseMock->setValid(false);
        $checkVatResponseMock->setName('---');
        $checkVatResponseMock->setAddress('---');

        $this->assertEquals($checkVatResponseMock, $checkVatResponse);
    }

    /** @test */
    public function checkVatApprox()
    {
        $vat = ['FR', '12345678987'];
        $checkVatApproxRequest = new CheckVatApproxRequest();
        $checkVatApproxRequest->setFullVatNumber(implode('', $vat));

        $viesSoapClient = new ViesSoapClient();
        $checkVatApproxRequest = $viesSoapClient->checkVatApprox($checkVatApproxRequest);

        $checkVatApproxResponseMock = new CheckVatApproxResponse();
        $checkVatApproxResponseMock->setCountryCode($vat[0]);
        $checkVatApproxResponseMock->setVatNumber($vat[1]);
        $date = new Datetime();
        $checkVatApproxResponseMock->setRequestDate($date->format('Y-m-d+01:00'));
        $checkVatApproxResponseMock->setValid(false);
        $checkVatApproxResponseMock->setTraderName('---');
        $checkVatApproxResponseMock->setTraderCompanyType('---');
        $checkVatApproxResponseMock->setTraderAddress('---');
        $checkVatApproxResponseMock->setRequestIdentifier('');

        $this->assertEquals($checkVatApproxResponseMock, $checkVatApproxRequest);
    }
}
