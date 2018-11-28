<?php

declare(strict_types=1);

namespace Tests\Prometee\VatInformationExchangeSystem\Test\Soap\Client;

use DateTime;
use PHPUnit\Framework\TestCase;
use Prometee\VatInformationExchangeSystem\Soap\Client\ViesSoapClient;
use Prometee\VatInformationExchangeSystem\Soap\Model\CheckVatApproxRequest;
use Prometee\VatInformationExchangeSystem\Soap\Model\CheckVatApproxResponse;
use Prometee\VatInformationExchangeSystem\Soap\Model\CheckVatRequest;
use Prometee\VatInformationExchangeSystem\Soap\Model\CheckVatResponse;

class ViesSoapClientTest extends TestCase
{
    /**
     * @test
     */
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
        $checkVatResponseMock->setRequestDatetime(new DateTime());
        $checkVatResponseMock->setValid(false);
        $checkVatResponseMock->setName('---');
        $checkVatResponseMock->setAddress('---');

        $this->assertEquals($checkVatResponseMock, $checkVatResponse);
    }

    /**
     * @test
     */
    public function testCheckVatApprox()
    {
        $vat = ['FR', '12345678987'];
        $checkVatApproxRequest = new CheckVatApproxRequest();
        $checkVatApproxRequest->setFullVatNumber(implode('', $vat));

        $viesSoapClient = new ViesSoapClient();
        $checkVatApproxRequest = $viesSoapClient->checkVatApprox($checkVatApproxRequest);

        $checkVatApproxResponseMock = new CheckVatApproxResponse();
        $checkVatApproxResponseMock->setCountryCode($vat[0]);
        $checkVatApproxResponseMock->setVatNumber($vat[1]);
        $checkVatApproxResponseMock->setRequestDatetime(new DateTime());
        $checkVatApproxResponseMock->setValid(false);
        $checkVatApproxResponseMock->setTraderName('---');
        $checkVatApproxResponseMock->setTraderCompanyType('---');
        $checkVatApproxResponseMock->setTraderAddress('---');
        $checkVatApproxResponseMock->setRequestIdentifier('');

        $this->assertEquals($checkVatApproxResponseMock, $checkVatApproxRequest);
    }
}
