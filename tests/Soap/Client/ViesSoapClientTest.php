<?php

declare(strict_types=1);

namespace Tests\Prometee\VIESClient\Test\Soap\Client;

use DateTime;
use DateTimeZone;
use PHPUnit\Framework\TestCase;
use Prometee\VIESClient\Soap\Client\ViesSoapClient;
use Prometee\VIESClient\Soap\Model\CheckVatApproxRequest;
use Prometee\VIESClient\Soap\Model\CheckVatApproxResponse;
use Prometee\VIESClient\Soap\Model\CheckVatRequest;
use Prometee\VIESClient\Soap\Model\CheckVatResponse;
use SoapFault;

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

        $expectedCheckVatResponse = new CheckVatResponse();
        $expectedCheckVatResponse->setCountryCode($vat[0]);
        $expectedCheckVatResponse->setVatNumber($vat[1]);
        // Timezone is guessed from my tests, it could be a spanish or italian one also...
        $date = new Datetime('now', new DateTimeZone('Europe/Paris'));
        $expectedCheckVatResponse->setRequestDate($date->format('Y-m-dP'));
        $expectedCheckVatResponse->setValid(false);
        $expectedCheckVatResponse->setName('---');
        $expectedCheckVatResponse->setAddress('---');

        $this->assertEquals($expectedCheckVatResponse, $checkVatResponse);
    }

    /** @test */
    public function checkVatApprox()
    {
        $vat = ['FR', '12345678987'];
        $checkVatApproxRequest = new CheckVatApproxRequest();
        $checkVatApproxRequest->setFullVatNumber(implode('', $vat));

        $viesSoapClient = new ViesSoapClient();
        $checkVatApproxRequest = $viesSoapClient->checkVatApprox($checkVatApproxRequest);

        $expectedCheckVatApproxResponse = new CheckVatApproxResponse();
        $expectedCheckVatApproxResponse->setCountryCode($vat[0]);
        $expectedCheckVatApproxResponse->setVatNumber($vat[1]);
        // Timezone is guessed from my tests, it could be a spanish or italian one also...
        $date = new Datetime('now', new DateTimeZone('Europe/Paris'));
        $expectedCheckVatApproxResponse->setRequestDate($date->format('Y-m-dP'));
        $expectedCheckVatApproxResponse->setValid(false);
        $expectedCheckVatApproxResponse->setTraderName('---');
        $expectedCheckVatApproxResponse->setTraderCompanyType('---');
        $expectedCheckVatApproxResponse->setTraderAddress('---');
        $expectedCheckVatApproxResponse->setRequestIdentifier('');

        $this->assertEquals($expectedCheckVatApproxResponse, $checkVatApproxRequest);
    }

    /** @test */
    public function serverHostFault()
    {
        $checkVatRequest = new CheckVatRequest();
        $checkVatRequest->setFullVatNumber('FR12345678987');

        $viesSoapClient = new ViesSoapClient();
        $viesSoapClient->__setLocation(preg_replace(
            '#ec\.europa\.eu#',
            'ec.europa.eueu',
            ViesSoapClient::WSDL
        ));

        $this->expectException(SoapFault::class);
        $this->expectExceptionMessage('Could not connect to host');
        $viesSoapClient->checkVat($checkVatRequest);
    }

    /** @test */
    public function serverNotFoundFault()
    {
        $checkVatRequest = new CheckVatRequest();
        $checkVatRequest->setFullVatNumber('FR12345678987');

        $viesSoapClient = new ViesSoapClient();
        $viesSoapClient->__setLocation(preg_replace(
            '#wsdl$#',
            'wsdl-test-error',
            ViesSoapClient::WSDL
        ));

        $this->expectException(SoapFault::class);
        $this->expectExceptionMessage('Not Found');
        $viesSoapClient->checkVat($checkVatRequest);
    }
}
